<?php
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('ideas')->name('ideas.')-> middleware('auth')->group(function () {
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

Route::prefix('comments')->name('comments.')->middleware('auth')->group(function () {
    Route::post('/store', [CommentController::class, 'store'])->name('store');
});
require __DIR__.'/auth.php';
