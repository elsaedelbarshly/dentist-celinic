<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\ServiceContorller;
use App\Http\Controllers\Api\TreatmentController;

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

Route::post('/auth/register',[AuthController::class,'register']);
Route::post('/auth/login',[AuthController::class,'login']);

Route::get('/services',[ServiceContorller::class,'index']);
Route::get('/services/create',[ServiceContorller::class,'create']);
Route::post('/services/store',[ServiceContorller::class,'store']);
Route::get('/services/edit/{id}',[ServiceContorller::class,'edit']);
Route::post('/services/update/{id}',[ServiceContorller::class,'update']);
Route::post('/services/destroy/{id}',[ServiceContorller::class,'destroy']);

Route::group(['prefix'=>'patients','controller'=>PatientController::class],function(){
    Route::get('/','index');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::post('/destory/{id}','destory');
});

Route::group(['prefix'=>'prescription','controller'=>PrescriptionController::class],function(){
    Route::get('/','index');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::post('/destory/{id}','destory');
});

Route::group(['prefix'=>'treatment','controller'=>TreatmentController::class],function(){
    Route::get('/','index');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','update');
    Route::post('/destory/{id}','destory');
});
