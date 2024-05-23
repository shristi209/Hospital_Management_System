<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorProfileRequest;

use App\Http\Requests\DoctorEducationRequest;
use App\Http\Requests\DoctorExperienceRequest;

class DoctorProfileController extends Controller
{
    protected $doctor, $doctorEducation, $doctorExperience, $user, $district, $municipality, $province, $country;

    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user, Country $country, Province $province, District $district, Municipality $municipality)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user = $user;
        $this->district = $district;
        $this->province = $province;
        $this->country = $country;
        $this->municipality = $municipality;
    }

    public function getProfile()
    {
        $user = Auth::user();
        $doctorId = $user->doctor_id;
        $doctor = $this->doctor->find($doctorId);

        $doctor_temp_country = $this->country->where('id', $doctor->temp_country_id)->first();
        $doctor_temp_province = $this->province->where('id', $doctor->temp_province_id)->first();
        $doctor_temp_district = $this->district->where('id', $doctor->temp_district_id)->first();
        $doctor_temp_municipality = $this->municipality->where('id', $doctor->temp_municipality_id)->first();

        $educations = $this->doctorEducation->where('doctor_id', $doctorId)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $doctorId)->get();

        return view('doctor.profile.show', compact('user', 'doctor', 'educations', 'experiences', 'doctor_temp_country', 'doctor_temp_province', 'doctor_temp_district', 'doctor_temp_municipality'));
    }

    public function edit()
    {
        $user = Auth::user();
        $doctorId = $user->doctor_id;
        $doctor = $this->doctor->find($doctorId);
        $districts = $this->district->all();
        $municipalities = $this->municipality->all();
        return view('doctor.profile.edit', compact('doctorId', 'doctor', 'districts', 'municipalities'));
    }

    public function update(DoctorProfileRequest $request, $id)
    {
        $data = $request->validated();
        $doctor = $this->doctor->findOrFail($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            if ($doctor->photo) {
                $previousImagePath = public_path($doctor->photo);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $file->move(public_path('backend/img/doctors'), $fileName);
            $data['photo'] = '/backend/img/doctors' . '/' . $fileName;
        }

        $doctor->update($data);
        return redirect()->route('doctorprofile');
    }


    public function createEducation()
    {
        return view('doctor.profile.createeducation');
    }

    public function storeEducation(DoctorEducationRequest $request)
    {
        $user = Auth::user();
        $doctorId = $user->doctor_id;
        if ($request->has('institute_name')) {
            foreach ($request->institute_name as $key => $value) {
                $this->doctorEducation->create([
                    'doctor_id' => $doctorId,
                    'institute_name' => $request->institute_name[$key],
                    'education_level' => $request->education_level[$key],
                    'specialization' => $request->specialization[$key],
                    'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                    'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                    'education_level' => $request->education_level[$key],
                ]);
            }
        }
        return redirect()->route('doctorprofile')->with('message', 'Successfully Created!!!');
    }

    public function editEducation()
    {
        $user = Auth::user();
        $doctorId = $user->doctor_id;
        $doctor = $this->doctor->with('education')->find($doctorId);
        $educations = $doctor->education;
        return view('doctor.profile.editeducation', compact('doctorId', 'educations'));
    }

        public function updateEducation(DoctorEducationRequest $request, $doctorId)
    {
        $data = $request->all();
// dd($data);
        if (isset($data['education_id']))
        {
            foreach ($data['education_id'] as $index => $educationId)
            {
                if (isset($data['delete_education'][$index]) && $data['delete_education'][$index] == 1)
                {
                    $this->doctorEducation->where('id', $educationId)->delete();
                }
                else
                {
                    $education = $this->doctorEducation->find($educationId);
                    $education->education_level = $data['education_level'][$index];
                    $education->institute_name = $data['institute_name'][$index];
                    $education->specialization = $data['specialization'][$index];
                    $education->graduation_year_start_bs = $data['graduation_year_start_bs'][$index];
                    $education->graduation_year_start_ad = $data['graduation_year_start_ad'][$index];
                    $education->save();
                }
            }
        }

        if (isset($data['delete_education']) && in_array(1, $data['delete_education']))
        {
            return redirect()->route('editeducation')->with('success', 'Education details updated successfully.');
        }
        else
        {
            return redirect()->route('doctorprofile')->with('success', 'Education details updated successfully.');
        }
    }


    public function deleteEducation($id)
    {
        $education = $this->doctorEducation->findOrFail($id);
        $education->delete();
        return redirect()->route('editeducation')->with('message', 'Education record deleted successfully.');
    }


    public function createExperience()
    {
        return view('doctor.profile.createexperience');
    }

    public function storeExperience(DoctorExperienceRequest $request)
    {
        // dd($request);
        $user = Auth::user();
        $doctorId = $user->doctor_id;
        if ($request->has('organization_name')) {
            foreach ($request->organization_name as $key => $value) {
                $this->doctorExperience->create([
                    'doctor_id' => $doctorId,
                    'organization_name' => $request->organization_name[$key],
                    'org_start_bs' => $request->org_start_bs[$key],
                    'org_start_ad' => $request->org_start_ad[$key],
                    'org_end_bs' => $request->org_end_bs[$key],
                    'org_end_ad' => $request->org_end_ad[$key],
                    'description' => $request->description[$key],
                ]);
            }
        }
        return redirect()->route('doctorprofile')->with('message', 'Successfully Created!!!');
    }
    public function editExperience()
    {
        $user = Auth::user();
        $doctorId = $user->doctor_id;

        $doctor = $this->doctor->with('experience')->find($doctorId);
        $experiences = $doctor->experience;
        return view('doctor.profile.editexperience', compact('doctorId', 'experiences'));
    }
    public function updateExperience(DoctorExperienceRequest $request)
    {

        $data = $request->validated();

        $user = Auth::user();
        $doctorId = $user->doctor_id;

        $existingRecords = $this->doctorExperience->where('doctor_id', $doctorId)->get();

        foreach ($data['organization_name'] as $key => $value) {
            $experience = $existingRecords->get($key);
            if ($experience) {
                $experience->update([
                    'organization_name' => $data['organization_name'][$key],
                    'org_start_bs' => $data['org_start_bs'][$key],
                    'org_start_ad' => $data['org_start_ad'][$key],
                    'org_end_bs' => $data['org_end_bs'][$key],
                    'org_end_ad' => $data['org_end_ad'][$key],
                    'description' => $data['description'][$key],
                ]);
            }
        }

        return redirect()->route('doctorprofile')->with('message', 'Successfully Updated!!!');
    }

    public function deleteExperience($id)
    {
        $doctorexperience = $this->doctorExperience->findOrFail($id);
        $doctorexperience->delete();

        return redirect()->route('editeducation')->with('message', 'Education record deleted successfully.');

    }
}
