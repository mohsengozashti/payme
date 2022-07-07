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
;
Route::redirect('/','users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']],function () {
    Route::get('users/create',\App\Http\Livewire\User\Create::class)->name('users.create');
    Route::get('users/{user}/edit',\App\Http\Livewire\User\Edit::class)->name('users.edit');
    Route::resource('users',\App\Http\Controllers\User\UserController::class)->except(['create','edit']);
    Route::get('merchants/create',\App\Http\Livewire\Merchant\Create::class)->name('merchants.create');
    Route::get('merchants/{user}/edit',\App\Http\Livewire\Merchant\Edit::class)->name('merchants.edit');
    Route::resource('merchants',\App\Http\Controllers\Merchant\MerchantController::class)->except(['create','edit']);
});
