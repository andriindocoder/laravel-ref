<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
	// Route::get('/contacts', 'ContactController@index')->name('contacts.index');

	// Route::post('/contacts', 'ContactController@store')->name('contacts.store');

	// Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

	// Route::get('/contacts/{contact}', 'ContactController@show')->name('contacts.show');

	// Route::put('/contacts/{contact}', 'ContactController@update')->name('contacts.update');

	// Route::get('/contacts/{contact}/edit', 'ContactController@edit')->name('contacts.edit');

	// Route::delete('/contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy');
	// Route::resource('contacts', 'ContactController')->only(['create', 'store', 'edit', 'update', 'destroy']);
	// Route::resource('contacts', 'ContactController')->except(['create', 'store', 'edit', 'update', 'destroy']);
	Route::resources([
		'/contacts' => 'ContactController',
		'/companies' => 'CompanyController'
	]);
});

Route::get('/settings/account', 'Settings\AccountController@index');


/** LARAVEL BLOG **/
Route::get('/blog', function () {
    return view('blog.index');
});

Route::get('/blog/show', function () {
    return view('blog.show');
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
