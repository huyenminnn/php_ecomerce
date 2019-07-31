<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $info_delivery;
    public $orderDetail;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info_delivery, $orderDetail, $id)
    {
        $this->info_delivery = $info_delivery;
        $this->orderDetail = $orderDetail;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Information')
                    ->markdown('emails.order')
                    ->with([
                        'info_delivery' => $this->info_delivery,
                        'orderDetails' => $this->orderDetail,
                        'id' => $this->id,
                    ]);
    }
}
