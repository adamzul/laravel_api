<?php

use Illuminate\Http\Request;

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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
// Route::post('login', 'Api\AuthController@login');
// Route::post('register', 'Api\AuthController@register');
// Route::prefix('v1')->group(function(){
    
//     Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('getUser', 'Api\AuthController@getUser');
//     });
//    });

// Route::get('/not_authenticated', function(Request $request){
//     return response()->json(['message' => 'not authenticated'], 401);
//     // return "tes";
// })->name('not_authenticated');

Route::middleware('jwt.verify')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('jwt.verify')->get('/user/get', 'UserController@get');

Route::group(['middleware' => 'jwt.verify'], function(){
    Route::get('items', 'api\ItemController@index');
    Route::get('items/{id}', 'ItemController@show');
    Route::post('items', 'ItemController@store');
    Route::put('items/{id}', 'ItemController@update');
    Route::delete('items/{id}', 'ItemController@delete');
});


