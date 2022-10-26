<?php

namespace App\Http\Livewire\Requester;

use App\Models\RequestApplication;
use Livewire\Component;

class RequestList extends Component
{
    public function render()
    {
        return view('livewire.requester.request-list',[
            'request_applications' => RequestApplication::where('user_id',auth()->user()->id)
                ->with(['request_document.document','status'])
                ->orderBy('created_at','desc')
                ->get()
        ]);
    }
}
