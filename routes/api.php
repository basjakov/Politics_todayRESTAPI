<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('news','Api\newsApiController@GetAllnews');
Route::get('news/{id}','Api\newsApiController@GetNews');
Route::post('news','Api\newsApiController@CreateNews');
Route::put('news/{id}','Api\newsApiController@UpdateNews');
Route::delete('news/{id}','Api\newsApiController@DeleteNews');

