<?php

namespace App\Livewire;

use App\Events\MessageSend;
use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageMessages extends Component
{
    public $content;
    public $messages;

    public function mount(){
        $this->getMessages();
    }

    public function save(){
        //revisar a validadcion
        Message::create([
            'content' => $this->content,
            'user_id' => auth()->id()
        ]); 

        $this->content = '';
        //emitir un evento de notificacion a otros usuarios
        MessageSend::dispatch();
    }

    #[On('echo:chat,MessageSend')]
    public function getMessages(){
        $this->messages = Message::with('user')->latest()->get();
    }

    public function render()   {
        return view('livewire.manage-messages');
    }
}
