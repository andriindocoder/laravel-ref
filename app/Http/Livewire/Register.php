<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
	public $form = [
		'name' => '',
		'email' => '',
		'password' => '',
		'password_confirmation' => ''
	];

	public function submit()
	{
		$this->validate([
			'form.email' => 'required|email',
			'form.name' => 'required',
			'form.password' => 'required|min:6|confirmed'
		]);
		dd($this->form);
	}

    public function render()
    {
        // return view('livewire.register-bitfumes');
        return view('livewire.register-tailwind');
    }
}
