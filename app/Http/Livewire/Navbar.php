<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class Navbar extends Component
{
	public $cartTotal = 0;

	protected $listeners = [
		'cartAdded' => 'updateCartTotal',
		'productRemoved' => 'updateCartTotal',
		'clearCart' => 'updateCartTotal',
	];

	public function mount()
	{
		$this->cartTotal = count(Cart::get()['products']);
	}

    public function render()
    {
        return view('livewire.navbar');
    }

    public function updateCartTotal()
    {
    	$this->cartTotal = count(Cart::get()['products']);
    }
}
