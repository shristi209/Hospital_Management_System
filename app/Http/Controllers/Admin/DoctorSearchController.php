<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;

use App\Http\Controllers\Controller;

class DoctorSearchController extends Controller
{
    public function departmentBasedDoctor(Request $request)
    {
        $dept_id=$request->input('department_name');
        $doc_id=$request->input('full_name');

        $department=Department::with('doctor')->find($dept_id);
        $doctor=Doctor::find($doc_id);
        // dd($department->doctor);
        // dd($doctor);
        $doctors=[];
        if ($department) {
            $doctors = $department->doctor;
        }

        if($doc_id){
            $doctors=Doctor::find($doc_id);
        }



        return view('admin.doctors.search', compact('doctors'));
    }
}
