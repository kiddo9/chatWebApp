<div>
    <x-status />
    {{-- 6379 --}}
    <p class="text-white bg-[#615EF0] w-14 text-center h-14 justify-center items-center flex text-3xl rounded-xl mx-auto mt-20">Q</p>
     
    <div class="mx-auto flex justify-center mt-5">
        <div class="shadow-xl shadow-[#615EF0] relative w-[30rem] h-80 px-3 py-3">
            <div class="absolute top-[50%] w-96 flex flex-col gap-3 left-[50%] translate-x-[-50%] translate-y-[-50%]" id="pernsonal-info">
                
                <div class="flex border border-[#615EF0] items-center rounded-lg px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                      </svg>
                      
                   <input type="text" wire:model='username' class="w-96 py-2 px-3 outline-0" placeholder="username"> 
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

            <div class="absolute left-0 right-0 bottom-6 justify-center flex items-center">
                <button wire:click='loginUser' wire:keydown.enter='loginUser' class="w-56 text-white py-2 px-3 rounded-xl bg-[#615EF0]  text-center">lOGIN</button>
            </div>
            
            @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="text-red-500 px-3 py-1 text-center rounded-lg" wire:transition>{{$error}}</div>
                @endforeach
            @endif

            <div wire:loading>
                <livewire:loader  />
            </div>
            
        </div>
    </div>

    <div class="mt-20 flex justify-center items-start gap-2">
        <p>Don't have an account?</p>
        <a href="/" class="text-[#615EF0]">Sign up</a>
    </div>
</div>
@script
<script>
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