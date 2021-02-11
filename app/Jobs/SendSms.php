<?php

namespace App\Jobs;

use App\Services\Notification\NotificationInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $notify;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->notify = app(NotificationInterface::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->notify->send();
    }

}
