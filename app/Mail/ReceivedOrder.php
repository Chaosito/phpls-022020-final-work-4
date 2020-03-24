<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceivedOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    private $productTitle;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $productTitle)
    {
        $this->data = $data;
        $this->productTitle = $productTitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.received_order', ['data' => $this->data, 'product_title' => $this->productTitle]);
    }
}
