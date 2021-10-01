<?php

use App\Http\Livewire\ShowPhotos;
use Faker\Provider\ar_SA\Payment;
use App\Http\Livewire\CreateOrder;
use PHPUnit\Framework\Reorderable;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', WelcomeController::class);
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('photo/{order}', [PhotoController::class, 'photos'])->name('photos.download');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');
    
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('photos/{order}', ShowPhotos::class)->name('photos');
    
    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
});


