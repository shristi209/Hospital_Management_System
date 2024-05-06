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
        $schedules=$this->schedule->all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(ScheduleValidationRequest $request)
    {
        $data=$request->validated();
        $this->schedule->create($data);
        return redirect()->route('schedule.index');
    }

    public function show($id)
    {

    }

    public function edit( $id)
    {
        $schedule=$this->schedule->findOrFail($id);
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(ScheduleValidationRequest $request,  $id)
    {
        $data = $request->validated();
        $schedule = $this->schedule->findOrFail($id);
        $schedule->update($data);
        return redirect()->route('schedule.index');
    }

    public function destroy( $id)
    {
        $schedule = $this->schedule->findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
