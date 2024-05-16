<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentStatusMail;


class DoctorAppointmentController extends Controller
{
    protected $appointment, $doctor;
    public function __construct(Appointment $appointment, Doctor $doctor)
    {
        $this->appointment=$appointment;
        $this->doctor=$doctor;
    }

    public function index()
    {
        $doctorId=Auth::user()->doctor_id;
        $doctor = $this->doctor->findOrFail($doctorId);
        $appointments=$doctor->appointment->all();
        return view('doctor.appointment.index', compact('appointments'));

    }

    public function statusUpdate(Request $request, $id)
    {
        $appointment = $this->appointment->findOrFail($id);
        $patient=$appointment->patient;
        $patientEmail=$patient->email;

        $appointment->update([
            'status' => $request->status,
        ]);

        Mail::to($patientEmail)->send(new AppointmentStatusMail($appointment));

        return redirect()->back();


    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $appointment=$this->appointment->find($id);
        $patient=$appointment->patient;

        return view('doctor.appointment.show', compact('patient'));
    }

    public function edit( $id)
    {

    }

    public function update(Request $request,  $id)
    {

    }

    public function destroy( $id)
    {

    }
}
