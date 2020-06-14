<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class HelloWorld extends Component
{
	public $names = ['Jelly', 'Man', 'Chico'];

	public $contacts;

	public function mount($name)
	{
		$this->name = $name;
	}

	public function refreshChildren()
	{
		$this->emit('refreshChildren');
	}

	public function updated()
	{
		$this->name = 'updated@';
	}

	public function updatedName($name)
	{
		$this->name = strtoupper($name);
	}

    public function render()
    {
        return view('livewire.hello-world');
    }

    //$refresh

    public function removeContact($name)
    {
    	Contact::whereName($name)->first()->delete();
    	$this->contacts = Contact::all();
    }
}
