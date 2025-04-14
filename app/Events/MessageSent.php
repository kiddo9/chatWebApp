<?php

    namespace App\Events;

    use App\Models\messages;
    use Illuminate\Broadcasting\Channel;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Broadcasting\PrivateChannel;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;

    class MessageSent implements ShouldBroadcastNow
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

        public $chat;

        /**
         * Create a new event instance.
         */
        public function __construct( $chat)
        {
            //
            $this->chat = $chat;
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return array<int, \Illuminate\Broadcasting\Channel>
         */
        public function broadcastOn()
        {
            $channel = new Channel("chat.{$this->chat->chatRoomId}");
            return $channel;
        }

        public function broadcastAs()
        {
            return 'messagesent';
        }
        public function broadcastWith()
        {
            $data = [
                'chatRoomId' => $this->chat->chatRoomId,
                'senderId' => $this->chat->senderId,
                'receiverId' => $this->chat->receiverId,
                'message' => $this->chat->message,
            ];
            return $data;
        }
    
    }
