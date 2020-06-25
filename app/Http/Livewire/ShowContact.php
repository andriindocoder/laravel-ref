<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class ShowContact extends Component
{
	public $name;
	public $email;
	public $contact;

	// public function mount(SessionManager $session, $contact)
	// {
	// 	$session->put("contact.{$contact->id}.last_viewed", now());

	// 	$this->name = $contact->name;
	// 	$this->email = $contact->email;
	// }

	// public function mount($contact, $sectionHeading = '')
 //    {
 //        $this->name = $contact->name;
 //        $this->email = $contact->email;
 //        $this->sectionHeading = request('section_heading', $sectionHeading);
 //    }

    //Mount mirip mirip controller
    // public function mount($id)
    // {
    // 	dd($id);
    //     $contact = User::find($id);

    //     $this->name = $contact->name;
    //     $this->email = $contact->email;
    // }

    public function mount($id)
    {
        $this->contact = $id;
    }

    public function render()
    {
        return view('livewire.show-contact');
    }
}
