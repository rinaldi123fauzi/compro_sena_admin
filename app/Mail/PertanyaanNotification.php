<?php

namespace App\Mail;

use App\Models\Pertanyaan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PertanyaanNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $pertanyaan;
    public $jenis;

    /**
     * Create a new message instance.
     */
    public function __construct(Pertanyaan $pertanyaan)
    {
        $this->pertanyaan = $pertanyaan;
        $this->jenis = $pertanyaan->jenis === 'bisnis' ? 'Business' : 'General';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "New {$this->jenis} Question from {$this->pertanyaan->name}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pertanyaan-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
