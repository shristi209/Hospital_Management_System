<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorValidationRequest;
use App\Models\Doctor;
use App\Models\User;
use App\Models\District;
use App\Models\Municipality;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    protected $doctor, $doctorEducation, $doctorExperience, $user, $district, $municipality;
    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user, District $district, Municipality $municipality)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user = $user;
        $this->district = $district;
        $this->municipality = $municipality;
        $this->middleware('Permission:edit doctor', ['only' => ['edit', 'update']]);
        $this->middleware('Permission:create doctor', ['only' => ['create', 'store']]);
        $this->middleware('Permission:view doctor', ['only' => ['show']]);
        $this->middleware('Permission:delete doctor', ['only' => ['destroy']]);
    }

    public function index()
    {
        $doctors = $this->doctor->orderBy('created_at', 'desc')->simplePaginate(10);
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

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/img/doctors'), $fileName);
            } else {
                return back()->with('fail_message', 'Please upload a profile picture!!!');
            }
            $data['photo'] = '/backend/img/doctors' . '/' . $fileName;

            $doctor = $this->doctor->create($data);
            $role_id = 2;
            $this->user->create([
                'username' => $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $role_id,
                'doctor_id' => $doctor->id,
            ]);
            // dd($request);
            if ($request->has('institute_name')) {
                foreach ($request->institute_name as $key => $value) {
                    $this->doctorEducation->create([
                        'doctor_id' => $doctor->id,
                        'institute_name' => $request->institute_name[$key],
                        'education_level' => $request->education_level[$key],
                        'specialization' => $request->specialization[$key],
                        'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                        'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                        'education_level' => $request->education_level[$key],
                    ]);
                }
            }
            if ($request->has('organization_name')) {
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
            }
            DB::commit();
            return redirect()->route('doctor.index')->with('message', 'Successfully Created!!!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!!!');
        }
    }

    public function show($id)
    {
        $doctor = $this->doctor->findOrFail($id);
        $educations = $this->doctorEducation->where('doctor_id', $id)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $id)->get();
        return view('admin.doctors.show', compact('doctor', 'educations', 'experiences'));
    }

    public function edit($id)
    {
        $doctor = $this->doctor->findOrFail($id);
        $districts = $this->district->all();
        $municipalities = $this->municipality->all();

        $educations = $this->doctorEducation->where('doctor_id', $id)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $id)->get();
        return view('admin.doctors.edit', compact('doctor', 'educations', 'experiences', 'districts', 'municipalities'));
    }

    public function update(DoctorValidationRequest $request,  $id)
    {
        try {
            DB::beginTransaction();
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

            if ($request->has('institute_name')) {
                foreach ($request->institute_name as $key => $value) {
                    $this->doctorEducation->updateOrCreate(
                        [
                            'doctor_id' => $doctor->id,
                            'institute_name' => $request->institute_name[$key]
                        ],
                        [
                            'specialization' => $request->specialization[$key],
                            'graduation_year_start_bs' => $request->graduation_year_start_bs[$key],
                            'graduation_year_start_ad' => $request->graduation_year_start_ad[$key],
                        ]
                    );
                }
            }
            if ($request->has('organization_name')) {
                foreach ($request->organization_name as $key => $value) {
                    $this->doctorExperience->updateOrCreate(
                        [
                            'doctor_id' => $doctor->id,
                            'organization_name' => $request->organization_name[$key]
                        ],
                        [
                            'org_start_bs' => $request->org_start_bs[$key],
                            'org_start_ad' => $request->org_start_ad[$key],
                            'org_end_bs' => $request->org_end_bs[$key],
                            'org_end_ad' => $request->org_end_ad[$key],
                            'description' => $request->description[$key],
                        ]
                    );
                }
            }
            DB::commit();
            return redirect()->route('doctor.index')->with('message', 'Successfully Updated!!!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!!!');
        }
    }

    public function destroy($id)
    {
        $doctor = $this->doctor->findOrFail($id);
        $doctor->delete();
        $doctor->education()->delete();
        $doctor->experience()->delete();

        return redirect()->route('doctor.index');
    }
}
