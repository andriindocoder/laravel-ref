<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactIndex extends Component
{

	public $statusUpdate = false; 

	protected $listeners = [
		'contactStored' => 'handleStored',
		'contactUpdated' => 'handleUpdated'
	];

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => Contact::latest()->get()
        ]);
    }

    public function handleStored($contact) 
    {
    	session()->flash('message', 'Contact ' . $contact['name'] . ' berhasil diupdate.');
    }

    public function handleUpdated($contact) 
    {
    	session()->flash('message', 'Contact ' . $contact['name'] . ' berhasil disimpan.');
    }

    public function getContact($id)
    {
    	$this->statusUpdate = true;
    	$contact = Contact::findOrFail($id);
    	$this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
    	if($id) {
    		$data = Contact::findOrFail($id);
    		$data->delete();
    		session()->flash('message', 'Contact berhasil dihapus');
    	}
    }
}
