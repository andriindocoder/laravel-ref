<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;

class Comments extends Component
{
	public $comments;

	public $newComment;

	public function mount()
	{
		$initialComments = Comment::latest()->get();

		$this->comments = $initialComments;
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

		$this->comments->prepend($createdComment);

		$this->newComment = '';
	}

	public function remove($commentId)
	{
		$comment = Comment::find($commentId);
		$comment->delete();
		$this->comments = $this->comments->except($commentId);
	}

    public function render()
    {
        return view('livewire.comments');
    }
}
