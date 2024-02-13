<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('publishing', function () {
    return Publishing::all();
});

Route::post('xls', function (Request $request) {
    // logger([$request->all()[0]]);
    $row_one = $request->all()[0];
    $record = [];
    foreach($row_one as $key => $value){
        $record[$key] = $value;
    }
    Publishing::create($record);
    logger($record);
    return $record;
});



