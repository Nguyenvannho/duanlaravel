<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('home',function(){
    return view('welcome');
})->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/checkLogin', [AuthController::class, 'postLogin'])->name('checkLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/search', [CategoryController::class, 'search'])->name('category.search');
         // thùng rác 
         Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
         // khôi phục 
         Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
         // xóa vĩnh viễn 
         Route::get('/deleteforever/{id}', [CategoryController::class, 'deleteforever'])->name('category.deleteforever');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/search', [ProductController::class, 'search'])->name('product.search');
        Route::get('/xuatexcel', [ProductController::class, 'exportExcel'])->name('product.xuat');


        // thùng rác 
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        // khôi phục 
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
        // xóa vĩnh viễn 
        Route::get('/deleteforever/{id}', [ProductController::class, 'deleteforever'])->name('product.deleteforever');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
        Route::get('/search', [CustomerController::class, 'search'])->name('customer.search');
    });
    Route::prefix('group')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('group.index');
        Route::get('/create', [GroupController::class, 'create'])->name('group.create');
        Route::post('/store', [GroupController::class, 'store'])->name('group.store');
        Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
        Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
        Route::get('/destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
        Route::get('/search', [GroupController::class, 'search'])->name('group.search');
        Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
        Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
    });
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.order_detail');
        Route::get('/search', [OrderController::class, 'search'])->name('order.search');
        Route::get('/xuat', [OrderController::class, 'exportOrder'])->name('order.xuat');
    });
});

//shop
Route::prefix('shop')->group(function () {
    Route::get('aoquan', [ShopController::class, 'index'])->name('shop.index');
    Route::get('show/{id}', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
    Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
    Route::patch('update-cart', [ShopController::class, 'update']);
    Route::delete('remove-from-cart', [ShopController::class, 'remove']);
    Route::post('/order', [ShopController::class, 'order'])->name('order');
    //đăng nhập shop
    Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
    Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
    //đăng kí
    Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
    Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
    //đăng xuất shop
    Route::post('/logout', [ShopController::class, 'logout'])->name('shop.logout');
    
});
