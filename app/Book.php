<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function checkout($user) 
    {
    	$this->reservations()->create([
    		'user_id' => $user->id,
    		'checked_out_at' => now(),
    	]);
    }

    public function path()
    {
    	return '/books/' . $this->id;
    }

    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }
}
