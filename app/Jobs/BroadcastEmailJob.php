<?php

namespace App\Jobs;

use App\Mail\BroadcastMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BroadcastEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $subject;
    public string $content;
    public string $recipientEmail;
    public string $recipientName;

    /**
     * Create a new job instance.
     */
    public function __construct(string $subject, string $content, string $recipientEmail, string $recipientName)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->recipientEmail = $recipientEmail;
        $this->recipientName = $recipientName;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->recipientEmail)
            ->send(new BroadcastMail(
                $this->subject,
                $this->content,
                $this->recipientName
            ));
    }
}
