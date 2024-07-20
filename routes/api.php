<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProjectCntroller;
use App\Http\Controllers\testController;
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


// Route::get('/test/{id}',[testController::class,'index']);
Route::get('custmers/{id}', [CustomerController::class, 'show']);
Route::patch('custmers/{id}', [CustomerController::class, 'update']);
Route::delete('custmers/{id}', [CustomerController::class, 'delete']);
Route::post('custmers', [CustomerController::class, 'create']);
Route::get('custmers', [CustomerController::class, 'index']);

Route::get('custmers/{customer_id}/notes/{id}', [NotesController::class, 'show']);
Route::patch('custmers/{customer_id}/notes/{id}', [NotesController::class, 'update']);
Route::delete('custmers/{customer_id}/notes/{id}', [NotesController::class, 'delete']);
Route::post('custmers/{customer_id}/notes', [NotesController::class, 'create']);
Route::get('custmers/{customer_id}/notes', [NotesController::class, 'index']);


// Route::get('custmers/{customer_id}/project/{id}', [ProjectCntroller::class, 'show']);
// Route::patch('custmers/{customer_id}/projects/{id}', [ProjectCntroller::class, 'update']);
// Route::delete('custmers/{customer_id}/projects/{id}', [ProjectCntroller::class, 'delete']);
Route::post('custmers/{customer_id}/projects', [ProjectCntroller::class, 'createProject']);
// Route::get('custmers/{customer_id}/projects', [ProjectCntroller::class, 'index']);
