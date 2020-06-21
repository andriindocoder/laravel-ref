<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('product.index');
Route::livewire('/cart', 'cart-index')->name('cart.index');
