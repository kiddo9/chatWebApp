 <div class="{{$openChatSpace == true ? 'block z-[10000000000000000000] w-full border-r-0 md:border-r  bg-white' : 'hidden'}} sm:w-full sm:block h-[100vh]">
    @if ($friend == null)
        <div class="flex justify-center items-center my-56">
            <p class="text-2xl">chat here</p>
        </div>
    @else
        
    <header class="flex justify-between items-center px-4 py-4 h-20 sticky border-b border-b-gray-400">
          
          <div class="flex items-center">
            <svg wire:click='Back' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 absolute md:hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>

            <div class="flex pl-8 md:pl-0 justify-between items-center gap-3">
                <p class="w-12 h-12 rounded-xl justify-center items-center flex text-white bg-[#615EF0]">IM</p>
                <div>
                    <p>{{$friend}}</p>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <p class="text-[10px]">online</p>
                    </div>
                </div>

            </div> 
           </div>
        <div class="flex gap-1 bg-[#605ef072] px-3 py-1 rounded-md items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-[#615EF0]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
              <p class="text-[#615EF0]">call</p>                  
        </div>
    </header>

    <div id="messages" class="mt-5 px-4 flex flex-col h-[77%] gap-2 overflow-y-scroll">
        @foreach ($chats as $chat)

            <div class="{{$chat->senderId == auth()->user()->id ? 'text-right justify-end' : 'text-left'}} flex flex-wrap">
                <p class="px-2 py-3 text-[10px]  {{$chat->senderId == auth()->user()->id ? 'bg-[#615EF0] text-white' : 'bg-gray-300 text-black'}} rounded-xl"> {{$chat->message}}</p>
            </div>
          
         @endforeach
    </div>

 <div class="flex absolute bottom-4 items-center xl:justify-center px-4 gap-5">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
      </svg>

      <div class="flex items-center flex-grow justify-between border w-80 sm:w-[26rem] lg:w-[41rem] xl:w-[53rem] 2xl:w-[63rem] rounded-md h-10 border-gray-300 px-3 py-3">
        <input wire:model='text' type="text" class="w-full outline-0 border-0" placeholder="Type a message" />
        <button wire:click='sendText'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#615EF0] cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>
          </button>
          
      </div>
      
</div> 

@endif
</div> 
@script
    <script>
       
        window.addEventListener('chatRoomSelected', () => {
            let roomId = $wire.roomId;
            let channel = window.Echo.channel(`chat.${roomId}`);
            
            channel.listen(".messagesent", (data) => {
                   console.log("message details: ", data, data.message);
                   Livewire.dispatch('messageReceived');   
            
                    let chatBox = document.getElementById("messages");
                    if (chatBox) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                //}, 100);
                 
                })
                .subscription.bind("pusher:subscription_succeeded",  () => {
                    console.log(`✅ Successfully subscribed to chat.${roomId}!`);
                });
              
                setTimeout(() => {
                    let chatBox = document.getElementById("messages");
                    if (chatBox) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                }, 100);
        });
        
    </script>
@endscript
