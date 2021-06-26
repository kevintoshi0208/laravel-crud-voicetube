<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoListAttachmentController;
use App\Http\Controllers\TodoListController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources( [
    'todoLists'=> TodoListController::class,
],[
    'middleware'=> 'auth:api'
]);

Route::middleware(['api'])
    ->prefix( 'auth')
    ->group(function ($router) {
        Route::post('/login', [AuthController::class,'login']);
        Route::post('/logout', [AuthController::class,'logout']);
        Route::post('/refresh', [AuthController::class,'refresh']);
        Route::post('/me', [AuthController::class,'me']);
    })
;

Route::middleware(['auth:api'])
    ->group(function (){
        Route::post('/todoListAttachment', [TodoListAttachmentController::class,'store']);
        Route::get('/todoListAttachment/{id}/download', [TodoListAttachmentController::class,'download']);
        Route::get('/todoListAttachment/{id}', [TodoListAttachmentController::class,'show']);
        Route::delete('/todoListAttachment/{id}', [TodoListAttachmentController::class,'delete']);
    })
;

