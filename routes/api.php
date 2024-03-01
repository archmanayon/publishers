<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublishingController;
use App\Http\Controllers\UserController;
use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Publishing;
use Illuminate\Support\Facades\Mail;

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

Route::post('/send', [NotificationController::class,'send']);
Route::post('/notify', [NotificationController::class,'notify']);