<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessComment implements ShouldQueue
{
    use Queueable;

    protected $id;
    protected $title;
    protected $body;

    /**
     * Create a new job instance.
     */
    public function __construct($id, $title, $body)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Emulating some time-consuming logic
        sleep(600);
        // Finishing the comment creation
        Comment::create(['article_id' => $this->id, 'title' => $this->title, 'body' => $this->body]);
    }
}
