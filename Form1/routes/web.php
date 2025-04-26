<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\TodoController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::get('/', function () {
    return view('welcome');
})->name('/');
// Route::get('tododashboard',function(){
//     return view('todos.index');
// })->name('todo-dashboard');
// Route::post('add',function(){
//     dd(request()->all());
// })->name('add');//adding a name url do directly acces using route from html

// Route::controller(FormController::class)->group(function(){
//     Route::get('forms','index')->name('forms.index');
    
// });
Route::get('forms',[FormController::class,'index'])->name('forms.index');
Route::get('forms/create',[FormController::class,'create'])->name('forms.create');
Route::post('forms',[FormController::class,'store'])->name('forms.store');
ROute::get('forms/{form}',[FormController::class,'show'])->name('forms.show');
Route::get('forms/{form}/edit',[FormController::class,'edit'])->name('forms.edit');
Route::put('forms/{form}',[FormController::class,'update'])->name('forms.update');
Route::delete('forms/{form}',[FormController::class,'destroy'])->name('forms.destroy');


Route::resource('todos',TodoController::class);
Route::put('/todos/{todo}/update-status',[TodoController::class,'updateStatus'])->name('todos.update-status');