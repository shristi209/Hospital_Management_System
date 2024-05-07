<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorValidationRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    protected $doctor;
    protected $doctorEducation;
    protected $doctorExperience;

    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user=$user;
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
        // dd($request);
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $doctor = $this->doctor->create($data);
            $role_id=2;
            $this->user->create([
                'username'=>$doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
                'role_id'=> $role_id,
                'doctor_id'=>$doctor->id,
            ]);
                    // dd($request);

                foreach ($request->institute_name as $key => $value) {
                    $this->doctorEducation->create([
                        'doctor_id' => $doctor->id,
                        'institute_name' => $request->institute_name[$key],
                        'specialization' => $request->specialization[$key],
                        'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                        'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                        'education_level'=>$request->education_level[$key],
                    ]);
                }
                foreach ($request->organization_name as $key => $value) {
                    $this->doctorExperience->create([
                        'doctor_id' => $doctor->id,
                        'organization_name' => $request->organization_name[$key],
                        'org_start_bs' => $request->org_start_bs[$key],
                        'org_start_ad' => $request->org_start_ad[$key],
                        'org_end_bs' => $request->org_end_bs[$key],
                        'org_end_ad' => $request->org_end_ad[$key],
                        'description' => $request->description[$key],
                    ]);

                }
                DB::commit();
                return redirect()->route('doctor.index');
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
    }

    public function show( $id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $educations = $this->doctorEducation->where('doctor_id', $id)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $id)->get();
        return view('admin.doctors.show', compact('doctor', 'educations', 'experiences'));
    }


    public function edit($id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $districts=District::all();
        $municipalities=Municipality::all();

        $educations = $this->doctorEducation->where('doctor_id', $id)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $id)->get();
        return view('admin.doctors.edit', compact('doctor', 'educations', 'experiences', 'districts', 'municipalities'));
    }

    public function update(DoctorValidationRequest $request,  $id)
    {
        try {
            DB::beginTransaction();
            $data=$request->validated();
            $doctor=$this->doctor->findOrFail($id);
            $doctor -> update($data);

            foreach ($request->institute_name as $key => $value) {
                $this->doctorEducation->updateOrCreate([
                    'doctor_id' => $doctor->id,
                    'institute_name' => $request->institute_name[$key]],
                    ['specialization' => $request->specialization[$key],
                    'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                    'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                ]);
            }
            foreach ($request->organization_name as $key => $value) {
                $this->doctorExperience->updateOrCreate([
                    'doctor_id' => $doctor->id,
                    'organization_name' => $request->organization_name[$key]],
                    ['org_start_bs' => $request->org_start_bs[$key],
                    'org_start_ad' => $request->org_start_ad[$key],
                    'org_end_bs' => $request->org_end_bs[$key],
                    'org_end_ad' => $request->org_end_ad[$key],
                    'description' => $request->description[$key],
                ]);
            }
            DB::commit();
            return redirect()->route('doctor.index');
        }catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }

    }

    public function destroy( $id)
    {
        $doctor=$this->doctor->findOrFail($id);
        $doctor->delete();
        $doctor->education()->delete();
        $doctor->experience()->delete();

        return redirect()->route('doctor.index');
    }
}
