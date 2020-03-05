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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('billingCicles/summary', 'Api\MovimentacaoController@getSummary')->name('summary');
Route::get('income', 'Api\MovimentacaoController@income')->name('income');
Route::get('income/{id}', 'Api\MovimentacaoController@detail')->name('detail');


