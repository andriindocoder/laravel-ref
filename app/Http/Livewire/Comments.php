<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Comments extends Component
{
	public $comments = [
		[
			'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, vitae, asperiores. Esse amet quibusdam adipisci omnis, molestias accusantium. Natus, non!',
			'created_at' => '3 min ago',
			'creator' => 'Sarthak'
		]
	];

	public $newComment;

	public function addComment()
	{
		array_unshift($this->comments, [
			'body' => $this->newComment,
			'created_at' => Carbon::now()->diffForHumans(),
			'creator' => auth()->user()->name
		]);

		$this->newComment = '';
	}

    public function render()
    {
        return view('livewire.comments');
    }
}
