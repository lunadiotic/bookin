<?php

namespace App\Http\Controllers;

use App\Helpers\Filters\SlotsPassedTodayFilter;
use App\Helpers\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(1);
        $service = Service::find(1);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter()
            ])
            ->get();

        return view('booking.create', [
            'slots' => $slots
        ]);
    }
}
