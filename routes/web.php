<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'index');
Route::view('/movie', 'show');

Route::view('/tailwind', 'tailwind');

Route::view('/alpine', 'alpine');
