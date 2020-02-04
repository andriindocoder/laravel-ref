<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterSearchScope;

class Contact extends Model
{
    use FilterSearchScope;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id', 'user_id'];

    public $filterColumns = ['company_id'];
    public $searchColumns = ['first_name', 'last_name', 'email'];

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst($query) {
    	return $query->orderBy('id', 'desc');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function getRouteKeyName() {
    //     return 'first_name';
    // }
}
