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

            <div wire:loading class="float-right mt-4 mr-6 mb-3 relative">
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="flex flex-col gap-3 mt-12">
                @foreach ($requests as $request)
                @php
                    $senderDetails = $users->firstWhere('id', $request['senderId']);
                @endphp
            
                {{-- @if (is_array($senderDetails)) Ensure $senderDetails is an array --}}
                    <div class="flex gap-3 items-center justify-between bg-[#605ef072] px-3 py-2 rounded-2xl">
                        <div wire:click='$js.openProfileView({{$senderDetails['id']}})' class="flex gap-3 items-center cursor-pointer">
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
                            </button>
                            <button class="bg-red-500 py-1 px-3 relative rounded-md text-white" wire:click='rejectRequest({{$request['requestId']}})'>
                                <p wire:loading.remove>Reject</p> 
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
   
    $js('open', () => {
        document.getElementById('profile_view').classList.remove("opacity-100", "z-[10000000000000000]")
        document.getElementById('profile_view').classList.add("opacity-0", "-z-50")

        document.getElementById('requests').classList.remove("translate-x-[100%]")
        document.getElementById('requests').classList.add("translate-x-0")
    })

    

</script>
@endscript