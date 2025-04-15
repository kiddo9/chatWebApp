<div>
    <x-status />
<div class="flex flex-row justify-between"> {{-- class="grid grid-cols-1 lg:grid-cols-2" --}}
 <div class="ml-20 {{$closemessage == true ? 'hidden md:block' : 'block w-80'}} md:border-r sm:w-[23rem] h-[100vh] md:border-r-gray-400">
   <header class="flex justify-between items-center px-4 py-4 h-20 sticky border-b border-b-gray-400">
    <div class="flex gap-1 items-center justify-center">
        <h1 class="text-xl font-semibold">Messages</h1>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
          <span class="text-[10px] w-7 text-center bg-green-500 px-1 rounded-xl py-1">12</span>          
    </div>
    <a href="/users" wire:navigate>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-white px-1 rounded-full py-1 bg-[#615EF0]">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg></a>
      
   </header>
   <x-search />

   <div class="mt-10 flex flex-col md:grid md:grid-cols-2 lg:flex lg:flex-col gap-7">
   
    @foreach ($friends as $friend)
    <div wire:click='openChatSpace({{$friend['id']}})' class="flex justify-between px-3 items-center cursor-pointer">
        <div class="flex items-center gap-2 px-3 ">
        @if ($friend['image'] == null)
            <p class="w-12 h-12 rounded-xl justify-center items-center flex text-white bg-[#615EF0]">IM</p>
        @else
            <img class="w-12 h-12 rounded-xl justify-center items-center flex text-white bg-[#615EF0]" src="{{asset('storage/images/'. $friend['image'])}}" alt="" srcset="">
        @endif
        
        <div>
            <p class="font-bold">{{$friend['username']}}</p>
            <p class="text-[#bebaba] text-[14px] md:hidden lg:block">ready to roll</p> 
        </div>
       </div>
       <p class="text-[12px] pr-3 text-[#bebaba] md:hidden lg:block">20:33 pm</p>
    </div>
       
   @endforeach

   @if (count($friends) == null)
       <div class="my-20">
            <p class="text-center">you don't have friends yet</p>
       </div>
   @endif
   </div>
   
    {{-- The whole world belongs to you. --}}
</div> 

    <livewire:chat-space  />


</div>
</div>