<?php

namespace App\Http\Livewire\Registrar\Request;

use App\Models\RequestApplication;
use App\Models\Status;
use Livewire\Component;
use  Livewire\WithPagination;
class RequestList extends Component
{
    use WithPagination;
    public $filter=[];
    
    public $statuses = [];

    public $queryString = ['filter'];

    public function mount()
    {
        $this->statuses = Status::all('id','name');
    }
    public function render()
    {
        return view('livewire.registrar.request.request-list',[
            'request_applications' => RequestApplication::where('destination_campus_id', auth()->user()->campus_id)
                                ->when($this->filter, function($query){
                                    $query->whereIn('status_id',$this->filter);
                                })
                                ->with(['request_document.document','campus'])
                                ->paginate(10)
        ]);
    }
}
