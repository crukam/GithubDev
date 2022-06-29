<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::view('/{path?}', 'welcome')
    ->where('path', '.*');
/*Route::get('/connection', function(){
    try{ 
        DB::connection()->getPdo();
        return 'connected successfully';
    }
    catch (\Exception $ex){
        dd($ex->getMessage());
    }
});*/

