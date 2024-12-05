<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/addprodutos', [ProductController::class, 'index'])->name('produtos.index');
Route::get('/produtos/criar', [ProductController::class, 'create'])->name('products.create');
Route::post('/produtos', [ProductController::class, 'store'])->name('products.store');
Route::get('/produtos/{product}/editar', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produtos/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produtos/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/carrinho', [PageController::class, 'carrinho'])->name('carrinho.index');
Route::get('/sobre-nos', [PageController::class, 'sobreNos'])->name('sobreNos.index');
Route::get('/contactos', [PageController::class, 'contactos'])->name('contactos.index');

Route::get('/produtosview', [ProductViewController::class, 'index'])->name('produtosview.index');

Route::get('/contato', [ContactController::class, 'showForm'])->name('contato.form');
Route::post('/contato', [ContactController::class, 'submitForm'])->name('contato.submit');
Route::get('/contact-messages', [ContactController::class, 'index'])->name('contactmessages.index');
Route::delete('/contact-messages/{id}', [ContactController::class, 'destroy'])->name('contactmessages.destroy');
Route::get('/contact-messages/{id}', [ContactController::class, 'show'])->name('contactmessages.show');


require __DIR__.'/auth.php';