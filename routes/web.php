<?php

use \App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use \App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');

Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('add-detail');



Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])
    ->name('register-success');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('delete-cart');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])
        ->name('checkout');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/settings', [App\Http\Controllers\DashboardController::class, 'setting'])
        ->name('dashboard-setting');
    Route::get('/dashboard/accounts', [App\Http\Controllers\DashboardController::class, 'account'])
        ->name('dashboard-account');
    Route::post('/dashboard/accounts/{redirect}', [App\Http\Controllers\DashboardController::class, 'accountUpdate'])
        ->name('dashboard-account-redirect');

    Route::get('/dashboard/products', [
        App\Http\Controllers\DashboardController::class,
        'product'
    ])->name('dashboard-product');
    Route::get('/dashboard/products/add', [App\Http\Controllers\DashboardController::class, 'productAdd'])
        ->name('dashboard-product-add');
    Route::post('/dashboard/products', [App\Http\Controllers\DashboardController::class, 'productStore'])
        ->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardController::class, 'productDetail'])
        ->name('dashboard-product-detail');
    Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardController::class, 'productUpdate'])
        ->name('dashboard-product-update');

    Route::post('/dashboard/products/gallery/upload', [App\Http\Controllers\DashboardController::class, 'productUploadGallery'])
        ->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', [App\Http\Controllers\DashboardController::class, 'productDeleteGallery'])
        ->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardController::class, 'transaction'])
        ->name('dashboard-transaction');
    Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardController::class, 'transactionDetail'])
        ->name('dashboard-transaction-detail');
    Route::post('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardController::class, 'transactionUpdate'])
        ->name('dashboard-transaction-update');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::prefix('admin')
            ->group(function () {
                Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
                Route::resource('category', CategoryController::class);
                Route::resource('user', UserController::class);
                Route::resource('product', ProductController::class);
                Route::resource('gallery', GalleryController::class);
                Route::resource('transaction', TransactionController::class);
            });
    });
});


Auth::routes();
