<div>
    <div id="profile_view">
        <div class="absolute bg-white flex justify-center items-center w-10 h-10 rounded-full left-3 top-3 z-50" onclick='history.back()'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>              
        </div>

        <div wire:ignore.self class="relative overflow-y-scroll pb-44 h-[100%]">
            <div class="bg-[#615EF0] w-full h-56 -z-50">
                @if ($image == null)
                    <p class="w-full h-56 text-center flex justify-center items-center text-white">No cover image</p>
                @else
                    <img src="{{asset('storage/images/'. $image)}}" class="w-full h-56 object-cover" />
                @endif
            </div>
            
            @if ($image == null)
                <p class="w-44 h-44 border-4 flex bg-[#605ef0a6] text-white drop-shadow-md justify-center items-center border-white text-center rounded-full -mt-28 ml-1">no image</p>
            @else

                <img src="{{asset('storage/images/'. $image)}}" class="w-44 h-44 border-4 drop-shadow-md border-white rounded-full -mt-28 ml-1" />
            @endif

            

            <h1 class="px-3 mt-5 text-3xl font-bold">{{$username}}</h1>

            <div class="px-3 flex gap-3 items-center">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>

                    <p class="text-gray-500" >{{$location}}, </p>
                </div>

                <p class="text-gray-500">{{count($friends) == null ? '0' : count($friends) }} friends</p>
            </div>


            <div class="flex flex-row items-center mt-5">

                    
                @if (session('success') || isset($RId))
                <button class="mx-2 relative py-2 px-2 w-72 text-white rounded-lg bg-[#615EF0]">
                    <div class="flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p>{{ session('success', 'sent') }}</p>
                    </div>
                </button>
            @elseif (isset($SenderId))
                <button wire:click='$js.open' class="mx-2 relative py-2 px-2 w-72 text-white rounded-lg bg-[#615EF0]">
                    <p wire:loading.remove>requested to be friends</p> 
                </button>
            @elseif ($areFriends == true)
                <button class="mx-2 relative py-2 px-2 w-72 text-white rounded-lg bg-[#615EF0]">
                    <p>FRIENDS</p> 
                </button>
            @else
                <button wire:click="$js.sendFriendRequest({{ $id }})" class="mx-2 relative py-2 px-2 w-72 text-white rounded-lg bg-[#615EF0]">
                    <p wire:loading.remove>be friends</p> 
                    <div wire:loading>
                        <livewire:loader />
                    </div>
                </button>
            @endif         
                    
                
            @if ($areFriends == true)
            <a href="/messages" wire:navigate>
                <button class="bg-[#605ef0ab] flex justify-center items-center w-20 py-2 px-2 text-white rounded-lg"> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </button>
            </a>
            @else
                <button class="bg-[#605ef0ab] flex justify-center items-center w-20 py-2 px-2 text-white rounded-lg"> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </button>
            @endif
                
            </div>

            <div class="flex items-center px-2 gap-1 py-2 mt-5">
                <p class="text-xl font-semibold">Status:</p>
                <p>{{$status}}</p>
            </div>

            <div class="flex flex-col px-2 gap-1 py-2 mt-5">
                <p class="text-xl font-semibold mb-3">About {{$username}}</p>
                <p>{{$bio}}</p>
            </div>

            <p class="text-xl font-semibold mb-3 px-2 mt-6">Hobbies</p>

            <div class="flex flex-wrap gap-2 px-2">
                @foreach ($hobbys as $hobby)
                    <p class="py-2 px-2 border-2 border-[#615EF0] rounded-lg">{{$hobby}}</p>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@script
<script>
        $js('sendFriendRequest', (userid) => {
        // Call the Livewire method
        $wire.call('sendFriendRequest', userid);
        });

</script>
@endscript