<?php

use App\Http\Controllers\FirebaseCrudController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'firebase'],function(){
    Route::get('/',              [FirebaseCrudController::class, 'index']);
    Route::post('/create',      [FirebaseCrudController::class, 'create']);
    Route::put('/edit',         [FirebaseCrudController::class, 'edit']);
    Route::delete('/delete',    [FirebaseCrudController::class, 'delete']);

});

