<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    protected $doctor, $appointment;
    public function __construct(Doctor $doctor, Appointment $appointment )
    {
        $this->doctor=$doctor;
        $this->appointment=$appointment;
    }

    public function fetchDoctor($id)
    {
        $data=$this->doctor->where('department_id', $id)->get();
        return response()->json($data);
    }

    public function fetchSchedule($doctor_id)
    {
        $data = $this->doctor->with(['schedule' => function($query) {
            $query->where('status', 'available');
        }])->find($doctor_id);

        $schedules=$data->schedule;

            $currentDate = Carbon::now('Asia/Kathmandu');
            $currentTime=$currentDate->format('H:i A');
            $currentDay = $currentDate->format('l');

            $days=['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            $currentDayIndex=array_search($currentDay, $days);
            $saturdayIndex=array_search('Saturday', $days);
            $upcommingSchedules=[];

        foreach($schedules as $schedule)
        {
            $scheduleDayIndex=array_search($schedule->day, $days);
            $startTime=$schedule->start_time;

            $appointmentCount = count($schedule->appointment);

            if ($appointmentCount == $schedule->quota) {
                continue;
            }

            if($scheduleDayIndex<=$saturdayIndex && $scheduleDayIndex>=$currentDayIndex )
            {
               if( $scheduleDayIndex>=$currentDayIndex && $startTime<=$currentTime )
               {
                continue;
               }
            $upcommingSchedules[]=$schedule;

            }

        }
    return $upcommingSchedules;
    }
}
