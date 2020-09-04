<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class ResetPasswordController extends Controller
{
    public function sendEmail(Request $request){
        if(!$this->validateEmail($request->email)) {
            return $this->failedResponse();
        }

        return $this->send($request->email);
    }

    public function send($email){
        Mail::to($email)->send(new ResetPasswordMail);
    }

    public function validateEmail($email) {
        return !!User::where('email', $email)->first();
    }

    public function failedResponse() {
        return response()->json([
            'error' => 'Email not avaiable on the database'
        ], Response::HTTP_NOT_FOUND);
    }
}
