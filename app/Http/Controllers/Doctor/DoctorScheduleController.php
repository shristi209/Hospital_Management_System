<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\ScheduleValidationRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class DoctorScheduleController extends Controller
{
    public function __construct(Schedule $schedule)
    {
        $this->schedule=$schedule;
    }

    public function index()
    {
        $userId = Auth::id();
        $doctorId=Auth::user()->doctor_id;
        $schedules = $this->schedule->where('doctor_id', $doctorId)->get();
        return view('doctor.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('doctor.schedules.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
        ]);

        $doctorId=Auth::user()->doctor_id;
        $this->schedule->create([
            'doctor_id'=>$doctorId,
            'schedule_date'=>$request->schedule_date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        return redirect()->route('doctorschedule.index');

    }

    public function show($id)
    {

    }

    public function edit( $id)
    {
        $schedule=$this->schedule->findOrFail($id);
        return view('doctor.schedules.edit', compact('schedule'));
    }

    public function update(Request $request,  $id)
    {
        $data=$request->validate([
            'schedule_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
        ]);
        $schedule=$this->schedule->findOrFail($id);
        $schedule->update($data);

        return redirect()->route('doctorschedule.index');
    }

    public function destroy( $id)
    {

    }
}
