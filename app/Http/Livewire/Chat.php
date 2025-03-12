<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{

    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(100)->get()->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }

}

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatBox extends Component
{
    public $receiver_id, $message, $messages;
    public function mount($receiver_id)
    {
        $this->receiver_id = $receiver_id;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Chat::where(function ($query) {
            $query->where('user_id', Auth::id())->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('user_id', $this->receiver_id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function sendMessage()
    {
        $this->validate();

        Chat::create([
            'user_id' => Auth::id(),
            'receiver_id' => $this->receiver_id,
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}

