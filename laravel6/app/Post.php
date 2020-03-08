<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
	protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published-at', 'category_id'];
	protected $dates = ['published_at'];

	public function author() {
		return $this->belongsTo(User::class, 'author_id', 'id');
	}

	public function getImageUrlAttribute($value) {
		$imageUrl = "";

		if(! is_null($this->image)) {
			$imagePath = public_path() . "/laravel_blog/img/" . $this->image;
			if(file_exists($imagePath)) {
				$imageUrl = asset("laravel_blog/img/" . $this->image);
			}
		}

		return $imageUrl;
	}

	public function getDateAttribute($value) {
		return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
	}

	public function getBodyHtmlAttribute($value) {
		return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
	}

	public function getExcerptHtmlAttribute($value) {
		return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
	}

	public function scopeLatestFirst($query) {
		return $query->orderBy('created_at', 'desc');
	}

	public function scopePublished($query) {
		return $query->where('published_at', '<=', Carbon::now());
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function setPublishedAtAttribute($value) {
		$this->attributes['published_at'] = $value ?: NULL;
	}

	public function dateFormatted($showTimes = false) {
		$format = 'd/m/Y';
		if($showTimes) $format = $format . " H:i:s";
		return $this->created_at->format($format);
	}

	public function publicationLabel() {
		if(!$this->published_at) {
			return '<span class="badge badge-warning">Draft</span>';
		}elseif($this->published_at && $this->published_at->isFuture()) {
			return '<span class="badge badge-info">Scheduled</span>';
		}else{
			return '<span class="badge badge-success">Published</span>';
		}
	}
}
