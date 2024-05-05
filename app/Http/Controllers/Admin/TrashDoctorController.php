<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\view\view;

class TrashDoctorController extends Controller
{
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
        $doctor=$this->doctor->where('id', $id);
        $doctor->restore();
        $doctor->education()->withTrashed()->restore();
        $doctor->experience()->withTrashed()->restore();
        return redirect()->route('doctor.index');
    }

        public function delete($id)
    {
        $this->doctor->where('id', $id)->forceDelete();
        $doctor->education()->forceDelete();
        $doctor->experience()->forceDelete();
        return redirect()->route('doctortrash');
    }
}
