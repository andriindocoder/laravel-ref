<?php 

use App\Comment;
use Illuminate\Support\Arr;

Route::livewire('/', 'home')->name('home')->middleware('auth');

Route::livewire('/upload','file-uploader')->name('file-upload');

Route::group(['middleware' => 'guest'], function() {
	Route::livewire('/login', 'login')->name('login');
	Route::livewire('/register', 'register');
});

Route::get('/flexbox', function() {
	return view('flexbox');
});

Route::get('/helpers', function() {
	echo "<br>App path: " . app_path();
	echo "<br>Base path: " . base_path();
	echo "<br>Config path: " . config_path();
	echo "<br>Database path: " . database_path();
	echo "<br>Public path: " . public_path();
	echo "<br>Resource path: " . resource_path();
	echo "<br>Storage path: " . storage_path();
}); 