<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    protected $doctor, $doctorEducation, $doctorExperience, $user, $appointment, $department;

    public function __construct(Doctor $doctor, DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $user, Appointment $appointment, Department $department)
    {
        $this->doctor = $doctor;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->user = $user;
        $this->appointment = $appointment;
        $this->department = $department;
    }
    public function index()
    {
        $totalDepartments = $this->department->count();
        $totalDoctors =  $this->doctor->count();
        $totalAppointments = $this->appointment->count();
        $totalUsers = $this->user->count();

        $patient = null;
        $approvedappointment = null;
        $pendingappointment = null;
        $schedule = null;
        $educations = null;
        $experiences = null;
        $appointments = null;

        if (Auth::user()->hasRole('doctor')) {
            $doctorId = Auth::user()->doctor_id;
            $doctor = $this->doctor->find($doctorId);

            $docappointments = $doctor->appointment;
            $patients = $docappointments->pluck('patient')->unique();

            $patient = $patients->count();
            $approvedappointment = $doctor->appointment->where('status', 'approved')->count();
            $pendingappointment = $doctor->appointment->where('status', 'pending')->count();
            $schedule = $doctor->schedule->count();

            $educations = $this->doctorEducation->where('doctor_id', $doctorId)->get();
            $experiences =  $this->doctorExperience->where('doctor_id', $doctorId)->get();
            $appointments = $doctor->appointment->where('status', 'pending');
        }

        $doctors = $this->doctor->with('appointment')->get();
        $doctor_name = [];
        $patient_count = [];

        foreach ($doctors as $doctor) {
            $patient_count[] = $doctor->appointment->count();
            $doctor_name[] = $doctor->first_name;
        }

        return view('admin.dashboard', compact('doctor_name','patient_count','totalDepartments', 'totalDoctors', 'totalAppointments', 'totalUsers', 'patient', 'approvedappointment', 'pendingappointment',  'schedule', 'educations', 'experiences', 'appointments'));
    }

    public function graphShow(Request $request)
    {
        if ($request->has(['department_id', 'start_date', 'end_date'])) {
            $doctors = $this->department->find($request->department_id)->doctor;
            $doctor_name = [];
            $patient_count = [];

            foreach ($doctors as $doctor) {
                $patient_count[] = $doctor->appointment()->whereBetween('created_at', [$request->start_date, $request->end_date])->count();
                $doctor_name[] = $doctor->first_name;
            }
        }

        return redirect()->route('dashboard')->with([
            'doctor_name' => $doctor_name,
            'patient_count' => $patient_count,
        ]);
    
    }
}
