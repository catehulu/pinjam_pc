<?php

namespace Pinjam\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pinjam\Data;

class EmailDiterima extends Mailable
{

    use Queueable, SerializesModels;
    public $edit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Data $edit)
    {
        $this->edit = $edit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.emailditerima');
    }
}
