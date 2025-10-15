<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

Route::get('/', [DeckController::class, 'index'])->name('home');

Route::resource('decks', DeckController::class);


Route::get('/dashboard', [DeckController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
