<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Document;
use App\Traits\WithCaching;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Documents extends Component
{
    use WithPagination, WithCaching, Actions;

    public $search;

    public $showPrimaryModal = false;

    public $primaryModalMode = 'create';

    public $editing;

    public function rules()
    {
        if ($this->primaryModalMode === 'create') {
            return [
                'editing.name' => 'required|string|max:255|unique:documents,name',
                'editing.amount' => 'required|string|max:255',
            ];
        } elseif ($this->primaryModalMode === 'edit') {
            return [
                'editing.name' => 'required|unique:documents,name,' . $this->editing->id,
                'editing.amount' => 'required|numeric',
            ];
        }
    }

    public function makeBlankDocument()
    {
        return Document::make();
    }

    public function getRowsQueryProperty()
    {
        return Document::query();
    }

    public function getRowsProperty()
    {
        if ($this->search) {
            $this->rowsQuery->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%');
        }

        return $this->cache(function () {
            return $this->rowsQuery->paginate(10);
        });
    }

    public function create()
    {
        $this->primaryModalMode = 'create';

        $this->useCacheRows();

        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankDocument();
        }

        $this->showPrimaryModal = true;
    }

    public function edit(Document $document)
    {
        $this->primaryModalMode = 'edit';

        $this->useCacheRows();
        
        $this->editing = $document;

        $this->showPrimaryModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->notification()->success('Successfully updated');

        $this->showPrimaryModal = false;
    }

    public function mount()
    {
        $this->editing = $this->makeBlankDocument();
    }

    public function render()
    {
        return view('livewire.registrar.documents', [
            'documents' => $this->rows,
        ]);
    }
}
