<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Page;

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

Route::get('/', [Page\HomeController::class, 'index']);
Route::get('/detail/{slug}/{id}', [Page\DetailController::class, 'index']);

Route::get('shop/{categoryName}', [Page\ShopController::class, 'index'])->name('shop');

//load-comment
Route::post('/load-comment', [Page\DetailController::class, 'loadComment']);
Route::post('/send-comment', [Page\DetailController::class, 'sendComment']);




Route::prefix('cart')->group(function () {
    //cart
    Route::get('add/{id}', [Page\CartController::class, 'add']);
    Route::get('buy-now/{id}', [Page\CartController::class, 'buyNow']);

    Route::get('/', [Page\CartController::class, 'cart']);
    Route::get('/delete/{rowId}', [Page\CartController::class, 'delete']);
    Route::get('/destroy', [Page\CartController::class, 'destroy']);

    Route::get('/update', [Page\CartController::class, 'update']);

    //checkout
    Route::post('/', [Page\CartController::class, 'addOrder']);
    Route::get('/result', [Page\CartController::class, 'result']);
});






Route::get('admin/login', [Admin\LoginController::class, 'index'])->name('login');
Route::post('admin/login/store', [Admin\LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('main', [Admin\HomeController::class, 'index'])->name('admin');
        Route::resource('category', Admin\CategoryController::class);
        Route::resource('brand', Admin\BrandController::class);
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
