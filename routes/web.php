<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;

Route::get('/', function () {
    return view('ideas.index');
});

Route::prefix('ideas')->group(function () {
    Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
    Route::get('/create', [IdeaController::class, 'create'])->name('ideas.create');
    Route::post('/', [IdeaController::class, 'store'])->name('ideas.store');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
    
});