<?php

namespace App\Helpers;

use App\Models\Schedule;
use App\Models\Service;
use Carbon\CarbonInterval;

class TimeSlotGenerator
{
    public const INCREMENT = 30;
    protected $interval;
    public $schedule;

    public function __construct(Schedule $schedule, Service $service)
    {
        $this->schedule = $schedule;
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
            ->toPeriod(
                $schedule->date->setTimeFrom($schedule->start_time),
                $schedule->date->setTimeFrom(
                    $schedule->end_time->subMinutes($service->duration)
                ),
            );
    }

    public function applyFilters(array $filters)
    {
        foreach ($filters as $filter) {
            if (!$filter instanceof Filter) {
                continue;
            }

            $filter->apply($this, $this->interval);
        }

        return $this;
    }

    public function get()
    {
        return $this->interval;
    }
}
