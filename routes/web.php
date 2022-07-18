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
    Route::get('users/{user}',\App\Http\Livewire\User\Show::class)->name('users.show');
    Route::resource('users',\App\Http\Controllers\User\UserController::class)->only('index','destroy');
    Route::get('merchants/create',\App\Http\Livewire\Merchant\Create::class)->name('merchants.create');
    Route::get('merchants/{user}/edit',\App\Http\Livewire\Merchant\Edit::class)->name('merchants.edit');
    Route::get('merchants/{user}',\App\Http\Livewire\Merchant\Show::class)->name('merchants.show');
    Route::resource('merchants',\App\Http\Controllers\Merchant\MerchantController::class)->only('index','destroy');
    Route::get('fund-ins/{fundIn}/edit',\App\Http\Livewire\FundIn\Edit::class)->name('fund-ins.edit');
    Route::resource('fund-ins',\App\Http\Controllers\FundInController::class)->only('index','destroy');
    Route::resource('fund-outs',\App\Http\Controllers\FundOutController::class)->only('index','destroy');
    Route::get('settlements/{settlement}/edit',\App\Http\Livewire\Settlement\Edit::class)->name('settlements.edit');
    Route::resource('settlements',\App\Http\Controllers\SettlementController::class)->only('index','destroy');
    Route::get('roles/create',\App\Http\Livewire\Role\Create::class)->name('roles.create');
    Route::get('roles/{role}/edit',\App\Http\Livewire\Role\Edit::class)->name('roles.edit');
    Route::get('roles',[\App\Http\Controllers\RoleController::class,'index'])->name('roles.index');
});
