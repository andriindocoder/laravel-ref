<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SayHi extends Component
{
	public $name;

	// protected $listeners = ['refreshChildren' => 'refreshMe']
	protected $listeners = ['foo' => '$refresh'];

	public function emitFoo()
	{
		$this->emit
	}

	public function mount($name)
	{
		$this->name = $name;
	}

	public function refreshMe()
	{
		$this->emit('foo');
	}


    public function render()
    {
        return view('livewire.say-hi');
    }
}
