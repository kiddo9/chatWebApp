<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Notify extends Component
{
    #[On('chatNotification')]
    public function notification($chatMessage){
        session()->flash('chat', $chatMessage);
        $this->dispatch('updateUI'); 
    }

    #[On('requestNotification')]
    public function Requestnotification($requestMessage){
        session()->flash('request', $requestMessage);
        $this->dispatch('updateUI'); 
    }

    #[On('removeNotification')]
    public function clearSession()
    {
        session()->forget('chat');
        session()->forget('request');
    }

    public function render()
    {
        return view('livewire.notify');
    }
}
