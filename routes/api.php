<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
//use DeveloperController;

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\DeveloperController;
//use App\Http\Controllers\GitHubDevApiWrapperController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/developer', DeveloperController::class)->only(['show','store']);

Route::ApiResource('/devApi', GitHubDevApiWrapperController::class);

