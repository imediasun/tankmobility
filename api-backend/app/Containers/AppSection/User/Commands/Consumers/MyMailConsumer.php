<?php

namespace App\Containers\AppSection\User\Commands\Consumers;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Contracts\KafkaConsumerMessage;

class MyMailConsumer extends Command
{
    protected $signature = "kafka:consume";

    protected $description = "Consume Kafka messages from 'topic'.";

    public function handle()
    {

        $consumer = Kafka::createConsumer(['topic'])
            ->withBrokers('kafka:9092')
            ->withAutoCommit()
            ->withHandler(function(KafkaConsumerMessage $message) {
                \Log::info('test consumer');
                $data = array('name'=>"Virat Gandhi");
                Mail::send(['text'=>'ship::test-mail-page'], $data, function($message) {
                    $message->to('dev.magellan@gmail.com', 'Tutorials Point')->subject
                    ('Laravel Basic Testing Mail');
                    $message->from('senior.dev.php@gmail.com','Virat Gandhi');
                });
            })
            ->build();

        $consumer->consume();
    }
}
