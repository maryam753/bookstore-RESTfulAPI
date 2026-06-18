<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookWebController;

Route::get('/', fn() => redirect()->route('books.index'));
Route::resource('books', BookWebController::class);
