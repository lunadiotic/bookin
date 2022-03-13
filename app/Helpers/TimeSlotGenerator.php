<?php

namespace App\Helpers;

use App\Models\Schedule;
use Carbon\CarbonInterval;

class TimeSlotGenerator
{
    public const INCREMENT = 30;
    protected $interval;

    public function __construct(Schedule $schedule)
    {
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
            ->toPeriod(
                $schedule->date->setTimeFrom($schedule->start_time),
                $schedule->date->setTimeFrom($schedule->end_time),
            );
    }

    public function get()
    {
        return $this->interval;
    }
}
