<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{
    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user=$user;
    }

    public function getProfile(){
        $user = Auth::user();
        $doctorId=$user->doctor_id;
        $doctor=$this->doctor->find($doctorId);
        $educations = $this->doctorEducation->where('doctor_id', $doctorId)->get();
        $experiences =  $this->doctorExperience->where('doctor_id', $doctorId)->get();
        return view('doctor.profile.show', compact('user','doctor', 'educations', 'experiences'));
    }

    public function edit(){
        $user = Auth::user();
        $doctorId=$user->doctor_id;
        $doctor=$this->doctor->find($doctorId);
        return view('doctor.profile.edit', compact('doctorId', 'doctor'));
    }

    public function update(){

    }

}
