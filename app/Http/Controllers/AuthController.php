<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
    	$this->validate($request, [
			'name'     => 'required',
			'email'    => 'required|email|unique:users',
			'password' => 'required|min:6'
    	]);
    }
}
