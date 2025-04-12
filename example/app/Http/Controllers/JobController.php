<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', ['jobs' => Job::latest()->paginate(3)]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        return view('jobs.view', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/job');
    }
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/job/' . $job->id);
    }
    public function delete(Job $job)
    {
        $job->delete();
        return redirect('job');
    }
}
