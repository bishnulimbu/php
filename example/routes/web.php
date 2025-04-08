<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home');
});

Route::get('/job', function () {
    return view('job', ['jobs'=>Job::all()]);
});

Route::get('/job/{id}', function($id){
    return view('jobsee',['job'=>Job::find($id)]);
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/array', function () {
    return ['apple' => 'ball'];
});
