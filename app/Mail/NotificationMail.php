<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $total, $premise_name, $expired_date;

    /**
     * Create a new message instance.
     *
     * @param $data
     * @return void
     */
    public function __construct($data)
    {
        $this->total = '0';
        $this->premise_name = $data->fcApplication->premiseDetail->name;
        $this->expired_date = $data->fcApplication->expiry_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify', [
            'total' => $this->total,
            'premise_name' => $this->premise_name,
            'expired_date' => $this->expired_date,
        ]);
    }
}
