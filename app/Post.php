<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'content'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query){
    	return $query->orderBy('id', 'DESC');
    }
}
