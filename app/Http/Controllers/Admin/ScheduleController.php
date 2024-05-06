<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleValidationRequest;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function __construct(Schedule $schedule)
    {
        $this->schedule=$schedule;
    }
    public function index()
    {
        return view('admin.schedules.index');
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(ScheduleValidationRequest $request)
    {
        $schedule=$request->validated();
        $this->schedule->create($schedule);
        return redirect()->route('schedule.index');
    }

    public function show(ScheduleController $scheduleController)
    {

    }

    public function edit(ScheduleController $scheduleController)
    {
        return view('admin.schedules.edit');
    }

    public function update(Request $request, ScheduleController $scheduleController)
    {
        //
    }

    public function destroy(ScheduleController $scheduleController)
    {
        //
    }
}
