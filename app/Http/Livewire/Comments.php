<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
		$image = $this->storeImage();

		$createdComment = Comment::create([
			'body' => $this->newComment,
			'user_id' => auth()->user()->id,
			'image' => $image
		]);

		// $this->comments->prepend($createdComment);

		$this->newComment = '';
		$this->image = '';

		session()->flash('message', 'Comment has been added.');
	}

	public function storeImage() {
		if(!$this->image){
			return null;
		}

		$img = ImageManagerStatic::make($this->image)->encode('jpg');
		$name = Str::random() . '.jpg';
		Storage::disk('public')->put($name, $img);

		return $name;
	}

	public function remove($commentId)
	{
		$comment = Comment::find($commentId);

		Storage::disk('public')->delete($comment->image);

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
