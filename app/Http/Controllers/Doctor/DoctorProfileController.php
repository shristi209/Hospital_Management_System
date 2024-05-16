<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorProfileRequest;
use App\Http\Requests\DoctorEducationRequest;
use App\Http\Requests\DoctorExperienceRequest;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\District;

use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{
    protected $doctor, $doctorEducation, $doctorExperience, $user, $district, $municipality, $province, $country;

    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user,Country $country, Province $province, District $district, Municipality $municipality)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user=$user;
        $this->district=$district;
        $this->province=$province;
        $this->country=$country;
        $this->municipality=$municipality;
    }

    public function getProfile(){
        $user = Auth::user();
        $doctorId=$user->doctor_id;
        $doctor=$this->doctor->find($doctorId);

        $doctor_temp_country = $this->country->where('id', $doctor->temp_country_id)->first();
        $doctor_temp_province = $this->province->where('id', $doctor->temp_province_id)->first();
        $doctor_temp_district = $this->district->where('id', $doctor->temp_district_id)->first();
        $doctor_temp_municipality = $this->municipality->where('id', $doctor->temp_municipality_id)->first();

        $educations = $this->doctorEducation->where('doctor_id', $doctorId)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $doctorId)->get();

        return view('doctor.profile.show', compact('user','doctor', 'educations', 'experiences', 'doctor_temp_country', 'doctor_temp_province', 'doctor_temp_district', 'doctor_temp_municipality'));
    }

    public function edit(){
        $user = Auth::user();
        $doctorId=$user->doctor_id;
        $doctor=$this->doctor->find($doctorId);
        $districts=$this->district-> all();
        $municipalities=$this->municipality->all();
        return view('doctor.profile.edit', compact('doctorId', 'doctor', 'districts', 'municipalities'));
    }

    public function update(DoctorProfileRequest $request, $id)
    {
        $data=$request->validated();
        $doctor=$this->doctor->findOrFail($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            if ($doctor->photo) {
                $previousImagePath = public_path($doctor->photo);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $file->move(public_path('backend/img/doctors'), $fileName);
            $data['photo'] = '/backend/img/doctors'.'/'.$fileName;
        }

        $doctor -> update($data);
        return redirect()->route('doctorprofile');
    }


    public function editEducation()
    {
        $user = Auth::user();
        $doctorId=$user->doctor_id;
        // dd($this->doctorEducation->where('doctor_id',$doctorId)->get());
        $doctor=$this->doctor->with('education')->find($doctorId);
        $educations=$doctor->education;
        return view('doctor.profile.editeducation', compact('doctorId','educations'));
    }

    public function updateEducation(DoctorEducationRequest $request, $id)
    {
        // dd($request);
        $data=$request->validated();
        $user = Auth::user();
        $doctorId=$user->doctor_id;
  // dd($this->doctorEducation->where('doctor_id',$doctorId)->get());
        foreach($request->institute_name as $key=>$value){
            $this->doctorEducation->updateOrCreate([
                'doctor_id'=>  $doctorId,

            ],
            [
                'education_level'=>$request->education_level[$key],
                'institute_name'=> $request->institute_name[$key],
                'specialization'=> $request->specialization[$key],
                'graduation_year_start_bs'=> $request->graduation_year_start_bs[$key],
                'graduation_year_start_ad'=> $request->graduation_year_start_ad[$key],
            ]);
        }
        return redirect()->route('doctorprofile');
    }
    public function editExperience()
    {
        $user = Auth::user();
        $doctorId=$user->doctor_id;

        $doctor=$this->doctor->with('experience')->find($doctorId);
        $experiences=$doctor->experience;
        return view('doctor.profile.editexperience', compact('doctorId','experiences'));
    }
    public function updateExperience(DoctorExperienceRequest $request, $id)
    {
        // dd($request);
        $data=$request->validated();
        $user = Auth::user();
        $doctorId=$user->doctor_id;

        foreach($request->organization_name as $key=>$value){
            $this->doctorExperience->updateOrCreate([
                'doctor_id'=>  $doctorId,
                'organization_name'=> $request->organization_name[$key]],
                ['org_start_bs' => $request->org_start_bs[$key],
                    'org_start_ad' => $request->org_start_ad[$key],
                    'org_end_bs' => $request->org_end_bs[$key],
                    'org_end_ad' => $request->org_end_ad[$key],
                    'description' => $request->description[$key],
            ]);
        }

        return redirect()->route('doctorprofile');

    }
}
