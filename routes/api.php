<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::Resource('products',ProductController::class);
Route::get('carts',[CartController::class,'getAllCart']);
Route::get('products',[ProductController::class,'index']);
Route::post('add_to_cart',[CartController::class,'addToCart']);
Route::put('update_cart',[CartController::class,'update']);
// Route::delete('remove_cart',[CartController::class,'remove']);
Route::delete('carts/remove_cart/{id}',[CartController::class,'removeToCart']);
Route::get('category_list',[ProductController::class,'category_list']);
Route::get('products/{id}',[ProductController::class,'product_detail']);