<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Stories extends Component
{
    use WithFileUploads;
    public $addImage;
    public $description;
    public $generatedImageName;

    public function updatedAddImage(){
        $this->generatedImageName = $this->addImage->getFilename();
    }
    public $image;
    
    public $friends = [
        [
            'id' => 1,
            'name' => 'Demon Salvator',
            'time' => '24m ago',
            'lastMessage' => 'ok, am working on it'
        ],
        [
            'id' => 2,
            'name' => 'Stephen Salvator',
            'time' => '24m ago',
            'lastMessage' => 'ok since'
        ],
    ];

    public $yourStory = [];

    public $color;
    public function closeStory(){
        $this->addImage = null;
        $this->description = '';

        Storage::delete('livewire-tmp/'. $this->generatedImageName);
    }

    public function addStory(){
        if($this->addImage == null){
            $this->validate([
                'description' => 'required'
            ]);
        }

        Storage::delete('livewire-tmp/'. $this->generatedImageName);
        $myStory = [
            'userId' => auth()->id(),
            'description' => $this->description,
            'bg' => 'bg-red-500',
            'font' => 'fonts',
            'file' => $this->addImage,
            'created_at' => now()
        ];

        $this->yourStory = [...$this->yourStory, $myStory];

        $this->dispatch('storyAdd');
        
    }

    public function mount(){
        $auth = User::find(auth()->id());
        $this->image = $auth['image'];
    }
    public function render()
    {
        return view('livewire.stories', [
            'friends' => $this->friends
        ]);
    }
}
