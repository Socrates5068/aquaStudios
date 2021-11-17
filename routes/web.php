<?php

use App\Http\Livewire\ShowPhotos;
use Faker\Provider\ar_SA\Payment;
use App\Http\Livewire\CreateOrder;
use PHPUnit\Framework\Reorderable;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EditReservation;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Schedule;
use App\Http\Livewire\Who;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;


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

Route::get('quienes-somos/', Who::class)->name('who.show');
Route::get('agenda/', Schedule::class)->name('agenda');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth', 'verified'])->group(function(){
    
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('photo/{order}', [PhotoController::class, 'photos'])->name('photos.download');

    Route::get('orders/create/{service}', CreateOrder::class)->name('orders.create');
    
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/edit/{order}', EditReservation::class)->name('edit.order');
    Route::get('photos/{order}', ShowPhotos::class)->name('photos');
    
    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');

    Route::get('contactenos/', Contact::class)->name('contact');
    Route::view('/contact', 'emails.contact');
});