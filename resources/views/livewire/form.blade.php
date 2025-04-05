
 <div>
<x-status />

    <p class="text-white bg-[#615EF0] w-14 text-center h-14 justify-center items-center flex text-3xl rounded-xl mx-auto mt-20">Q</p>
    <div class="mx-auto flex justify-center mt-5">
        <div class="shadow-xl shadow-[#615EF0] relative w-[30rem] h-[30rem] px-3 py-3">
            {{-- personal info --}}
            @if ($multiform == 1)
                <div wire:transition class="absolute top-[50%] w-96 flex flex-col gap-3 left-[50%] translate-x-[-50%] translate-y-[-50%]" id="pernsonal-info">
                
                <div class="flex border border-[#615EF0] items-center rounded-lg px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                      </svg>
                      
                   <input type="text" wire:model='username' class="w-96 py-2 px-3 outline-0" placeholder="username"> 
                </div>
                
                
                <div class="flex border border-[#615EF0] items-center rounded-lg px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                      </svg>
                      
                    <input type="text" wire:model='location' placeholder="location" class="w-96 py-2 px-3 outline-0">
                </div>
                
                <div class="flex border border-[#615EF0] relative items-center rounded-lg px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                      </svg>
                      
                    <input type="password" wire:model='password' id="password" class="w-96 py-2 px-3 outline-0" placeholder="password">

                    <div class="absolute right-6">
                        <svg id="openEye" wire:click='$js.openEye' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>
                          
                          <svg id="closeEye" wire:click='$js.closeEye' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                          </svg>
                          
                    </div>
                </div>
                
                
            </div>
            @elseif ($multiform == 2)
                {{-- bio --}}

            <div wire:transition class="absolute flex flex-col left-0 right-0" id="bio">
               
                <textarea name="" wire:model='bio' id="" placeholder="your bio" class="border border-[#615EF0] w-96 mx-auto rounded-lg h-96 mt-4 px-2 py-2"></textarea>
            </div>

            @elseif ($multiform == 3)
            {{-- Hobbies Section --}}
            <div wire:transition class="absolute" id="hobbies">  {{-- Fixed ID name --}}
                <label for="">select your Hobbies</label>
                
                <div class="flex flex-wrap gap-3 mt-3">
                   @foreach ($hobbies as $hobby)  {{-- Fixed variable name --}}
                       <div class="border-2 {{ in_array($hobby, $hobbys) ? 'bg-[#615EF0] text-white' : 'bg-white'}} cursor-pointer px-2 py-2 border-[#615EF0] rounded-xl" wire:click='addHobby("{{$hobby}}")'>{{ $hobby }}</div>
                   @endforeach
                </div>
                
            </div>

            @elseif ($multiform == 4)

            {{-- profile image --}}
            <div class="absolute right-0 left-0 px-3" id="profile image">
                <input wire:model='image' type="file" class="hidden" name="image" id="image">
                <div class="mt-10">
                    <div wire:click="$js.opener" id="" class="mx-auto justify-center flex flex-col items-center border-4 cursor-pointer border-[#615EF0] size-20  rounded-full bg-gray-300">
                        @if ($image == '')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                        @else
                            <img src="{{$image->temporaryUrl()}}" class="w-20 h-20 rounded-full" alt="" srcset="">
                        @endif
                        
                    </div>

                    <input wire:model='status' type="text" placeholder="your status" class="w-full outline-0 border-b-2 border-[#615EF0] px-2 py-3 mt-5">
                </div>
            </div>
            @endif
            
            
            <div class="absolute bottom-6 left-0 right-0 px-4 flex justify-between">
                @if ($multiform != 1)
                  <button class="text-white bg-[#615EF0] py-2 px-2 rounded-xl w-20" wire:click="previousStep">Back</button>  
                @endif
                
                @if ($multiform == 4)
                    <button class="text-white bg-[#615EF0] py-2 px-2 rounded-xl w-20" wire:click='save' wire:loading.attr='disabled'>Create</button>
                @else
                    <button class="text-white bg-[#615EF0] py-2 px-2 rounded-xl w-20" wire:click="nextStep" wire:loading.attr='disabled'>Next</button>
                @endif
                
                
            </div>

            @if ($errors->any())
            <div wire:transition class="flex flex-col z-30 justify-center items-center gap-2 w-64 mx-auto">
                @foreach ($errors->all() as $error)
                    <div class="text-red-500 px-3 py-1 rounded-lg" wire:transition>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <div wire:loading class='absolute bg-[#00000079] inset-0 z-40'>
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    

    <div class="mt-20 flex justify-center items-start gap-2">
        <p>Already have an account?</p>
        <a href="/login" class="text-[#615EF0]">Sign in</a>
    </div>
</div>
@script
<script>
    $js('opener', () => {
        document.getElementById('image').click();
    });
    $js('openEye', () => {
        document.getElementById('openEye').classList.add("hidden");
        document.getElementById('closeEye').classList.remove("hidden");

        if(document.getElementById('password').type == 'text'){
            document.getElementById('password').type = 'password'
        }
    });
    $js('closeEye', () => {
        document.getElementById('openEye').classList.remove("hidden");
        document.getElementById('closeEye').classList.add("hidden");

        if(document.getElementById('password').type == 'password'){
            document.getElementById('password').type = 'text'
        }
        
    });
</script>
@endscript





