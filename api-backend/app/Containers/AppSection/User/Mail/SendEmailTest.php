<?php

namespace App\Containers\AppSection\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('theemail@gmail.com', 'Me')->view('ship::test-mail-page');
    }
}
