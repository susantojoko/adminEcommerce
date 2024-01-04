<?php

use App\Http\Controllers\admin\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AdminChatController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Admin;
use Illuminate\Support\Facades\Blade;

Blade::component('layouts.universal-table', 'universal-table');

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

Route::get('/login', [AdminLoginController::class,'index'])->name('admin.login');
Route::post('/authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard.index');
    Route::get('/dashboard', [HomeController::class,'index'])->name('admin.dashboard');
    Route::get('/data', [HomeController::class,'data'])->name('data.admin');
    Route::get('/logout', [HomeController::class,'logout'])->name('admin.logout');
    Route::get('admin', [AdminController::class,'index'])->name('admin.index');
    Route::post('/admin/tambah/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('/admin/edit/{admin}', [AdminController::class,'edit'])->name('admin.edit');
    Route::put('/admin/{admin}', [AdminController::class,'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [AdminController::class,'destroy'])->name('admin.destroy');
    Route::get('/admin/tambah', [AdminController::class,'create'])->name('admin.create');
    
    Route::get('/admin/chat', [AdminChatController::class,'index'])->name('chat.index');
    Route::get('/get-chat-messages/{senderId}', [ChatController::class, 'getChatMessages']);
    Route::post('/send-chat', 'AdminChatController@sendChat')->name('send-chat');


    Route::get('/user',[UsersController::class,'index'])->name('users.index');
    Route::get('/user/tambah', [UsersController::class,'create'])->name('users.add');
    Route::post('/user/tambah/store', [UsersController::class,'store'])->name('users.store');
    Route::get('/user/edit/{user}', [UsersController::class,'edit'])->name('users.edit');
    Route::put('/user/{user}', [UsersController::class,'update'])->name('users.update');
    Route::delete('/user/{user}', [UsersController::class,'destroy'])->name('users.destroy');
    
    Route::get('/kategori',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/kategori/tambah', [CategoryController::class,'create'])->name('categories.add');
    Route::post('/kategori/tambah/store', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/kategori/edit/{category}', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/kategori/{category}', [CategoryController::class,'update'])->name('categories.update');
    Route::delete('/kategori/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');


    Route::get('/subkategori', [SubCategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/subkategori/tambah', [SubCategoryController::class, 'create'])->name('subcategories.add');
    Route::post('/subkategori/tambah/store', [SubCategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subkategori/edit/{subcategory}', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subkategori/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/subkategori/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');


    Route::get('/rating', [RatingController::class, 'index'])->name('ratings.index');
    Route::get('/rating/tambah', [RatingController::class, 'create'])->name('ratings.add');
    Route::post('/rating/tambah/store', [RatingController::class, 'store'])->name('ratings.store');
    Route::get('/rating/edit/{rating}', [RatingController::class, 'edit'])->name('ratings.edit');
    Route::put('/rating/{rating}', [RatingController::class, 'update'])->name('ratings.update');
    Route::delete('/rating/{rating}', [RatingController::class, 'destroy'])->name('ratings.destroy');

    Route::get('/produk', [ProductController::class,'index'])->name('products.index');
    Route::get('/produk/tambah', [ProductController::class,'create'])->name('products.add');
    Route::post('/produk/tambah/store', [ProductController::class,'store'])->name('products.store');
    Route::get('/produk/edit/{product}', [ProductController::class,'edit'])->name('products.edit');
    Route::put('/produk/{product}', [ProductController::class,'update'])->name('products.update');
    Route::delete('/produk/{product}', [ProductController::class,'destroy'])->name('products.destroy');


    Route::get('/transaksi', [TransactionController::class,'index'])->name('transactions.index');
    Route::get('/transaksi/print', [TransactionController::class,'show'])->name('transactions.show');
    Route::get('/transaksi/create', [TransactionController::class,'create'])->name('transactions.create');
    Route::post('/transaksi', [TransactionController::class,'store'])->name('transactions.store');
    Route::get('/transaksi/{transaction}', [TransactionController::class,'show'])->name('transactions.show');
    Route::get('/transaksi/{transaction}/edit', [TransactionController::class,'edit'])->name('transactions.edit');
    Route::put('/transaksi/{transaction}', [TransactionController::class,'update'])->name('transactions.update');
    Route::delete('/transaksi/{transaction}', [TransactionController::class,'destroy'])->name('transactions.destroy');

});
