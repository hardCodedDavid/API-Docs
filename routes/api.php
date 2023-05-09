<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


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


Route::prefix('crud')->controller(CrudController::class)->group(function () {
    Route::get('all', 'index');
    Route::post('create', 'store');
    Route::get('show/{id}', 'show');
    Route::post('update/{id}', 'update');
    Route::delete('destroy/{id}', 'destroy');

    Route::get('user/{id}', 'user');

});
