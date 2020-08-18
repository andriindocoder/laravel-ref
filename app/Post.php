<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;

class Post extends Model
{
  protected $fillable = [
      'title', 'content', 'published'
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }

  public function comments()
  {
  	return $this->hasMany(Comment::class, 'post_id', 'id');
  }
}
