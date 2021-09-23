<?php

use App\Http\Livewire\Admin\CreateService;
use App\Http\Livewire\Admin\EditService;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;

/* Admin services */
Route::get('/', ShowProducts::class)->name('admin.index');
Route::get('products/create', CreateService::class)->name('admin.services.create');
Route::get('products/{service}/edit', EditService::class)->name('admin.services.edit');

/* Admin orders */