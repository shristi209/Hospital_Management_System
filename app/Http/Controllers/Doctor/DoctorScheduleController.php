<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function __construct(Schedule $schedule)
    {
        $this->schedule=$schedule;
    }
    public function index()
    {
        return view('doctor.schedules.index');
    }

    public function create()
    {
        return view('doctor.schedules.create');

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit( $id)
    {

    }

    public function update(Request $request,  $id)
    {

    }

    public function destroy( $id)
    {

    }
}
