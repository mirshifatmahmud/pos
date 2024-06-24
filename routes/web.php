<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        // return Auth::user();
        return view('dashboard.dashboard');
    });

    Route::get('logout',[LoginController::class,'logout'])->name('logout');

    Route::get('groups',[UserGroupController::class,'index']);
    Route::get('groups/create',[UserGroupController::class,'create']);
    Route::post('groups/store',[UserGroupController::class,'store']);
    Route::delete('groups/delete/{id}',[UserGroupController::class,'delete']);
    
    Route::resource('user', UserController::class);
    Route::get('user/{id}/sales'[]);
    
    Route::resource('category', ProductCategoryController::class,['except'=>['show','update','edit']]);
    Route::resource('product', ProductController::class);
});


Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('store');

Route::get('test',function(){
    
    $arr = [];
        $all = Category::all();
        foreach($all as $i){
            $arr[$i->title] = $i->title;
        }
    return $arr;
});



