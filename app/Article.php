<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $tables = 'articles';

    public function author(){
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
