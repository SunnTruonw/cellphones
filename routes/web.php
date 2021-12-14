<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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
    return view('welcome');
});

Route::get('admin/login', [Admin\LoginController::class, 'index'])->name('login');
Route::post('admin/login/store', [Admin\LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('main', [Admin\HomeController::class, 'index'])->name('admin');
        Route::resource('category', Admin\CategoryController::class);
        Route::resource('product', Admin\ProductController::class);
        Route::resource('store', Admin\StoreController::class);
        Route::resource('store_detail', Admin\StoreDetailController::class);
        Route::resource('product_detail', Admin\ProductDetailController::class);
        Route::resource('product_image', Admin\ProductImageController::class);
        Route::resource('slider', Admin\SliderController::class);



        #upload
        Route::post('/upload/services', [Admin\UploadController::class, 'upload']);


    });
});
