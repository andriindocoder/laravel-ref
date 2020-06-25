<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchPosts extends Component
{
	public $foo;
	public $search = '';
	public $page = 1;

	protected $updatesQueryString = [
		'foo',
		'search' => ['except' => ''],
		'page' => ['except' => 1]
	];

    public function render()
    {
        return view('livewire.search-posts');
    }
}
