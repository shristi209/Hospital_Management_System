<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;


class TrashDoctorController extends Controller
{
    protected $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor=$doctor;
    }

    public function index(){
        $doctors=$this->doctor->onlyTrashed()->get();
        return view('admin.doctors.trash', compact('doctors'));
    }

    public function restore($id)
    {
        $doctor=$this->doctor->withTrashed()->findOrFail($id);
        $doctor->restore();
        $doctor->education()->withTrashed()->restore();
        $doctor->experience()->withTrashed()->restore();
        return redirect()->route('doctor.index');
    }

        public function delete($id)
    {
        $doctor = $this->doctor->withTrashed()->findOrFail($id);
        $doctor->education()->forceDelete();
        $doctor->experience()->forceDelete();
        $doctor->forceDelete();
        return redirect()->route('doctortrash');

    }
}
