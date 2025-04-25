<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('add',function(){
//     dd(request()->all());
// })->name('add');//adding a name url do directly acces using route from html

Route::get('forms',[FormController::class,'index'])->name('forms.index');
Route::get('forms/create',[FormController::class,'create'])->name('forms.create');
Route::post('forms',[FormController::class,'store'])->name('forms.store');
Route::get('forms/{form}/edit',[FormController::class,'edit'])->name('forms.edit');
Route::put('forms/{form}',[FormController::class,'update'])->name('forms.update');
Route::delete('forms/{form}',[FormController::class,'destroy'])->name('forms.destroy');