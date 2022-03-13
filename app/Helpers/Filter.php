<?php

namespace App\Helpers;

use Carbon\CarbonPeriod;

interface Filter
{
    public function apply(TimeSlotGenerator $generator, CarbonPeriod $interval);
}
