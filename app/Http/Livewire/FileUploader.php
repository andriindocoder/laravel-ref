<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploader extends Component
{
	use WithFileUploads;

	public $photo;

	public function updatedPhoto()
	{
		$this->validate([
			'photo' => 'image|max:1024'
		]);
	}

	public function save() 
	{
		$this->validate([
			'photo' => 'image|max:1024' //1MB
		]);

		$this->photo->store('photos', 's3');
	}

    public function render()
    {
        return view('livewire.file-uploader');
    }
}
