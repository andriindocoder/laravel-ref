<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('age', ['only' => ['getUser']]);
        // $this->middleware('age', ['except' => ['getUser']]);
    }

    public function register(Request $request) {

    }

    public function login(Request $request) {

    }

}
