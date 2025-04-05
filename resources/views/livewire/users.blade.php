<div>
    <div class="absolute right-5 top-6">
        <div class="relative cursor-pointer" wire:click='$js.openRequest'>
            @if (count($requests) != null)
              <div class="w-3 h-3 rounded-full bg-red-500 text-white absolute -right-2 text-sm text-center py-3 px-3 flex justify-center items-center -mt-2">{{count($requests)}}</div>  
            @endif
            <p class="bg-[#615EF0] text-white px-3 py-2 rounded-lg">Requests</p>
        </div>
        
    </div>
    <div class="ml-20 px-4 py-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pt-20 gap-5 overflow-y-scroll pb-64">
        @foreach ($users as $user)
        @if (auth()->check() && auth()->user()->id != $user->id)
            <div wire:key='${{$user['id']}}' class="flex gap-3 items-center cursor-pointer bg-[#605ef072] px-3 py-2 rounded-2xl" wire:click='$js.openProfileView({{$user->id}})'>
                @if ($user['image'] == null)
                <p class="w-12 h-12 rounded-xl justify-center items-center flex text-white bg-[#615EF0]">IM</p>
                @else
                <img src="{{ asset('storage/images/' . $user['image']) }}" class="w-12 h-12 rounded-xl">

                @endif 
                
                <div>
                    <p>{{$user['username']}}</p>
                    <p class="flex font-bold"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    {{$user['location']}}</p>
                    <div class="flex flex-wrap gap-4 mt-4">
                        @foreach (array_slice(json_decode($user['hobbys']), 1, 2) as $hob)
                            <p class="py-1 px-2 border border-black rounded-lg">{{$hob}}</p>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        @endif
            
        @endforeach

    </div>


        <div id="requests" wire:ignore.self class="h-[100vh] w-96 bg-white translate-x-[100%] transition duration-150 ease-in-out z-[10000000000000000000] shadow-2xl fixed top-0 right-0 px-3 py-2">
            <div class="flex  justify-between">
                <svg wire:click='$js.closeRequest' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 text-red-500 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>

                  <p>{{count($requests)}} request</p>
            </div>

            <div class="flex flex-col gap-3 mt-7">
                @foreach ($requests as $request)
                @php
                    $senderDetails = $users->firstWhere('id', $request['senderId']);
                @endphp
            
                {{-- @if (is_array($senderDetails)) Ensure $senderDetails is an array --}}
                    <div class="flex gap-3 items-center justify-between bg-[#605ef072] px-3 py-2 rounded-2xl">
                        <div class="flex gap-3 items-center">
                            @if (empty($senderDetails['image']))
                                <p class="w-12 h-12 rounded-xl justify-center items-center flex text-white bg-[#615EF0]">IM</p>
                            @else
                                <img src="{{ asset('storage/images/' . $senderDetails['image']) }}" class="w-12 h-12 rounded-xl">
                            @endif
            
                            <p class="font-semibold">{{ $senderDetails['username'] }}</p>
                        </div>
                        
            
                        <div class="flex gap-6">
                            <button class="bg-green-500 py-1 px-3 relative rounded-md text-white" wire:click='comfirmRequest({{$request['requestId']}})'>
                                <p wire:loading.remove>Accept</p> 
                                <div wire:loading>
                                    <livewire:loader />
                                </div>
                            </button>
                            <button class="bg-red-500 py-1 px-3 relative rounded-md text-white" wire:click='rejectRequest({{$request['requestId']}})'>
                                <p wire:loading.remove>Reject</p> 
                                <div wire:loading>
                                    <livewire:loader />
                                </div>
                            </button>
                        </div>
                    </div>
                {{-- @endif --}}
            @endforeach
            
            @if (count($requests) == 0)
                <div class="flex justify-center items-center my-44">
                    <p>No request</p>
                </div>
            @endif

            </div>

        </div>
    


    {{-- <div id="profile_view" wire:ignore.self class="fixed inset-0 -z-50 opacity-0 bg-white transition-all duration-150 ease-in-out">
        <div wire:click='$js.closeProfileView'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>              
        </div>

        <div wire:ignore.self class="relative mt-4 overflow-y-scroll pb-44 h-[100%]">
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
    </div> --}}

    
</div>

@script
<script>
    $js('openRequest', () => {
        document.getElementById('requests').classList.remove("translate-x-[100%]")
        document.getElementById('requests').classList.add("translate-x-0")
    })

    $js('closeRequest', () => {
        document.getElementById('requests').classList.add("translate-x-[100%]")
        document.getElementById('requests').classList.remove("translate-x-0")
    })
    $js('openProfileView', (userId) => {
        
        setTimeout(() => {
            document.getElementById('profile_view').classList.add("opacity-100", "z-[10000000000000000]")
            document.getElementById('profile_view').classList.remove("opacity-0", "-z-50")
        
        }, 500);

        $wire.call('getuser', userId)
        
    })
    $js('closeProfileView', () => {
        $wire.call('resetFriend')

        document.getElementById('profile_view').classList.remove("opacity-100", "z-[10000000000000000]")
        document.getElementById('profile_view').classList.add("opacity-0", "-z-50")
    })

    $js('open', () => {
        document.getElementById('profile_view').classList.remove("opacity-100", "z-[10000000000000000]")
        document.getElementById('profile_view').classList.add("opacity-0", "-z-50")

        document.getElementById('requests').classList.remove("translate-x-[100%]")
        document.getElementById('requests').classList.add("translate-x-0")
    })

    

</script>
@endscript