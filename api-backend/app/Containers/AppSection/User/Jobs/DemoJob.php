<?php

namespace App\Containers\AppSection\User\Jobs;

use App\Ship\Parents\Jobs\Job;
use Illuminate\Support\Facades\Mail;
use App\Containers\AppSection\User\Mail\SendEmailTest;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class DemoJob extends Job
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;


    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        $email = new SendEmailTest();
        Mail::to($this->details['email'])->send($email);
    }
}
