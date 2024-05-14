<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    protected $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor=$doctor;
    }
    
    public function fetchDoctor(Request $request, $id)
    {
        $data=$this->doctor->where('department_id', $id)->get();
        return response()->json($data);
    }
    
    public function fetchSchedule(Request $request, $schedule_id)
    {
        $data = $this->doctor->with('schedule')->find($schedule_id);
        $schedules=$data->schedule;

        $doctorId=Auth::user()->doctor_id;
        $appointments=Appointment::where('doctor_id',$doctorId)->get();

        return response()->json([
            'schedule' => $schedules,
            'appointments' => $appointments,
        ]);    
    }

}
