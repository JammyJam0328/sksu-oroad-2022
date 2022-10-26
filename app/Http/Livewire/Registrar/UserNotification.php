<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;

class UserNotification extends Component
{
    public function render()
    {
        return view('livewire.registrar.user-notification',[
            'notifications' => auth()->user()->notifications,
        ]);
    }
}
