<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');



// Route::view('/', 'index');
// Route::view('/movie', 'show');

// Route::view('/tailwind', 'tailwind');

// Route::view('/alpine', 'alpine');
