<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserReceiptController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;



// Route::get('test',function(){
    
//     $arr = [];
//         $all = Category::all();
//         foreach($all as $i){
//             $arr[$i->title] = $i->title;
//         }
//     return $arr;
// });



Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('store');


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


    Route::get('user/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');
    Route::post('user/{id}/invoices',[UserSalesController::class,'createInvoice'])->name('user.sales.store');
    Route::get('user/{id}/invoices/{invoice_id}',[UserSalesController::class,'invoice'])->name('user.sales.invoice-details');
    Route::delete('user/{id}/sales/{invoice_id}',[UserSalesController::class,'destroy'])->name('user.sales.invoice-delete');
    Route::post('user/{id}/invoices/{invoice_id}',[UserSalesController::class,'addItem'])->name('user.sales.invoices.add-item');
    Route::delete('user/{id}/sales/{invoice_id}/{item_id}',[UserSalesController::class,'destroy_item'])->name('user.sales.invoices.delete-item');
    

    Route::get('user/{id}/purchase',[UserPurchaseController::class,'index']);



    Route::get('user/{id}/payment',[UserPaymentController::class,'index'])->name('payment');
    Route::post('user/{id}/payment',[UserPaymentController::class,'store']);
    Route::delete('user/{id}/payment/{payment_id}',[UserPaymentController::class,'destroy'])->name('user.payment.delete');
    
    Route::get('user/{id}/receipt',[UserReceiptController::class,'index'])->name('receipt');
    Route::post('user/{id}/receipt',[UserReceiptController::class,'store']);
    Route::delete('user/{id}/receipt/{receipt_id}',[UserReceiptController::class,'destroy'])->name('user.receipt.delete');

    
    Route::resource('category', ProductCategoryController::class,['except'=>['show','update','edit']]);
    Route::resource('product', ProductController::class);
});


