<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//IMPORTO IL CONTROLLER API
use App\Http\Controllers\Api\ApiController;

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

Route::group(['prefix' => '/v1'], function () {

    //Rotta per il test
    Route::get('test', [ApiController::class, 'getTest']);

    //Rotta per le mie Technologies
    Route::get('technologies', [ApiController::class, 'getTechnologies']);

    //Rotta per prendere la nuova Tech in POST
    Route::post('technologies', [ApiController::class, 'createTech']);
});
