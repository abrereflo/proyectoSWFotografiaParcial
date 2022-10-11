<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatList extends Component
{
    public $mensajes;

    protected $listeners= ["MensajeRecibido"];

    public function mount(){
        $this->mensajes=[];
    }

    public function MensajeRecibido($mensaje){
        $this->mensajes[] = $mensaje;
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
