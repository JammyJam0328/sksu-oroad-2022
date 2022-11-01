<?php

namespace App\Http\Livewire\Registrar\Request;

use App\Models\RequestApplication;
use App\Models\Status;
use App\Traits\WithCaching;
use Livewire\Component;
use Livewire\WithPagination;

class RequestList extends Component
{
    use WithPagination, WithCaching;

    public $filter_status;

    public $filter_name;

    public $search = null;

    public $queryString = ['filter_status', 'filter_name', 'search'];

    public $statuses = [];

    public function getRowsQueryProperty()
    {
        return RequestApplication::where('destination_campus_id', auth()->user()->campus_id)
                ->with(['request_document.document', 'campus']);
    }

    public function getRowsProperty()
    {
        if ($this->filter_status) {
            $this->rowsQuery->where('status_id', $this->filter_status);
        }

        if ($this->search) {
            $this->rowsQuery->where('code', $this->search)->orWhere('first_name', 'like', '%'.$this->search.'%')->orWhere('last_name', 'like', '%'.$this->search.'%');
        }

        return $this->cache(function () {
            return $this->rowsQuery->paginate(10);
        });
    }

    public function selectStatusFilter($id, $name)
    {
        $this->filter_status = $id;
        $this->filter_name = $name;
    }

    public function clearStatusFilter()
    {
        $this->filter_status = null;
        $this->filter_name = null;
    }

    public function mount()
    {
        $this->statuses = Status::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.registrar.request.request-list', [
            'request_applications' => $this->rows,
        ]);
    }
}
