<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    //admin  category routes

    Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
    Route::get('/view_category',[AdminController::class,'view_category']);
    Route::post('/add_category',[AdminController::class,'add_category']);
    Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
    Route::get('/edit_category/{id}',[AdminController::class,'edit_category']);

    //product in admin
    Route::get('/view_product',[AdminController::class,'view_product']);
    Route::post('/add_product',[AdminController::class,'add_product']);
    Route::get('/show_product',[AdminController::class,'show_product']);
    Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
    Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
    Route::post('/update_product/{id}',[AdminController::class,'update_product']);

   // orders in admin panel
    Route::get('/orders',[AdminController::class,'orders']);
   //delivered
    Route::get('/delivered/{id}',[AdminController::class,'delivered']);
    //pdf print

    Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

    //send email
    Route::get('/send_email/{id}',[AdminController::class,'send_email']);
    //email notification
    Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);
    //search
    Route::get('/search',[AdminController::class,'searchdata']);



   




    //product details
    Route::get('/product_details/{id}',[HomeController::class,'product_details']);

   
    //adding to cart
    Route::post('/add_to_cart/{id}',[HomeController::class,'add_to_cart']);
    Route::get('/show_cart',[HomeController::class,'show_cart']);
    Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

    //Orders

    Route::get('/Cash_on_delivery',[HomeController::class,'Cash_on_delivery']);
    Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
    Route::post('/stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');

    //my orders
    Route::get('/show_orders',[HomeController::class,'show_orders']);
    Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);



