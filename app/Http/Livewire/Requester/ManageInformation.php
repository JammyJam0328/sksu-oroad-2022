<?php

namespace App\Http\Livewire\Requester;

use App\Models\Campus;
use App\Models\Information;
use App\Models\StudentStatus;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ManageInformation extends Component
{
    use Actions, WithFileUploads;

    public $has_information = null;

    public $campuses = [];

    public $programs = [];

    public $student_statuses = [];

    public $information = [
        'student_id' => null,
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
        'has_changed_last_name' => null,
        'old_last_name' => null,
        'birth_date' => null,
        'address' => null,
        'contact_number' => null,
        'program_id' => null,
        'campus_id' => null,
        'student_status_id' => null,
        'sex' => null,
    ];

    public $validationAttributes = [
        'information.student_id' => 'Student ID',
        'information.first_name' => 'First Name',
        'information.middle_name' => 'Middle Name',
        'information.last_name' => 'Last Name',
        'information.has_changed_last_name' => 'Has Changed Last Name',
        'information.old_last_name' => 'Old Last Name',
        'information.birth_date' => 'Birth Date',
        'information.address' => 'Address',
        'information.contact_number' => 'Contact Number',
        'information.program_id' => 'Program',
        'information.campus_id' => 'Campus',
        'information.student_status_id' => 'Student Status',
        'information.sex' => 'Sex',
        'information.valid_id' => 'Valid ID',
    ];

    public function updatedInformationCampusId()
    {
        $this->programs = Campus::find($this->information['campus_id'])->programs;
    }

    public function userInformation()
    {
        $this->has_information = auth()->user()->information;
        if ($this->has_information) {
            $this->information = auth()->user()->information->toArray();
            $this->programs = Campus::find($this->information['campus_id'])->programs;
        }
    }

    public function mount()
    {
        $this->student_statuses = StudentStatus::all();
        $this->campuses = Campus::all('id', 'name');
        $this->userInformation();
    }

    public function createOrUpdateInformation()
    {
        $this->validate([
            'information.student_id' => 'required',
            'information.first_name' => 'required',
            'information.middle_name' => 'required',
            'information.last_name' => 'required',
            'information.has_changed_last_name' => 'nullable',
            'information.old_last_name' => 'required_if:information.has_changed_last_name,1',
            'information.birth_date' => 'required',
            'information.address' => 'required',
            'information.contact_number' => 'required',
            'information.program_id' => 'required',
            'information.campus_id' => 'required',
            'information.student_status_id' => 'required',
            'information.sex' => 'required',
            'information.valid_id' => 'required|image|max:2048',
        ]);

        if ($this->has_information) {
            $information = Information::find($this->has_information->id);
            $information->update($this->information);
        } else {
            Information::create([
                'user_id' => auth()->user()->id,
                'student_id' => $this->information['student_id'],
                'first_name' => $this->information['first_name'],
                'middle_name' => $this->information['middle_name'],
                'last_name' => $this->information['last_name'],
                'has_changed_last_name' => $this->information['has_changed_last_name'] ?? 0,
                'old_last_name' => $this->information['old_last_name'],
                'birth_date' => $this->information['birth_date'],
                'address' => $this->information['address'],
                'contact_number' => $this->information['contact_number'],
                'program_id' => $this->information['program_id'],
                'campus_id' => $this->information['campus_id'],
                'student_status_id' => $this->information['student_status_id'],
                'sex' => $this->information['sex'],
                'valid_id' => $this->information['valid_id']->store('id', 'public'),
            ]);
        }

        $this->notification()->success(
            $title = 'Success!',
            $message = 'Information has been saved.'
        );
        $this->userInformation();
    }

    public function render()
    {
        return view('livewire.requester.manage-information');
    }
}
