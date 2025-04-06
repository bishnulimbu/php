<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});

Route::get('/job', function () {
    return view('job', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Teacher',
                'salary' => '$30,000'
            ],
            [
                'id' => 3,
                'title' => 'Dancer',
                'salary' => '$110,000'
            ]
        ]
    ]);
});

Route::get('/job/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Teacher',
            'salary' => '$30,000'
        ],
        [
            'id' => 3,
            'title' => 'Dancer',
            'salary' => '$110,000'
        ]
    ];
$job = Arr::first($jobs, fn($job)=>$job['id']==$id);
    return view('jobsee',['job'=>$job]);
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
