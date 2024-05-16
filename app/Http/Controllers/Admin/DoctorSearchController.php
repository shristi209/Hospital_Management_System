<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

use App\Models\DoctorEducation;
use App\Http\Controllers\Controller;

class DoctorSearchController extends Controller
{
    protected $doctoreducation, $department, $doctor;

    public function __construct(Doctor $doctor, DoctorEducation $doctoreducation, Department $department)
    {
        $this->doctoreducation = $doctoreducation;
        $this->department = $department;
        $this->doctor = $doctor;
    }

    public function searchDoctor(Request $request)
    {

        $query = $this->doctor->with('education', 'experience');

        if ($request->input('department_name')) {
            $dept_id = $request->input('department_name');
            $query->where('department_id', $dept_id);
        }

        if ($request->input('specialization')) {
            $specialization = $request->input('specialization');
            $query->whereHas('education',
            function ($educations) use ($specialization)
            {
                $educations->where('specialization', $specialization);
            });
        }

        if ($request->input('search')) {
            $searchData = $request->input('search');
            $query->where(function ($query) use ($searchData) {
                $query->where('first_name', 'LIKE', "%$searchData%")
                    ->orWhere('middle_name', 'LIKE', "%$searchData%")
                    ->orWhere('last_name', 'LIKE', "%$searchData%");
            });
        }

        $doctors = $query->get();

        return view('admin.doctors.index', compact('doctors'));
    }


    public function fetchDepartmentBasedSpecialization(Request $request, $id)
    {
        $department = $this->department->with('doctor')->find($id);
        $specializations = [];
        if ($department) {
            $doctors = $department->doctor;

            foreach ($doctors as $doctor) {
                $educations = $doctor->education;

                if ($educations) {
                    foreach ($educations as $education) {
                        $specializations[] = $education->specialization;
                    }
                }
            }
        }
        return response()->json(['specializations' => $specializations]);
    }
}




        // if ($request->input('specialization')) {
        //     $specialization = $request->input('specialization');
        //     foreach ($query as $doctor)
        //     {
        //         $educations=$doctor->education;
        //         foreach($educations as $education)
        //         {
        //             dd($education->where('specialization',$specialization)->get());
        //             $query=$education->where('specialization',$specialization);

        //         }
        //     }
        // }
