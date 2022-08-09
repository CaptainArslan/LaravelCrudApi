<?php

// use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PersonController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/person/{person}', [PersonController::class, 'show']);

Route::prefix('/v1')->group(function(){
    Route::apiResource('/person', PersonController::class)->only('index','show','destroy','update','delete');
});
