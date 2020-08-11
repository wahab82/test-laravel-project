<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Order;
use App\Product;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.notification')->with(['order' => $this->order, 'product' => $this->product]);
    }
}