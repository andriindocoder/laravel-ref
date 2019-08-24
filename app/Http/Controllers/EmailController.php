<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    public function send(){
	   $name = 'My Name';
	   Mail::to('andriwicaksonost@gmail.com')->send(new SendMail($name));
	   
	   return 'Email was sent';
    }
}
