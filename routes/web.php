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
Route::get('test',function (){
    return uniqid(env('APP_NAME').'_');
})->name('home');

Route::group(['middleware' => ['auth']],function () {
    Route::get('users/create',\App\Http\Livewire\User\Create::class)->name('users.create')->middleware('permission:create-user');
    Route::get('users/{user}/edit',\App\Http\Livewire\User\Edit::class)->name('users.edit')->middleware('permission:update-user');
    Route::get('users/{user}',\App\Http\Livewire\User\Show::class)->name('users.show')->middleware('permission:view-user');
    Route::resource('users',\App\Http\Controllers\User\UserController::class)->only('index','destroy');
    Route::get('merchants/create',\App\Http\Livewire\Merchant\Create::class)->name('merchants.create')->middleware('permission:create-merchant');
    Route::get('merchants/{user}/edit',\App\Http\Livewire\Merchant\Edit::class)->name('merchants.edit')->middleware('permission:update-merchant');
    Route::get('merchants/{user}',\App\Http\Livewire\Merchant\Show::class)->name('merchants.show')->middleware('permission:view-merchant');
    Route::resource('merchants',\App\Http\Controllers\Merchant\MerchantController::class)->only('index','destroy');
    Route::get('fund-ins/{fundIn}/edit',\App\Http\Livewire\FundIn\Edit::class)->name('fund-ins.edit')->middleware('permission:update-fund-in');
    Route::resource('fund-ins',\App\Http\Controllers\FundInController::class)->only('index','destroy');
    Route::resource('fund-outs',\App\Http\Controllers\FundOutController::class)->only('index','destroy');
    Route::get('settlements/{settlement}/edit',\App\Http\Livewire\Settlement\Edit::class)->name('settlements.edit')->middleware('permission:update-settlement');
    Route::resource('settlements',\App\Http\Controllers\SettlementController::class)->only('index','destroy');
    Route::get('roles/create',\App\Http\Livewire\Role\Create::class)->name('roles.create')->middleware('permission:create-role');
    Route::get('roles/{role}/edit',\App\Http\Livewire\Role\Edit::class)->name('roles.edit')->middleware('permission:update-role');
    Route::get('roles',[\App\Http\Controllers\RoleController::class,'index'])->name('roles.index')->middleware('permission:view-role');
});

Route::get('/{link:unique_id}',\App\Http\Livewire\Link\Show::class)->name('link.show');
