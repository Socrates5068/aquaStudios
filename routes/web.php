<?php

use App\Http\Livewire\Who;
use App\Mail\ContactMailable;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Schedule;
use App\Http\Livewire\ShowPhotos;
use Faker\Provider\ar_SA\Payment;
use App\Http\Livewire\CreateOrder;
use PHPUnit\Framework\Reorderable;
use App\Http\Livewire\PaymentOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\EditReservation;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;


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

/* libelula callback_url*/
Route::post('api/pago-exitoso', [PaymentController::class, 'payOrder'])->name('pay.order');
Route::get('api/successful-pay', [PaymentController::class, 'payOrderGet'])->name('pay.get');
Route::get('api/successful-autopay', [PaymentController::class, 'payOrderauto'])->name('pay.auto');

/* libelula url_retorno*/
Route::get('ticket_cliente/{id}',[Ticket_ClienteController::class,'ticketCliente'])->name('ticket_cliente');

Route::get('/', WelcomeController::class);
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('quienes-somos/', Who::class)->name('who.show');
Route::get('agenda/', Schedule::class)->name('agenda');

//Condiciones y servicios
Route::get('/politicas', function (){
    return view('/condiciones/show');
});

Route::middleware(['auth', 'verified'])->group(function(){

    /* Orders */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/create/{service}', CreateOrder::class)->name('orders.create');
    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
    Route::get('orders/edit/{order}', EditReservation::class)->name('edit.order');

    /* phots */
    Route::get('photos/{order}', ShowPhotos::class)->name('photos');
    Route::get('photo/{order}', [PhotoController::class, 'photos'])->name('photos.download');    
    
    /* Information page */
    Route::get('contactenos/', Contact::class)->name('contact');
    Route::view('contact/', 'emails.contact');
});