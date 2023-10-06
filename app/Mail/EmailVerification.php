<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $verificationLink = URL::temporarySignedRoute(
            'verification.verify',
            now()->addHours(1),
            [
                'id' => $this->user->getKey(),
                'hash' => sha1($this->user->getEmailForVerification()),
            ]
        );
        
        $data = [
            'name' => $this->user->name,
            'verification_link' => $verificationLink
        ];
        return $this->subject('Email Verification')
            ->markdown('mail.verificationEmail', $data);
    }
}
