<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Schedule;

class AppointmentController extends Controller
{

    public function fetchDoctor(Request $request, $id)
    {
        $data=Doctor::where('department_id', $id)->get();
        return response()->json($data);
    }
    public function fetchSchedule(Request $request, $schedule_id)
    {
        $data = Doctor::with('schedule')->find($schedule_id);
        $schedules=$data->schedule;
        $allIntervals = [];
        return response()->json($schedules);
    }

}
