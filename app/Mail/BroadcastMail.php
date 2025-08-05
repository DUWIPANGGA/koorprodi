<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $recipientName;
    public $profileImagePath;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content, $recipientName = null, $profileImagePath = null)
    {Log::info($this->recipientName);
        $this->subject = $subject;
        $this->content = $content;
        $this->recipientName = $recipientName;
        $this->profileImagePath = $profileImagePath ?? public_path('formadiksi.png');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        Log::info($this->recipientName);
        return new Content(
            view: 'emails.broadcast',
            with: [
                'content' => $this->content,
                'recipientName' => $this->recipientName,
                'hasProfileImage' => !empty($this->profileImagePath),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}