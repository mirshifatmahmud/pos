<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('layout.main');
});


Route::get('groups',[UserGroupController::class,'index']);
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups/store',[UserGroupController::class,'store']);
Route::delete('groups/delete/{id}',[UserGroupController::class,'delete']);

Route::resource('user', UserController::class);

Route::resource('category', ProductCategoryController::class,['except'=>['show','update','edit']]);
Route::resource('product', ProductController::class);




