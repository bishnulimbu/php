<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::resource('job', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/job', 'index');
//     Route::get('/job/create', 'create');
//     Route::get('/job/{job}', 'show');
//     Route::get('/job/{job}/edit', 'edit');
//     Route::post('/job', 'store');
//     Route::PATCH('/job/{job}', 'update');
//     Route::DELETE('/job/{job}', 'delete');
// });

// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/array', function () {
//     return ['apple' => 'ball'];
// });
//

// Route::get('/', function () {
//     return view('home');
// });
// Route::delete('/job/{job}', function (Job $job) {
// Route::get('/job', function () {
// $job= Job::with('employer')->get(); replaced with paginator
// $job = Job::paginate(3);
//can use simplePaginate for very big pages.
// return view('jobs.index', ['jobs' => $job]);
// });  //eager loading parctise


// Route::get('/job/create', function () {
//     return view('jobs.create');
// });
//
// Route::post('/job', function () {
//     // dd(request('title'));
//     // try {
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required'],
//     ]);
//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);
//     // } catch (Exception $e) {
//     //     echo "error, $e";
//     // }
//     return redirect('/job');
// });
// //get for update
// Route::get('job/{job}/edit', function (Job $job) {
//     return view('jobs.edit', ['job' => $job]);
// });
// //update
// Route::patch('job/{job}', function (Job $job) {
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required'],
//     ]);
//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary'),
//     ]);
//     return redirect('/job/' . $job->id);
// });
//job delet route
// Route::delete('/job/{job}', function (Job $job) {
//     // auth on hold..
//     // Job::findOrFail($id)->delete();
//     $job->delete();
//     // $job->delete();
//     return redirect('job');
// });


//wild card route placed at the buttom.
//laravel route model binding usuage
// Route::get('/job/{job}', function (Job $job) {
//     return view('jobs.view', ['job' => $job]);
// });
