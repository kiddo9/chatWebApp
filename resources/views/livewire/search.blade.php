<div>
    <div class="flex justify-center float-right md:float-none md:mx-auto items-center bg-gray-300 mt-10 w-72 mr-2  md:w-[30rem] rounded-xl" >
        <input wire:model.live.debounce.100ms="search" type="text" class="md:w-[25rem] w-64 py-3 px-2 outline-0" placeholder="search">
        <img wire:click='updatedQuery' src="search.svg" alt="" srcset="">
    </div>
    @if (!empty($users))
        <div wire:transition class="absolute left-5 right-5 md:left-10 md:right-10 px-3 py-4 bg-white rounded shadow-xl top-28 md:top-28 ml-20">
            @foreach ($users as $user)
                <ul class="flex justify-center mx-auto flex-col">
                    @if ($user['id'] == auth()->id())
                    <li class="text-black cursor-pointer px-2 py-3 text-xl flex gap-4">
                        <a href="/settings" wire:navigate class="text-black cursor-pointer px-2 py-3 text-xl flex gap-4">
                        @if ($user['image'] != null)
                            <img class="rounded-full w-10 h-10" src="{{ asset('storage/images/'.$user['image']) }}" alt="">
                            
                        @endif
                        {{$user['username']}}
                    </a>
                    </li>
                    @else
                        <li wire:click="userprofile({{$user['id']}})" class="text-black cursor-pointer px-2 py-3 text-xl flex gap-4">
                            @if ($user['image'] != null)
                                <img class="rounded-full w-10 h-10" src="{{ asset('storage/images/'.$user['image']) }}" alt="">
                                
                            @endif
                            {{$user['username']}}
                        </li>
                    @endif
                    
                </ul>
                
            @endforeach
        </div>
    
    @endif

    @if ($search != "" && count($users) == 0)
        <div wire:transition class="absolute left-5 right-5 md:left-10 md:right-10 px-3 py-4 bg-white rounded shadow-xl top-28 md:top-28 ml-20">
            <p class="text-gray-500">No results found</p>
        </div>
    @else
    
    @endif
    
</div>
