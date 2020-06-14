<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactIndex extends Component
{
	public $data;

    public function render()
    {
    	$this->data = Contact::latest()->get();
        return view('livewire.contact-index');
    }
}
