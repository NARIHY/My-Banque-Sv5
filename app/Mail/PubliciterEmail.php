<?php

namespace App\Mail;

use App\Models\Publicite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PubliciterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private string $publiciteId;
    /**
     * Create a new message instance.
     */
    public function __construct(string $publiciteId)
    {
        $this->publiciteId = $publiciteId;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->getPub(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à suprimer */
        $publiciter = Publicite::findOrFail($this->publiciteId);
        return new Content(
            view: 'public.banque.publicite.email',
            with: ['publiciter' => $publiciter],
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

    private function getPub()
    {
        $pub = Publicite::findOrFail($this->publiciteId);
        return $pub->titre;
    }
}
