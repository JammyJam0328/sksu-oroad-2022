<?php

namespace App\Http\Livewire\Requester;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\RequestApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ViewRequest extends Component
{
    use WithFileUploads, Actions;

    public $request_id;

    public $images = [];

    public $reference_number;


    public function getRequestApplicationProperty()
    {
        return RequestApplication::where('id',$this->request_id)
                ->with(['request_document.document','campus','program','student_status','status','purpose','payment',
                'transaction_logs'=>function($query){
                   return  $query->orderBy('created_at','desc');
                }
                ])->first();
    }

    public function submitPayment()
    {
        $this->validate([
             'images.*' => 'required|image|max:2048',
             'reference_number' => 'required|string',
        ]);
        DB::beginTransaction();
        $this->requestApplication->payment()->update([
            'reference_number' => $this->reference_number,
        ]);
        foreach($this->images as $image){
            $this->requestApplication->payment->proofs()->create([
                'file_path' => $image->store('proofs','public'),
            ]);
        }

        $this->requestApplication->update([
            'status_id' => 4,
        ]);

        $this->requestApplication->transaction_logs()->create([
            'description' => "Payment has been submitted",
            'remarks' => 'REF : '.$this->reference_number,
        ]);

        $users = User::where('campus_id', auth()->user()->information->campus_id)
                        ->whereHas('roles', function ($query) {
                            $query->where('role_id', 2);
                        })->get();
        $notification_details = [
            'from' => $this->requestApplication->first_name . ' ' . $this->requestApplication->last_name,
            'title' => 'Payment Submitted',
            'message' => $this->requestApplication->first_name . ' ' . $this->requestApplication->last_name .' has submitted a payment for request CODE :'.$this->requestApplication->code,
            'link' => route('registrar.view-request', $this->requestApplication->id),
            'status'=> 5,
        ];
        Notification::send($users, new \App\Notifications\UserNotification($notification_details));
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Your Payment has been submitted. Please wait for the approval of the registrar.',
        );
    }

    public function mount()
    {
         abort_if(!$this->requestApplication, 404);
    }
    public function render()
    {
        return view('livewire.requester.view-request');
    }
}
