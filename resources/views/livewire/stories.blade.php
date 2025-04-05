<div class="flex relative">
    <div class="ml-20 w-80 sm:w-96 md:w-80 md:border-r-2 border-gray-300 h-svh">
        <header class="flex justify-between items-center py-4 px-4 h-20 sticky border-b border-b-gray-400">
            <div class="flex gap-1 items-center justify-center">
                <h1 class="text-xl font-semibold">Stories</h1>
            </div>
           </header>
    
           
           <div>
            
            <div class="mt-5 flex flex-col gap-7">
                <div class="flex md:hidden justify-between px-4 py-5 shadow-xl mx-2 rounded-xl">
                    <div class="flex items-center gap-5">
                        <div class="relative h-18" wire:click='$js.addStory'>
                            <input id="story" wire:model="addImage" class="hidden" type="file">
                            <img src="{{asset('storage/images/'. $image)}}" class="w-18 h-18 border border-[#615EF0] rounded-full" alt="" srcset=""> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white px-1 right-0 bottom-0 absolute rounded-full py-1 bg-[#615EF0]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm">my Story</p>
                        </div>
                        
                    </div>
        
                    <div class="flex items-center gap-5">
                          
                        <svg wire:click="$js.addText" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-300 py-2 rounded-full px-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                          </svg>
                          
                    </div>
                </div>
                @if (!empty($yourStory))
                <div class="flex md:hidden gap-3 px-3 items-center cursor-pointer">
                    @php
                        $storyCount = count($yourStory);
                        $gapAngle = 1; // Size of the gap in degrees
                        $segmentAngle = (360 / $storyCount) - $gapAngle; // Angle for each story
                    @endphp
                
                    <div class="relative w-14 h-14">
                        {{-- Profile Image --}}
                        <img src="{{ asset('storage/images/' . $image) }}" 
                             class="w-14 h-14 rounded-full border-4 border-transparent" 
                             alt="story" />
                
                        {{-- Multi-story ring segments --}}
                        @if ($storyCount > 1)
                            @for ($i = 0; $i < $storyCount; $i++)
                                <span 
                                    class="absolute inset-0 w-full h-full rounded-full border-4 border-green-500" 
                                    style="clip-path: polygon(50% 50%, 100% 0, 100% 100%);
                                           transform: rotate({{ ($i * (360 / $storyCount)) }}deg);">
                                </span>
                            @endfor
                        @else
                            {{-- Full Circle Border for One Story --}}
                            <span class="absolute inset-0 w-full h-full rounded-full border-4 border-green-500"></span>
                        @endif
                    </div>
                </div>
                
                @endif
                @foreach ($friends as $friend)
                   <div class="flex gap-3 px-3 items-center cursor-pointer">
                    <p class="w-12 h-12 rounded-full justify-center border-4 border-green-500 items-center flex text-white bg-[#615EF0]">IM</p>
                    <div>
                        <p class="font-bold">{{$friend['name']}}</p>
                    </div>
                   </div>
               @endforeach

               
               
               </div>
           </div>
    
    </div>

    <div class="w-full hidden md:block">
        <div class="flex justify-between px-4 py-5 shadow-xl mx-4 mt-4 rounded-xl">
            <div class="flex items-center gap-5">
                <div class="relative h-18">
                    <img src="{{asset('storage/images/'. $image)}}" class="w-18 h-18 border border-[#615EF0] rounded-full" alt="" srcset=""> 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white px-1 right-0 bottom-0 absolute rounded-full py-1 bg-[#615EF0]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div>
                    <p class="text-xl">my Story</p>
                    <p class="text-sm">create a story for friends</p> 
                </div>
                
            </div>

            <div class="flex items-center gap-5">
                <svg wire:click='$js.addStory' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-300 py-2 rounded-full px-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                  </svg>
                  

                <svg wire:click="$js.addText" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-300 py-2 rounded-full px-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                  </svg>
                  
            </div>
        </div>

        @if (!empty($yourStory))
                <div class="hidden md:flex gap-3 px-3 items-center cursor-pointer mt-9">
                    @php
                        $storyCount = count($yourStory);
                        $gapAngle = 1; // Size of the gap in degrees
                        $segmentAngle = (360 / $storyCount) - $gapAngle; // Angle for each story
                    @endphp
                
                    <div class="relative w-14 h-14">
                        {{-- Profile Image --}}
                        <img src="{{ asset('storage/images/' . $image) }}" 
                             class="w-14 h-14 rounded-full border-4 border-transparent" 
                             alt="story" />
                
                        {{-- Multi-story ring segments --}}
                        @if ($storyCount > 1)
                            @for ($i = 0; $i < $storyCount; $i++)
                                <span 
                                    class="absolute inset-0 w-full h-full rounded-full border-4 border-green-500" 
                                    style="clip-path: polygon(50% 50%, 100% 0, 100% 100%);
                                           transform: rotate({{ ($i * (360 / $storyCount)) }}deg);">
                                </span>
                            @endfor
                        @else
                            {{-- Full Circle Border for One Story --}}
                            <span class="absolute inset-0 w-full h-full rounded-full border-4 border-green-500"></span>
                        @endif
                    </div>
                </div>
                
                @endif
    </div>
    {{-- Nothing in the worldis as soft and yielding as water. --}}

    <div id="editor" wire:ignore.self class="px-3 py-4 hidden backdrop-blur-xl fixed z-[100000000] inset-0">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="text-red-500 px-3 py-1 rounded-lg" wire:transition>{{$error}}</div>
            @endforeach
        @endif
    <div class="flex justify-between items-center px-3 py-3">
      <svg wire:click="$js.close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-red-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
      
        <div class="flex items-center gap-4">
            <input wire:model='color' type="color" class="w-10 h-10 rounded-full" name="" id="">

            <div class="flex flex-col items-center">
                <p class="text-3xl">😂</p>
            </div>

            <div class="flex flex-col items-center">
                <p class="text-xl font-sans">Aa</p>
            </div>
            
        </div>
    </div>


    @if ($addImage != null)
        <img src="{{$addImage->temporaryUrl()}}" class="w-full h-[80%]" alt="" srcset="">
        <div class="flex justify-between items-center gap-2 mt-3">
            <input wire:model='description' type="text" class="outline-0 border py-2 px-2 rounded-xl border-gray-400 w-80 sm:w-96 md:w-full">
            <button class="w-28 py-2 px-3 rounded-xl bg-[#615EF0] text-white" wire:click='addStory'>Add</button>
        </div>
    @else
        <textarea wire:model='description' name="" id="" class="w-full h-[85%] flex text-xl md:text-2xl xl:text-4xl outline-0 justify-center items-center text-center px-4 py-4"></textarea>
        <button class="float-right w-44 py-3 px-3 rounded-xl bg-[#615EF0] text-white" wire:click='addStory'>Add</button>
    @endif
    
    
    
    </div>
</div>
@script
<script>
    $js("addStory", () => {
    let PostStory = document.getElementById("story");

    PostStory.click(); // open the file picker

        PostStory.onchange = () => {
            if (PostStory.files.length > 0) {
                setTimeout(() => {
                document.getElementById("editor").classList.remove("hidden");
                    console.log(PostStory.files[0]); 
                }, 500);
                
            }
        };
    });


    $js('addText', () =>{
        let PostStory = document.getElementById("editor");
        PostStory.classList.remove("hidden")
    });

    $js('close', () =>{
        let PostStory = document.getElementById("editor");
        PostStory.classList.add("hidden")
        $wire.call('closeStory')
    });

    window.addEventListener('storyAdd', () => {
        let PostStory = document.getElementById("editor");
        PostStory.classList.add("hidden")
        $wire.call('closeStory')
    })
</script>
@endscript