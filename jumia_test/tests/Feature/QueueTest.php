<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\QueueController;

class QueueTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testQueueSend()
    {
        $queue_controller = new QueueController;
        
        $this->assertTrue($queue_controller->send("Testing message system"));
    }
}
