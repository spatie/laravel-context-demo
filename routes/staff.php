<?php

use App\Http\Staff\Controllers\Products\ProductsController;

Route::get('products', [ProductsController::class, 'index']);
Route::get('products/{id}', [ProductsController::class, 'edit']);
