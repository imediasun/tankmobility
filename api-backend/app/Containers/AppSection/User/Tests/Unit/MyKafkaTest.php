<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Tests\TestCase;
use Exception;
use Junges\Kafka\Facades\Kafka;

/**
 * Class MyKafkaTest.
 *
 * @group user
 * @group unit
 */
class MyKafkaTest extends TestCase
{
    public function testMyAwesomeApp()
    {
        Kafka::fake();

        $producer = Kafka::publishOn('topic')
            ->withHeaders(['key' => 'value'])
            ->withBodyKey('foo', 'bar');

        $producer->send();

        Kafka::assertPublished($producer->getMessage());
    }
}
