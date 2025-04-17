<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

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
        $job=Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::user()->employer->id,
        ]);

        //instead of send. changed to queue as a request
    Mail::to($job->employer->user)->queue(
        new JobPosted($job));

        return redirect('/job')->with('success','job created & mail successfully send.');
    }
    public function edit(Job $job)
    {
        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403)->with('error', 'You are not allowed to edit this job!');
        // }
        // dd($job->empoyer->user->Auth::user());
    //    dd($job->employer->user->is(Auth::user()));
    // if (auth::user()->can('edit-job', $job)) {
    //        dd('can nnot runned') 
    //         }is not needed necessarily
        // Gate::authorize('edit-job',$job);
        // middleware can be used in route for this
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
