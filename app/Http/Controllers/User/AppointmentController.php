<?php

namespace App\Http\Controllers\User;

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
        // foreach ($schedules as $value) {
        //     $intervals = $value->getTimeIntervals();
        //     $allIntervals = array_merge($allIntervals, $intervals);
        // }
        // dd($allIntervals);
        return response()->json($schedules);

        // dd($schedules);
        // return view('user.appointment.appointment', compact('schedules'))->render();

    }
    public function formShow(){
        return view('user.appointment.form');

    }

}
