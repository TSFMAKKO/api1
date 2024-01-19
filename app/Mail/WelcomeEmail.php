<?php
// app/Mail/WelcomeEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(User $user)
    {
        // return $this->view('emails.welcome');
        return $this->from('racingf1@gmail.com', 'laravel email')
            ->to("acerfp563@msn.com")
            ->subject('Welcome to Our Website')
            ->view('emails.welcome', ["user" => $user]);
    }
}
