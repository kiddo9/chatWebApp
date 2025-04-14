<div class="ml-22 flex flex-col lg:flex-row justify-center gap-7 items-center px-5 py-5">
        <svg id='open' wire:click='$js.open' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 px-1 rounded-full py-1 text-[#615EF0] absolute right-3 top-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
        </svg>

        <svg id="close" wire:click='$js.close' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 px-1 rounded-full py-1 text-red-500 hidden fixed right-3 top-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
          
      <div id="options" class="fixed translate-x-[200%] transition duration-500 top-2 z-50 px-3 py-6 shadow-2xl right-12 bg-white">
        <button type="button" wire:click='$js.logout("logout")' class="flex cursor-pointer gap-3 px-2 py-2 w-56 sm:w-80 rounded-xl justify-center text-white mt-5 bg-[#615EF0]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
            </svg>
            <p class="text-xl">logout</p>              
        </button>
        <button wire:click='$js.delete("delete")' class="flex gap-3 px-2 py-2 cursor-pointer w-56 sm:w-80 rounded-xl justify-center text-white mt-5 bg-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            <p class="text-xl">delete account </p>
        </button>
      </div>
      
    <div class="relative w-48 h-48 rounded-full">
        @if ($image == null)
            <div class="w-48 h-48 border-2 flex justify-center items-center border-gray-600 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                  </svg>                  
            </div>
        @else
           <img src="{{asset('storage/images/'. $image)}}" class="w-48 h-48 border-2 border-gray-600 rounded-full" alt="" srcset=""> 
        @endif          

        @if ($image != null)
            <div class="absolute size-10 px-2 py-2 rounded-full bottom-5 text-white bg-red-500 flex -mt-3 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
        @else
            <div class="absolute size-10 px-2 py-2 rounded-full bottom-5 text-white bg-[#615EF0] -mt-3 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>              
            </div>
        @endif
          
    </div>

    <form class="mt-6 flex flex-col gap-3" action="">
        <input value="{{$username}}" class="px-2 py-2 w-72 sm:w-80 rounded-xl outline-0 border border-[#615EF0]" type="text">
        <input value="{{$location}}" class="px-2 py-2 w-72 sm:w-80 rounded-xl outline-0 border border-[#615EF0]" type="text">
        <input value='{{$status}}' class="px-2 py-2 w-72 sm:w-80 rounded-xl outline-0 border border-[#615EF0]" type="text">
        <textarea class="px-2 py-2 w-72 sm:w-80 rounded-xl outline-0 border border-[#615EF0]"v name="" id="" cols="30" rows="10">{{$bio}}</textarea>
        <div class="flex gap-3 flex-wrap">
            @foreach ($hobbys as $hobby)
                <p class="py-2 px-2 border rounded-xl border-[#615EF0]">{{$hobby}}</p>
            @endforeach
        </div>

        <button class="px-2 py-2 w-72 sm:w-80 rounded-xl text-white mt-5 bg-[#615EF0]">Update</button>

    </form>

    <div id="show" class="bg-[#0000009f] opacity-0 -z-40 transition duration-150 ease-in-out fixed inset-0">
        <div class="bg-white px-4 py-4 absolute left-[50%] top-[50%] w-80 sm:w-96 h-44 rounded-xl translate-x-[-50%] translate-y-[-50%]">
            <p id="warning" class="text-center"></p>
            <div class="flex justify-between absolute bottom-5 left-0 right-0 px-9">
                <button wire:click='$js.closed' class="cursor-pointer">NO</button>
                <button id="Logout" wire:click='$js.Logout' class="cursor-pointer hidden">YES</button>
                <button id="Delete" wire:click='$js.Delete' class="cursor-pointer hidden">YES</button>
            </div>
           
        </div>
    </div>

    <div wire:loading>
        <div class='absolute inset-0 z-[1000000000000000000000000] bg-[#000000b7]'>
            <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

</div>
@script
<script>
    $js('open', () => {
        document.getElementById('open').classList.add('hidden');
        document.getElementById('options').classList.remove('translate-x-[200%]');
        document.getElementById('options').classList.add('translate-x-0');
        document.getElementById('close').classList.remove('hidden');
        document.getElementById('close').classList.add('block');
        
    })

    $js('close', () => {
        document.getElementById('open').classList.remove('hidden');
        document.getElementById('open').classList.add('block');
        document.getElementById('options').classList.add('translate-x-[200%]');
        document.getElementById('options').classList.remove('translate-x-0');
        document.getElementById('close').classList.add('hidden');
        document.getElementById('close').classList.remove('block');
    })

    $js('logout', (logout) => {
        let show = document.getElementById('show');
        show.classList.remove("opacity-0", "-z-40");
        show.classList.add("opacity-100", "z-[10000000000000]");
        document.getElementById('open').classList.remove('hidden');
        document.getElementById('open').classList.add('block');
        document.getElementById('options').classList.add('translate-x-[200%]');
        document.getElementById('options').classList.remove('translate-x-0');
        document.getElementById('close').classList.add('hidden');
        document.getElementById('close').classList.remove('block');

        if(logout == "logout"){
            document.getElementById("warning").innerHTML = "Are ou sure you want logout?";
            document.getElementById("Logout").classList.remove("hidden");
            document.getElementById("Delete").classList.add("hidden");
        }
    })

    $js('delete', (Delete) => {
        let show = document.getElementById('show');
        show.classList.remove("opacity-0", "-z-40");
        show.classList.add("opacity-100", "z-[10000000000000]");
        document.getElementById('open').classList.remove('hidden');
        document.getElementById('open').classList.add('block');
        document.getElementById('options').classList.add('translate-x-[200%]');
        document.getElementById('options').classList.remove('translate-x-0');
        document.getElementById('close').classList.add('hidden');
        document.getElementById('close').classList.remove('block');

        if(Delete == "delete"){
            document.getElementById("warning").innerHTML = "Are you sure you want delete your account?";
            document.getElementById("Delete").classList.remove("hidden");
            document.getElementById("Logout").classList.add("hidden");
        }
    })

    $js('Delete', () => {
        
        $wire.call('Delete');

        let show = document.getElementById('show');
        show.classList.add("opacity-0", "-z-40");
        show.classList.remove("opacity-100", "z-[10000000000000]");
    })

    $js('Logout', () => {
        
        $wire.call('logout');

        let show = document.getElementById('show');
        show.classList.add("opacity-0", "-z-40");
        show.classList.remove("opacity-100", "z-[10000000000000]");
    })

    $js('closed', () => {
        let show = document.getElementById('show');
        show.classList.add("opacity-0", "-z-40");
        show.classList.remove("opacity-100", "z-[10000000000000]");
    })
</script>
@endscript

