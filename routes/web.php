<?php 

Route::livewire('/', 'home')->name('home')->middleware('auth');

Route::livewire('/upload','file-uploader')->name('file-upload');

Route::group(['middleware' => 'guest'], function() {
	Route::livewire('/login', 'login')->name('login');
	Route::livewire('/register', 'register');
});

Route::get('/flexbox', function() {
	return view('flexbox');
});