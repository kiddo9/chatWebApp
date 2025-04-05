<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Events\notification;
use App\Models\messages;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatSpace extends Component
{
    public $friend;
    public $friendId;
    public $roomId;
    public $text;
    public $chats = [];
    public $openChatSpace = false;


    #[On('cred')]
    public function openChat($FriendId, $chatSpaceId){

        $friend = User::find($FriendId);
        if(!$friend){
            session()->flash('error', 'friend not found');
            return;
        }

        $this->friend = $friend->username;
        $this->friendId = $friend->id;
        $this->roomId  = $chatSpaceId;

        $this->getmesseages();
        
        $this->openChatSpace = true;
        $this->dispatch('closeMessage', Close:true);
        $this->dispatch('chatRoomSelected');

    }

    public function sendText(){
        if($this->text == '' || $this->text == null){
            return;
        }

        $sender = auth()->user()->id;
        $receiver = $this->friendId;

         $chat = messages::create([
            'chatRoomId' => $this->roomId,
            'senderId' => $sender,
            'receiverId' => $receiver,
            'message' => $this->text,
            'seen' => 0
        ]);

        $notification = [
            'receiverId' => $receiver,
            'message' => "{$this->friend} texted you. \n text: {$this->text}",
        ];

        broadcast(new MessageSent($chat))->toOthers();

        $this->text = '';
        $this->getmesseages();

        broadcast(new notification('chat', $notification ))->toOthers();
    }

    #[On('messageReceived')]
    public function getmesseages(){
        $messages = messages::where('chatRoomId', $this->roomId)->orderBy('created_at', 'asc')->get();

        if($messages != null || count($messages) != 0){
            $this->chats = $messages;
        }
        $this->chats = $messages;
    }

    public function Back(){
        $this->openChatSpace = false;
        $this->dispatch('back', Back:false);
    }

    public function render()
    {
        
        return view('livewire.chat-space', [
            'chats' => $this->chats
        ]);
    }
}
