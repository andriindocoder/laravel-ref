<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
	use WithPagination;

	public $newComment;
	public $image;

	protected $listeners = ['fileUpload' => 'handleFileUpload'];

	public function handleFileUpload($imageData) {
		$this->image = $imageData;
	}

	public function updated($field){
		$this->validateOnly($field, [
			'newComment' => 'required|max:150'
		]);
	}

	public function addComment()
	{
		$this->validate(['newComment' => 'required|max:150']);

		$createdComment = Comment::create([
			'body' => $this->newComment,
			'user_id' => auth()->user()->id
		]);

		// $this->comments->prepend($createdComment);

		$this->newComment = '';

		session()->flash('message', 'Comment has been added.');
	}

	public function remove($commentId)
	{
		$comment = Comment::find($commentId);
		$comment->delete();
		// $this->comments = $this->comments->except($commentId);

		session()->flash('message', 'Comment has been deleted.');
	}

    public function render()
    {
        return view('livewire.comments', [
        	'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
