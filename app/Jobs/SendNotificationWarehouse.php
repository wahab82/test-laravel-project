<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderNotification;
use App\Order;
use App\Product;

class SendNotificationWarehouse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('warehouse@example.org')->send(new OrderNotification($this->order, $this->product));
    }
}
