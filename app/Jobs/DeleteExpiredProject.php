<?php

namespace App\Jobs;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteExpiredProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $project;

    /**
     * Create a new job instance.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attachments = $this->project->attachments; // get all attachments associated with the project

        if ($attachments) {
            foreach ($attachments as $attachment) {
                $file_path = $this->project->id . '/' . $attachment->file_name;
                Storage::disk('public_uploads')->delete($file_path); // delete each attachment file from storage
                $attachment->delete(); // delete the attachment record from the database
            }
        }

        $this->project->delete(); // delete the project record from the database
    }
}
