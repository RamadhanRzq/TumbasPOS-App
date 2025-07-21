<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/api/produk', [ProdukController::class, 'index']);
Route::post('/api/addProduk', [ProdukController::class, 'store']);
