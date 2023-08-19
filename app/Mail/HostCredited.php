<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Gift;

class HostCredited extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $gift;
    public function __construct(Gift $gift)
    {
        $this->gift = $gift;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('office@maryparrish.org', 'The Mary Parrish Center')->subject('Hooray! ' . $this->gift->donor->full_name . ' credited you as a Housing Hope Host.')->view('mail.hostcredited');
    }
}
