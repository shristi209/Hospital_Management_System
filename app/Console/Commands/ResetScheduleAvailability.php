<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ResetScheduleAvailability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:available';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset all schedule statuses to available';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $schedules=Schedule::where('status', 'unavailable')->get();
        foreach($schedules as $schedule)
        {
            $schedule->status="available";
            $schedule->save();
              Log::info('Updated schedule ID: ' . $schedule->id);
        }
    }
}
