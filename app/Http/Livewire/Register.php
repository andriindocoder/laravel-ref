<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

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
		
		User::create($this->form);
		return redirect(route('login'));
	}

    public function render()
    {
        // return view('livewire.register-bitfumes');
        return view('livewire.register-tailwind');
    }
}
