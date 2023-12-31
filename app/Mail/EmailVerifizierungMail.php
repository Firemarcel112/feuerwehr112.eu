<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerifizierungMail extends Mailable
{
	use Queueable, SerializesModels;

	public string $benutzername;
	private string $url;

	/**
	 * Create a new message instance.
	 */
	/**
	 * Create a new message instance.
	 *
	 * @param string $benutzername
	 * @param string $url Validation Url
	 */
	public function __construct(string $benutzername, string $url)
	{
		$this->benutzername = $benutzername;
		$this->url = $url;
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			from: new Address(env('MAIL_VERIFY_ADDRESS'), env('MAIL_VERIFY_FROM_NAME')),
			subject: 'Email Verifizierung Mail',
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content
	{
		return new Content(
			markdown: 'mail.emailverifizerung',
				with: [
					'benutzername' => $this->benutzername,
					'url' => $this->url,
				]
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
