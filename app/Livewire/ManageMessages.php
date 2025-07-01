<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class ManageMessages extends Component
{
    public $content;
    public $messages;

    public function mount(){
        $this->messages = Message::latest()->get();
    }

    public function save(){
        $this->validate([
            'content' =>'required|string|min:3'
        ]);

        Message::create([
            'content' => $this->content,
            'user_id' => auth()->id()
        ]);

        $this->content = '';
    }
    public function render()
    {
        return view('livewire.manage-messages');
    }
}
