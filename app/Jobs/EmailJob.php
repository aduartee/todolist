<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use  App\Mail\TaskCreatedMail;
use App\Models\Task;

class EmailJob implements ShouldQueue
{
    use Queueable;
    private $email = null;
    //Create a model
    private Task $task;

    public function __construct(string $email, Task $task)
    {
        $this->email = $email;    
        $this->task = $task;    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new TaskCreatedMail($this->task));
    }
}
