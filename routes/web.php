<?php
use App\Http\Controllers\authorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\positionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/', function () {
        return view('trangChu.index');
    })->name('trangChu');
       Route::prefix('position')->group(function () {
            Route::put('position/{id}',[positionController::class,'UpdatePositionRole'])->name('position.UpdatePositionRole');
       });
        Route::resource('shop', ShopController::class);
        Route::resource('position', positionController::class);
        Route::resource('user', usersController::class);
        Route::resource('author', authorController::class);
        Route::resource('category', CategorysController::class);
        Route::resource('book', BooksController::class);
        Route::resource('customer', CustomersController::class);
        Route::resource('order', OrdersController::class);
});
Route::prefix('login')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/loginProcessing', [LoginController::class, 'loginProcessing'])->name('loginProcessing');
});
