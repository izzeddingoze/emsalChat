<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TimeReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:time-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind time';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        event(new \App\Events\TimeReminder());
    }
}
