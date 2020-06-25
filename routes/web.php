<?php

use Illuminate\Support\Facades\Route;

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

// Route::livewire('/home', 'counter');
Route::livewire('/home', 'counter')
	->layout('layouts.base');

// Customizing section (@yield('body'))
Route::livewire('/home', 'counter')
    ->section('body');

// Passing parameters to the layout (Like native @extends('layouts.app', ['title' => 'foo']))
Route::livewire('/home', 'counter')
    ->layout('layouts.app', [
        'title' => 'foo'
    ]);

Route::group(['layout' => 'layouts.base', 'section' => 'body'], function () {
    //
});

Route::layout('layouts.base')->section('body')->group(function () {
    //
});

Route::livewire('/contact/{id}', 'show-contact');
// Route::livewire('/contact/{user}', 'show-contact');
