<?php

namespace App\Events;

use App\Models\DetailTransaksi;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $detailTransaksi;

    public function __construct(DetailTransaksi $detailTransaksi)
    {
        $this->detailTransaksi = $detailTransaksi;
    }

    public function broadcastOn()
    {
        return new Channel('order-status');
    }

    public function broadcastAs()
    {
        return 'order-status.updated';
    }
}
