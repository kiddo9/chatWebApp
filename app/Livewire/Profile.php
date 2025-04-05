<?php

namespace App\Livewire;

use App\Events\notification;
use App\Models\friendRequest;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Profile extends Component
{
    public $id;
    public $username;
    public $location; 
    public $bio;
    public $hobbys = [];
    public $image;
    public $status;
    public $friends = [];

    public $requestId;
    public $senderId;
    public $receiverId;
    public $request_status;

    public $SenderId;
    public $RId;
    public $requests;
    public $areFriends = false;
    
    public function mount($id)
{
    $user = User::find($id);

    if ($user) {
        // Fetch the friend request only once
        $friendRequest = friendRequest::where('receiverId', $user->id)->where('senderId', auth()->id())->first();
        if($friendRequest){
            $this->RId = $user->id;
        }

        $FriendRequest = friendRequest::where('senderId', $user->id)->where('receiverId', auth()->id())->first();
        if($FriendRequest){
            $this->SenderId = $user->id;
        }

        // Assign user details
        $this->id = $user->id;  // Changed from `$this->id`
        $this->image = $user->image;
        $this->username = $user->username;
        $this->location = $user->location;
        $this->status = $user->status;
        $this->bio = $user->bio;
        $this->hobbys = json_decode($user->hobbys);
        $this->friends = json_decode($user->friends);

        // Check if they are friends
        $this->areFriends = !empty($this->friends) && in_array(auth()->id(), $this->friends);
    }
}


    public function sendFriendRequest($userId){
        $this->requestId = rand(1000000, 9999999);
        $this->senderId = auth()->user()->id;
        $this->receiverId = $userId;
        $this->request_status = 'pending';

        friendRequest::create([
            'requestId' => $this->requestId,
            'senderId' => $this->senderId,
            'receiverId' => $this->receiverId,
            'request_status' => $this->request_status,
        ]);

        sleep(3);
        session()->flash('success', 'sent');
        $notification = [
            'receiverId' => $this->receiverId,
            'message' => "you have new friend request",
        ];

        broadcast(new notification('request', $notification))->toOthers();
    }

    public function placeholder(){
        return <<<'HTML'
        <div class='absolute inset-0 z-40'>
            <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        HTML;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.profile');
    }
}
