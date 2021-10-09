<?php

use App\Models\Service;
use App\Http\Livewire\Admin\Schedule;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\EditOrder;
use App\Http\Livewire\Admin\ShowOrders;
use App\Http\Livewire\Admin\EditService;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateService;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;

/* Admin services */
Route::get('/', ShowProducts::class)->name('admin.index');
Route::get('products/create', CreateService::class)->name('admin.services.create');
Route::get('products/{service}/edit', EditService::class)->name('admin.services.edit');

/* Admin categories */
Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');

/* Admin orders */
Route::get('orders', ShowOrders::class)->name('admin.orders');
Route::get('orders/{order}/edit', EditOrder::class)->name('admin.orders.edit');
/* Images */
Route::post('orders/{order}/images', [OrderController::class, 'images'])->name('admin.orders.images');
Route::get('orders/{order}/photos', [OrderController::class, 'photos'])->name('admin.orders.photos');

/* Admin users */
Route::get('users', UserComponent::class)->name('admin.users.index');

/* Schedule */
Route::get('schedule', Schedule::class)->name('admin.schedule');