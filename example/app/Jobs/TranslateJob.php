<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListings)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger ("doing" .$this->jobListings->title. "is being translated to engiush.");
    }
}
