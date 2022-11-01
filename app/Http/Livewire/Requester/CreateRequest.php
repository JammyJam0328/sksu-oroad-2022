<?php

namespace App\Http\Livewire\Requester;

use App\Models\Campus;
use App\Models\Purpose;
use App\Models\RequestApplication;
use App\Models\RequestDocument;
use App\Models\StudentStatus;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateRequest extends Component
{
    use Actions;

    public $currentStep = 1;

    public $totalStep = 3;

    public $selectedDocument = [
        'document_id' => null,
        'with_authentication' => 0,
        'copy' => '1',
    ];

    public $purposes = [];

    public $purpose_id;

    public $other_purpose;

    protected $validationAttributes = [
        'purpose_id' => 'Purpose',
    ];

    public function previous()
    {
        $this->currentStep > 1 ? $this->currentStep-- : $this->currentStep = 1;
    }

    public function next()
    {
        if ($this->currentStep == 2) {
            $this->validate([
                'purpose_id' => 'required',
                'other_purpose' => 'required_if:purpose_id,==,0',
                'selectedDocument.copy' => 'required|numeric|min:1',
            ]);
        }

        if ($this->currentStep == 1 && $this->selectedDocument['document_id'] == null) {
            $this->dialog()->info(
                $title = 'No Document Selected',
                $description = 'Please select a document to continue.',
            );

            return;
        }
        $this->currentStep < $this->totalStep ? $this->currentStep++ : $this->currentStep = $this->totalStep;
    }

    public function submitRequest()
    {
        if ($this->selectedDocument['document_id'] == null) {
            $this->currentStep = 1;
            $this->notification()->error(
                $title = 'Error!',
                $message = 'Please select a document to continue.',
            );
        }
        $user_information = auth()->user()->information;

        DB::beginTransaction();

        $request_application = RequestApplication::create([
            'code' => $this->generateUniqueCode(),
            'student_id' => $user_information->student_id,
            'user_id' => auth()->user()->id,
            'first_name' => $user_information->first_name,
            'middle_name' => $user_information->middle_name,
            'last_name' => $user_information->last_name,
            'has_changed_last_name' => $user_information->has_changed_last_name,
            'sex' => $user_information->sex,
            'old_last_name' => $user_information->old_last_name,
            'birth_date' => $user_information->birth_date,
            'address' => $user_information->address,
            'contact_number' => $user_information->contact_number,
            'program_id' => $user_information->program_id,
            'campus_id' => $user_information->campus_id,
            'student_status_id' => $user_information->student_status_id,
            'destination_campus_id' => auth()->user()->information->campus_id,
            'purpose_id' => $this->purpose_id,
            'other_purpose' => $this->other_purpose,
            'valid_id' => $user_information->valid_id,
            'status_id' => $user_information->student_status_id == 2 ? 8 : 1,
        ]);

        RequestDocument::create([
            'request_application_id' => $request_application->id,
            'document_id' => $this->selectedDocument['document_id'],
            'amount' => '0',
            'with_authentication' => $this->selectedDocument['with_authentication'],
            'copy' => $this->selectedDocument['copy'],
        ]);

        $request_application->transaction_logs()->create([
            'description' => 'Request Submitted',
            'remarks' => now(),
        ]);

        $users = User::where('campus_id', auth()->user()->information->campus_id)
                        ->whereHas('roles', function ($query) {
                            $query->where('role_id', 2);
                        })->get();
        $notification_details = [
            'from' => $request_application->first_name.' '.$request_application->last_name,
            'title' => 'New Request',
            'message' => $request_application->first_name.' '.$request_application->last_name.' has submitted a new request.',
            'link' => route('registrar.view-request', $request_application->id),
            'status' => $user_information->student_status_id == 2 ? 8 : 1,
        ];
        Notification::send($users, new \App\Notifications\UserNotification($notification_details));
        event(new \App\Events\NewRequest(auth()->user()->information->campus_id));
        DB::commit();

        return redirect()->route('requester.home');
    }

    public function generateUniqueCode()
    {
        $count = RequestApplication::count();
        $code = 'SKSU-'.date('Y').'-'.str_pad($count, 5, '0', STR_PAD_LEFT);
        $check = RequestApplication::where('code', $code)->exists();
        if ($check) {
            $this->generateUniqueCode();
        }

        return $code;
    }

    public function getFirstDestinations()
    {
    }

    public function mount()
    {
        $this->student_statuses = StudentStatus::all();
        $this->campuses = Campus::all('id', 'name');
        $this->purposes = Purpose::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.requester.create-request', [
            'documents' => \App\Models\Document::all(),
        ]);
    }
}
