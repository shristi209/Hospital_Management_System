<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;

class DoctorController extends Controller
{
    public function __construct(Doctor $doctor){
        $this->doctor=$doctor;
    }

    public function index()
    {
        return view('admin.doctors.index');
    }

    public function create()
    {

        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        // $this->doctor::create($request->validated());
        // return redirect()->route('doctor.index');
    }


    public function show( $id)
    {
        //
    }


    public function edit( $id)
    {
        //
    }


    public function update(Request $request,  $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
