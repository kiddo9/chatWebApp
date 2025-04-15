<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $image;
    public $updateImage;

    public function updatedUpdateImage(){
        $this->updateImage = $this->image->getFilename();
    }

    public $multiform = 1;

    public $username;

    public $location;

    public $password; 

    public $bio;

    public $hobbys = [];

    public $status;

    public $hobbyLIst = [
        "Reading",
        "Writing",
        "Drawing",
        "Painting",
        "Photography",
        "Cooking",
        "Baking",
        "Gardening",
        "Fishing",
        "Hiking",
        "Cycling",
        "Swimming",
        "Dancing",
        "Singing",
        "Playing Guitar",
        "Playing Piano",
        "Gaming",
        "Coding",
        "Traveling",
        "Yoga",
        "football"
    ];

    public $hobbyExist = false;
    public $imagePath;

    protected $rule = [
        1 => [
            'username' => 'required|min:5|max:20',
            'location' => 'required',
            'password' => 'required|min:6',
        ],
        2 => [
            'bio' => '',
            
        ],
        3 => [
            'hobbys' => 'required',
        ],
        4 => [
            'image' => '',
            'status' => 'required',
        ]
        ];

        public function placeholder(){
            return <<<'HTML'
            <div class='absolute inset-0 z-40'>
            <p class="text-white bg-[#615EF0] w-14 text-center h-14 justify-center items-center flex text-3xl rounded-xl mx-auto mt-60 md:mt-[20rem] xl:mt-64">Q</p>
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-[#615EF0]" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            HTML;
        }

        public function mount(){
            if(auth()->check()){
                return redirect('/messages');
            }
        }

        public function nextStep(){
            
            $this->validate($this->rule[$this->multiform]);

            $checkUser = User::where('username', $this->username)->first();

            if($checkUser){
                session()->flash('error', 'user already exist');
                return;
            }

            $users = User::all();

            foreach($users as $user){
                if(Hash::check($this->password, $user->password)){
                    session()->flash('error', 'password already user');
                    return;
                }
            }
            
            
            $this->multiform++;
        }

        public function previousStep(){
            $this->multiform--;
        }

        public function addHobby($name){
            $this->hobbyExist = in_array($name, $this->hobbyLIst);

            if($this->hobbyExist == true){
                $this->hobbys = [...$this->hobbys, $name];
            }
        }

        public function save(){
            $this->validate($this->rule[$this->multiform]);
            
            if($this->image != ''){
               $Image = $this->image->store('images', 'public');

                $this->imagePath = basename($Image);
            }

             User::create([
                'username' => $this->username,
                'location' => $this->location,
                'password' => $this->password,
                'bio' => $this->bio,
                'image' => $this->imagePath,
                'status' => $this->status,
                'hobbys' => json_encode($this->hobbys),
                'friends' => json_encode([]),
             ]);

            Storage::delete('livewire-tmp/'.$this->updateImage);

            return redirect('/messages')->with('success', 'Your account has been created');   
        }


        

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.form', [
            'hobbies' => $this->hobbyLIst
        ]);
    }
}
