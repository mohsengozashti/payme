<?php

use App\Models\BotReport;
use App\Models\FundIn;
use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('test', function (Request $request) {
    return $request->all();
});

Route::post('check-fund-in-link',[\App\Http\Controllers\Api\V1\BotController::class,'checkFundInLink']);



