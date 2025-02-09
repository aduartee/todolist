<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class TaskCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    private Task $task;
    /**
     * Create a new message instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

   public function build() {
    return $this->subject('Tarefa criada')
            ->view('emails.created_task')
            ->with(['task' => $this->task]);
   }
}
