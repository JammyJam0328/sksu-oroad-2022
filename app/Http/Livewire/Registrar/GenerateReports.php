<?php

namespace App\Http\Livewire\Registrar;

use App\Models\RequestApplication;
use App\Models\Status;
use Livewire\Component;

class GenerateReports extends Component
{
    public $date_range = [
        'from' => null,
        'to' => null,
    ];

    public $statuses = [];

    public $selected_type = '1';

    public $selected_status;

    public $report_types = [
        '1' => 'All Request Application',
        '2' => 'By Date',
        '2' => 'By Date Range',
    ];

    public function getHeaders()
    {
        switch ($this->selected_type) {
            case '1':
                return [
                    'Code',
                    'Full Name',
                    'Document',
                    'Status',
                ];
                break;
            case '2':
                return [
                    'Code',
                    'Full Name',
                    'Document',
                    'Status',
                ];
                break;
            case '3':
                return [
                    'Date',
                    'Code',
                    'Full Name',
                    'Document',
                    'Status',
                ];
                break;
        }
    }

    public function mount()
    {
        $this->statuses = Status::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.registrar.generate-reports', [
            'request_applications' => RequestApplication::where('destination_campus_id', auth()->user()->campus_id)
            ->when($this->date_range['from'], function ($query) {
                $query->whereDate('created_at', '>=', $this->date_range['from']);
            })
            ->when($this->date_range['to'], function ($query) {
                $query->whereDate('created_at', '<=', $this->date_range['to']);
            })
            ->when($this->selected_status, function ($query) {
                $query->where('status_id', $this->selected_status);
            })
            ->with(['request_document.document', 'campus', 'status'])
            ->get(),
        ]);
    }

    // public function loadAllRequestApplication()
    // {
    //     $this->request_applications =
    // }
}
