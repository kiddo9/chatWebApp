<div id="notification-container" class="z-[10000000000000000000000000000000000000] relative bg-white">
    @if (session('chat'))
        <div id="chat" 
            class="absolute left-5 right-5 md:left-10 md:right-10 px-3 py-4 bg-[#605ef0e1] rounded shadow-xl top-0 ml-20 z-[10000000000000000000000000000000000000]">
            <p class="text-white">{{ session('chat') }}</p>
        </div>

    @elseif(session('request'))
        <div id="request"
            class="absolute z-[10000000000000000000000000000000000000] left-5 right-5 md:left-10 md:right-10 px-3 py-4 bg-[#605ef0d4] rounded shadow-xl top-0 ml-20 ">
            <p class="text-white">{{session('request')}}</p>
        </div>

    @elseif(session('story'))
        <div x-init="show = true; setTimeout(() => show = false, 6000)" x-transition x-show="show" 
            class="absolute z-[10000000000000000000000000000000000000] left-5 right-5 md:left-10 md:right-10 px-3 py-4 bg-[#605ef0e2] rounded shadow-xl top-0 ml-20">
            <p class="text-white">{{session('story')}}</p>
        </div>
    @endif

    @if (session('request') || session('chat') || session('story'))
        <div wire:click='clearSession' class="absolute z-[10000000000000000000000000000000000000] right-5  md:right-10 px-2 py-2 top-0 md:top-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>          
        </div>
    @endif
</div>

@script
    <script>

    window.Echo.private(`notification.{{auth()->user()->id}}`)
    .listen('.notification', (e) => {
        if(e.type == 'chat'){
            console.log("message details: ", e.notification, e.notification.message);  
            Livewire.dispatch('chatNotification',{chatMessage: e.notification.message});
            setTimeout(() => {
                Livewire.dispatch('removeNotification');
            }, 3000); 
        }else if(e.type == 'request'){
            console.log("message details: ", e.notification, e.notification.message);  
            Livewire.dispatch('requestNotification', {requestMessage: e.notification.message});
            Livewire.dispatch('requestNotify');
            setTimeout(() => {
                Livewire.dispatch('removeNotification');
            }, 3000);
        }
        else if(e.type == 'story'){
            console.log("message details: ", e.notification, e.notification.message);  
            Livewire.dispatch('storyNotification', {storyMessage: e.notification.message});
        }
    });

    </script>
@endscript