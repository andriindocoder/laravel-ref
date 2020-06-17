<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Login extends Component
{
	public $form = [
		'email' => '',
		'password' => ''
	];

	public function submit() 
	{
		$this->validate([
			'form.email' => 'required',
			'form.password' => 'required'
		]);

		Auth::attempt($this->form);

		return redirect(route('home'));
	}

    public function render()
    {
        return view('livewire.login-tailwind');
        // return view('livewire.login-bitfumes');
    }
}
