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
	// Route::resource('/contacts','ContactController');
	// Route::resource('/contacts','ContactController')->names([
	// 	'index' => 'contacts.all',
	// 	'show' => 'contacts.view'
	// ]);
	// Route::resource('/contacts','ContactController')->parameters([
	// 	'contacts' => 'kontak'
	// ]);
	// Route::resource('/companies.contacts', 'ContactController');
	// Route::resource('contacts', 'ContactController')->only(['create', 'store', 'edit', 'update', 'destroy']);
	// Route::resource('contacts', 'ContactController')->except(['create', 'store', 'edit', 'update', 'destroy']);
	Route::resources([
		'/contacts' => 'ContactController',
		'/companies' => 'CompanyController'
	]);
});

Route::get('/settings/account', 'Settings\AccountController@index');

Auth::routes(['verify' => true, 'register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Backend\HomeController@index')->name('dashboard');

/** LARAVEL BLOG **/
Route::get('/blog', [
	'uses' => 'BlogController@index',
	'as' => 'blog'
]);

Route::get('/blog/{post}', [
	'uses' => 'BlogController@show',
	'as' => 'blog.show'
]);

Route::get('/blog/category/{category}', [
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

/* Backend Blog */
Route::name('backend.')->group(function () {
	Route::put('/backend/blog/restore/{blog}', [
		'uses' => 'Backend\BlogController@restore',
		'as' => 'blog.restore'
	]);
	Route::delete('/backend/blog/force-destroy/{blog}', [
		'uses' => 'Backend\BlogController@forceDestroy',
		'as' => 'blog.force-destroy'
	]);
    Route::resource('/backend/blog', 'Backend\BlogController');
    Route::resource('/backend/categories', 'Backend\CategoryController');
});

