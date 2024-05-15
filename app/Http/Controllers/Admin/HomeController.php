<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user,Appointment $appointment, Department $department)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user=$user;
        $this->appointment=$appointment;
        $this->department=$department;

    }
        public function index()
    {
        $totalDepartments = $this->department->count();
        $totalDoctors =  $this->doctor->count();
        $totalAppointments = $this->appointment->count();
        $totalUsers = $this->user->count();
        
        $patient = null;
        $appointment = null;
        $schedule = null;
        $educations=null;
        $experiences=null;


        if (Auth::user()->role_id == 2) {
            $doctorId = Auth::user()->doctor_id;
            $doctor = $this->doctor->find($doctorId);
            $appointments = $doctor->appointment;
            $patients = $appointments->pluck('patient')->unique();
            $patient = $patients->count();
            $appointment = $doctor->appointment->count();
            $schedule = $doctor->schedule->count();

            $educations = $this->doctorEducation->where('doctor_id', $doctorId)->get();
            $experiences =  $this->doctorExperience->where('doctor_id', $doctorId)->get();
        }

    return view('admin.dashboard', compact('totalDepartments', 'totalDoctors', 'totalAppointments', 'totalUsers', 'patient', 'appointment', 'schedule', 'educations', 'experiences'));
    }

    
}
