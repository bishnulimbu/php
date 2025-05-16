<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use Illuminate\Routing\RouteGroup;
use PHPUnit\Framework\Attributes\Group;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
})->name('home');
;
Route::get('forms',[FormController::class,'index'])->name('forms.index');
Route::get('forms/create',[FormController::class,'create'])->name('forms.create');
Route::post('forms',[FormController::class,'store'])->name('forms.store');
ROute::get('forms/{form}',[FormController::class,'show'])->name('forms.show');
Route::get('forms/{form}/edit',[FormController::class,'edit'])->name('forms.edit');
Route::put('forms/{form}',[FormController::class,'update'])->name('forms.update');
Route::delete('forms/{form}',[FormController::class,'destroy'])->name('forms.destroy');


Route::resource('todos',TodoController::class);
Route::resource('categories',CategoryController::class);
Route::put('/todos/{todo}/update-status',[TodoController::class,'updateStatus'])->name('todos.update-status');

Route::get('posts',[PostController::class,'index'])->name('posts.index');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('posts/{post:slug}',[PostController::class,'show'])->name('posts.show');
Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::get('admin',[PostController::class, 'adminIndex'])->name('admin')->middleware('auth');

// Route::middleware(['auth'])->group(function(){
//     Route::resource('posts',PostController::class)->except(['index','show']);
// });

Route::delete('images/{image}',[ImageController::class, 'destroy'])->name('images.delete');

// Route::get('admin',function(){
//     return view('posts.admin');
// })->name('admin');
// Route::get('tododashboard',function(){
//     return view('todos.index');
// })->name('todo-dashboard');
// Route::post('add',function(){
//     dd(request()->all());
// })->name('add');//adding a name url do directly acces using route from html

// Route::controller(FormController::class)->group(function(){
//     Route::get('forms','index')->name('forms.index');
    
// })