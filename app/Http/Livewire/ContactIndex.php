<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;
use Livewire\WithPagination;

class ContactIndex extends Component
{
	use WithPagination;

	public $statusUpdate = false; 
	public $paginate = 5;
	public $search = '';

	protected $listeners = [
		'contactStored' => 'handleStored',
		'contactUpdated' => 'handleUpdated'
	];

	protected $updatesQueryString = ['search'];

	public function mount() {
		$this->search = request()->query('search', $this->search);
	}

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => $this->search === null ? 
        		Contact::latest()->paginate($this->paginate) : 
        		Contact::latest()->where('name' , 'like', '%' . $this->search . '%')->paginate($this->paginate)
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
