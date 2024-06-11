<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AvailabilityNotificationToDoctor;

class DoctorScheduleController extends Controller
{
    protected $schedule, $appointment, $doctor;

    public function __construct(Schedule $schedule, Appointment $appointment, Doctor $doctor)
    {
        $this->schedule=$schedule;
        $this->appointment=$appointment;
        $this->doctor=$doctor;
    }

    public function index()
    {
        $userId = Auth::id();
        $doctorId=Auth::user()->doctor_id;
        $doctor=$this->doctor->find($doctorId);
        $schedules = $this->schedule->where('doctor_id', $doctorId)->orderBy('created_at', 'desc')->get();
        $appointments=$this->appointment->where('doctor_id', $doctorId)->get();
        return view('doctor.schedules.index', compact('schedules', 'appointments'));
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

    public function statusUpdate(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $superadmins = User::whereHas('roles', function ($query) {
            $query->where('name', 'super-admin');
        })->get();

        $schedule->status = $request->has('status') ? $request->input('status') : 0;
        $schedule->save();

        $doctor=$schedule->doctor;
        foreach ($superadmins as $superadmin) {
            $superadmin->notify(new AvailabilityNotificationToDoctor($doctor));
        }
        return redirect()->back()->with('message', 'Status updated successfully');
    }

    public function destroy( $id)
    {

    }
}
