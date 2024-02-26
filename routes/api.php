<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PublishingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Publishing;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('publishing', PublishingController::class)->except(['update', 'destroy']);
    Route::post('logout', [UserController::class, 'destroyToken']);
});

// Route::get('publishing', [PublishingController::class, 'index']);
// Route::get('publishing/{id}', [PublishingController::class, 'show']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'create']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->all();
});

Route::get('isbn/{id:isbn}', [
    function (Publishing $id) {
        return $id;
    }
]);
