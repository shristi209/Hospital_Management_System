<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorValidationRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\DB;
use Exception;

class DoctorController extends Controller
{
    public function __construct(Doctor $doctor)
    {
        $this->doctor=$doctor;
    }

    public function index()
    {
        $doctors=$this->doctor->all();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(DoctorValidationRequest $request)
    {
        dd($request);
            $data = $request->validated();

            $doctor = $this->doctor->create($data);

                foreach ($request->institute_name as $key => $value) {
                    DoctorEducation::create([
                        'doctor_id' => $doctor->id,
                        'institute_name' => $request->institute_name[$key],
                        'specialization' => $request->specialization[$key],
                        'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                        'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                    ]);
                }
                foreach ($request->organization_name as $key => $value) {
                    DoctorExperience::create([
                        'doctor_id' => $doctor->id,
                        'organization_name' => $request->organization_name[$key],
                        'org_start_bs' => $request->org_start_bs[$key],
                        'org_start_ad' => $request->org_start_ad[$key],
                        'org_end_bs' => $request->org_end_bs[$key],
                        'org_end_ad' => $request->org_end_ad[$key],
                        'description' => $request->description[$key],
                    ]);
                }
                return redirect()->route('doctor.index');
    }

    public function show( $id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $educations = DoctorEducation::findOrFail($id)->get();
        $experiences = DoctorExperience::findOrFail($id)->get();
        return view('admin.doctors.show',compact('doctor', 'educations', 'experiences'));
    }


    public function edit( $id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $countries=Country::all();
        $provinces=Province::all();
        $districts=District::all();
        $municipalities=Municipality::all();

        $educations = DoctorEducation::where('doctor_id', $id)->get();
        $experiences = DoctorExperience::where('doctor_id', $id)->get();
        return view('admin.doctors.edit', compact('doctor', 'educations', 'experiences', 'countries', 'provinces', 'districts', 'municipalities'));
    }


    public function update(DoctorValidationRequest $request,  $id)
    {

        $data=$request->validated();
        $doctor=$this->doctor->findOrFail($id);
        $doctor -> update($data);

        foreach ($request->institute_name as $key => $value) {
            DoctorEducation::updateOrCreate([
                'doctor_id' => $doctor->id,
                'institute_name' => $request->institute_name[$key]],
                ['specialization' => $request->specialization[$key],
                'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
            ]);
        }
        foreach ($request->organization_name as $key => $value) {
            DoctorExperience::updateOrCreate([
                'doctor_id' => $doctor->id],
                ['organization_name' => $request->organization_name[$key],
                'org_start_bs' => $request->org_start_bs[$key],
                'org_start_ad' => $request->org_start_ad[$key],
                'org_end_bs' => $request->org_end_bs[$key],
                'org_end_ad' => $request->org_end_ad[$key],
                'description' => $request->description[$key],
            ]);
        }
        return redirect()->route('doctor.index');
    }

    public function destroy(string $id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $doctor->delete();
        $doctor->education()->delete();
        $doctor->experience()->delete();

        return redirect()->route('doctor.index');
    }
}
