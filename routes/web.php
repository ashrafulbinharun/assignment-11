<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCrudController;
use App\Http\Controllers\SalesHistoriesController;
use App\Http\Controllers\SellProductsController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [SalesHistoriesController::class, 'salesRecord'] )->name( 'sales.history' );

Route::get( '/products', [ProductController::class, 'homepage'] )->name( 'all.products' );

Route::get( '/add-product', [ProductCrudController::class, 'create'] )->name( 'products.create' );
Route::post( '/add-product', [ProductCrudController::class, 'store'] )->name( 'products.store' );
Route::get( '/edit-product/{id}', [ProductCrudController::class, 'edit'] )->name( 'products.edit' );
Route::post( '/update-product/{id}', [ProductCrudController::class, 'update'] )->name( 'products.update' );
Route::delete( '/delete-product/{id}', [ProductCrudController::class, 'destroy'] )->name( 'products.destroy' );

Route::get( '/sell-product', [SellProductsController::class, 'sales'] )->name( 'products.sell.create' );
Route::post( '/sell-product', [SellProductsController::class, 'sellProduct'] )->name( 'products.sell' );