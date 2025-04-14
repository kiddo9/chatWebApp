 <div class="{{$openChatSpace == true ? 'block z-[10000000000000000000] w-full border-r-0 md:border-r  bg-white' : 'hidden'}} sm:w-full sm:block h-[100vh]">

    
    @if ($friend == null)
        <div class="flex justify-center items-center my-56">
            <p class="text-2xl">chat here</p>
        </div>
    @else
    <div id="pusher-Error" class="fixed hidden justify-center items-center top-0 left-1/2 transform -translate-x-1/2 bg-red-500 h-8 text-white text-sm p-2 rounded transition-all z-50 duration-300 ease-in-out w-80 sm:w-96">
        <span id="error-text" class="text-center"></span>
    </div>
    

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

            <div class="{{$chat->senderId == auth()->user()->id ? 'text-right justify-end' : 'text-left'}} flex flex-wrap" wire:transition>
                <p class="px-2 py-3 text-[10px]  {{$chat->senderId == auth()->user()->id ? 'bg-[#615EF0] text-white' : 'bg-gray-300 text-black'}} rounded-xl"> {{$chat->message}}</p>
            </div>
          
         @endforeach
    </div>

 <div class="flex absolute bottom-4 items-center xl:justify-center px-4 gap-5">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
      </svg>

      <div class="flex items-center flex-grow justify-between border w-80 sm:w-[26rem] lg:w-[41rem] xl:w-[53rem] 2xl:w-[63rem] rounded-md h-10 border-gray-300 px-3 py-3">
        <input id="text" wire:model='text' type="text" class="w-full outline-0 border-0" placeholder="Type a message" />
        <button class="relative">
            <svg wire:click='sendText' id="sendButton" wire:loading.remove xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#615EF0] cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>

            <div wire:loading class='absolute inset-0 z-40'>
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

          </button>
          
      </div>
      
</div> 

@endif
</div> 
@script
    <script>
        let pusher_Error = document.getElementById("pusher-Error")
        let pusherMessage = document.getElementById("error-text")

        window.addEventListener('chatRoomSelected', () => {
            let roomId = $wire.roomId;
            let channel = window.Echo.channel(`chat.${roomId}`);
           
            
            channel.listen(".messagesent", (data) => {
                   console.log("message details: ", data, data.message);
                   Livewire.dispatch('messageReceived');   
            
                   setTimeout(() => {
                    let chatBox = document.getElementById("messages");
                    if (chatBox) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                }, 100);
                 
                })
                .subscription.bind("pusher:subscription_succeeded",  () => {
                    console.log(`✅ Successfully subscribed to chat.${roomId}!`);
                    if(pusher_Error && pusherMessage){
                        setTimeout(() => {
                            pusher_Error.classList.add("z-50")
                            pusher_Error.classList.remove("-z-50")
                            pusherMessage.innerHTML = "connected sussefully"
                        }, 3000)
                    }else{
                        setTimeout(() => {
                            pusher_Error.classList.add("z-50")
                            pusher_Error.classList.remove("-z-50")
                            pusherMessage.innerHTML = "connected srth dey sup sussefully"
                        }, 3000)
                    }
                    
                    
                });
              
                setTimeout(() => {
                    let chatBox = document.getElementById("messages");
                    if (chatBox) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                }, 100);


                window.Echo.connector.pusher.connection.bind("error", function (err) {
                console.error("Pusher error:", err);

                if (err.error) {
                    console.error("Pusher error:", err.error);

                    if (
                        err.error.message &&
                        err.error.message.includes("Couldn't resolve host")
                    ) {
                        alert(
                            "Real-time features are currently unavailable. Please refresh or try again later."
                        );
                    }
                }

                // Display custom messages for users
                if (err.error.data && err.error.data.code === 4004) {
                    console.log("Pusher limit exceeded or connection failed.");
                } else if (err.type === "WebSocketError") {
                    console.log("Network issue. Trying to reconnect...");
                }
            });

            window.Echo.connector.pusher.connection.bind("disconnected", () => {
                console.log("Disconnected from chat. Please check your internet.");
            });

            window.Echo.connector.pusher.connection.bind("connecting", () => {
                console.log("Trying to connect to Pusher...");
            });

            window.Echo.connector.pusher.connection.bind("connected", () => {
                console.log("Connected to Pusher!");
            });
        });

        window.Echo.connector.pusher.connection.bind("unavailable", () => {
            console.log("Pusher is currently unavailable. Please try again later.");
            setTimeout(() => {
                pusher_Error.classList.add("z-50")
                pusher_Error.classList.remove("-z-50")
                pusherMessage.innerHTML = "Pusher is currently unavailable."
            }, 3000)
        });

        
    </script>
@endscript
