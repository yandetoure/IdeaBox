<?php
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ideas.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('ideas')->name('ideas.')->group(function () {
    Route::get('/', [IdeaController::class, 'index'])->name('index');
    Route::get('/create', [IdeaController::class, 'create'])->name('create');
    Route::post('/', [IdeaController::class,'store'])->name('store');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');
    Route::get('/myideas', [IdeaController::class, 'myideas'])->name('myideas');
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/details', [IdeaController::class, 'details'])->name('details');
});

require __DIR__.'/auth.php';
