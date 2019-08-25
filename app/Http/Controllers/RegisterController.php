<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Http\Requests\StoreUserRequest;
use App\Transformers\UserTransformer;
use App\User;

class RegisterController extends Controller
{
    public function index(StoreUserRequest $request){
		$user           = new User;
		$user->name     = $request->name;
		$user->email    = $request->email;
		$user->password = bcrypt($request->password);

    	$user->save();

    	return Fractal::item($user, new UserTransformer);
    }
}
