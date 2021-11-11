<?php

use App\Http\Controllers\TaskController;
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


Route::group(["prefix" => "user", "as" => "user.", "middleware" => "auth:api"], function () {
    Route::resource('task', TaskController::class);
    Route::put("task/re-order", "\App\Http\Controllers\TaskController@reorderPriority");
});
Route::post("login", "\App\Http\Controllers\UserAuthController@login");
