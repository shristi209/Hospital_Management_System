<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleValidationRequest;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    protected $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
    public function index()
    {
        $schedules = $this->schedule->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(ScheduleValidationRequest $request)
    {
        $data = $request->validated();

        foreach ($data['day'] as $day) {
            $this->schedule::create([
                'doctor_id' => $data['doctor_id'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'day' => $day,
                'quota' => $data['quota'],
            ]);
        }


        return redirect()->route('schedule.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $schedule = $this->schedule->findOrFail($id);
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(ScheduleValidationRequest $request,  $id)
    {
        // dd($request);
        $data = $request->validated();
        $schedule = $this->schedule->findOrFail($id);
        $schedule->update($data);
        return redirect()->route('schedule.index');
    }

    public function destroy($id)
    {
        $schedule = $this->schedule->findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
