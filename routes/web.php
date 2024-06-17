<?php

use App\Http\Controllers\UserGroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.main');
});

Route::get('users',function(){
    return view('users.users');
});

Route::get('groups',[UserGroupController::class,'index']);
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups/store',[UserGroupController::class,'store']);
Route::delete('groups/delete/{id}',[UserGroupController::class,'delete']);



