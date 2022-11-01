<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;

class UserNotification extends Component
{
    public $campus_id;

    public function getListeners()
    {
        return [
            'refreshNotification' => '$refresh',
            "echo-private:notification.{$this->campus_id},NewRequest" => '$refresh',
        ];
    }

    public function mount()
    {
        $this->campus_id = auth()->user()->campus_id;
    }

    public function render()
    {
        return view('livewire.registrar.user-notification', [
            'notifications' => auth()->user()->notifications,
        ]);
    }
}
