<?php

namespace App\Http\Controllers;

use App\Helpers\TimeSlotGenerator;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(1);

        $slots = (new TimeSlotGenerator($schedule))->get();

        return view('booking.create', [
            'slots' => $slots
        ]);
    }
}
