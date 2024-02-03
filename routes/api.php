<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginMobileController;
use App\Http\Controllers\ApiImageController;
use App\Http\Controllers\ApiDapilController;
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

Route::post('/loginmobile', [LoginMobileController::class, 'loginmobile']);

Route::post('/uploadimage', [ApiImageController::class, 'uploadimage']);

Route::get('/dapil', [ApiDapilController::class, 'dapil']);
Route::get('/kota', [ApiDapilController::class, 'kota']);