<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\EnviarMensaje;
use App\Models\Chatreal;


class ChatForm extends Component
{
    public $nombre;

    public $mensaje;

    public $ias= 3;

    protected $queryString = ['ias'];


    public function mount()
    {
        $this->nombre = "";
        $this->mensaje = "";
    }

    public function enviarMensaje(){

        $this->validate([
            "mensaje" => "required"
        ]);


        //Guardar en base de datos

        $this->emit("mensajeEnviado");

        $datos = [
            "usuario" => $this->nombre,
            "mensaje" => $this->mensaje
        ];
        //$this->emit("mensajeRecibido",$datos);


        $nuevo = new Chatreal;
        $nuevo->envia = 2;
        $nuevo->recibe = 2;
        $nuevo->mensaje = $this->mensaje;
        $nuevo->save();

        event(new EnviarMensaje($this->nombre,$this->mensaje));
        
        $this->reset('mensaje');

    }

    public function render()
    {
        return view('livewire.chat-form');
    }


}
