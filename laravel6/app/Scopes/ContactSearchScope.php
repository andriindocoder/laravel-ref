<?php 

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContactSearchScope extends SearchScope
{
	protected $searchColumns = ['first_name', 'last_name', 'email', 'company.name'];
}