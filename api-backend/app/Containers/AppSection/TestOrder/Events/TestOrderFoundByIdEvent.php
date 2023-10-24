<?php

namespace App\Containers\AppSection\TestOrder\Events;

use App\Containers\AppSection\TestOrder\Models\TestOrder;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TestOrderFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public TestOrder $testorder
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
