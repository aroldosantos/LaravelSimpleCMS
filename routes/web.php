<?php

use App\Http\Livewire\PostTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});










Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 
'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/posts', PostTable::class)->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/destroy/{id}', [PostController::class, 'delete'])->name('posts.delete');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update', [PostController::class, 'update'])->name('posts.update');



});
