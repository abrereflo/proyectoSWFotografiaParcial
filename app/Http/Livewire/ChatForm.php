<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{
    public $mensaje="";
    public $nombre= "";

    public function mount(){
        $this->nombre="";
        $this->mensaje=""; 
    }
    public function render()
    {
        return view('livewire.chat-form');
    }
    public function enviarmensaje(){
        $this->emit("MensajeEnviado");

        $datos = [
            "usuario"=> $this->nombre,
            "mensaje"=> $this->mensaje
        ];
        $this->emit("MensajeRecibido", $this->$datos);
    }
}
