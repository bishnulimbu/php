<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home');
});

Route::get('/job', function () {
    // $job= Job::with('employer')->get(); replaced with paginator
    $job = Job::paginate(3);
    //can use simplePaginate for very big pages.
    return view('job', ['jobs'=>$job]);
});  //eager loading parctise

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
