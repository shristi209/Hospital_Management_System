<?php

namespace App\Http\Controllers\Website;

use Exception;
use  App\Models\Doctor;
use  App\Models\Patient;
use  App\Models\Schedule;
use  App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\AppointmentBookedMail;
use App\Mail\AppointmentStatusMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\AppointmentBookedNotification;
use App\Http\Requests\AppointmentPatientValidationRequest;

class FormAppointmentController extends Controller
{
    protected $patient, $doctor, $schedule, $appointment;
    public function __construct(Patient $patient, Doctor $doctor, Schedule $schedule, Appointment $appointment){
        $this->patient=$patient;
        $this->schedule=$schedule;
        $this->appointment=$appointment;
        $this->doctor=$doctor;
    }
    public function index()
    {

    }

    public function create()
    {

    }

    public function show( $schedule_id)
    {
        $schedule = $this->schedule->findOrFail($schedule_id);
        return view('website.appointment.form', compact('schedule'));
    }

    public function store(AppointmentPatientValidationRequest $request)
    {
        try {
            DB::beginTransaction();

            $data=$request->validated();
            if ($request->medical_history) {

                $file = $request->file('medical_history');

                $fileName = time().'.'.$file->getClientOriginalExtension();

                $filePath = 'frontend/medical-history/';
                $file->move(public_path($filePath), $fileName);
                $data['medical_history'] = $filePath . $fileName;
            }
            $patient=$this->patient->create($data);

            $schedule =  $this->schedule->findOrFail($request->schedule_id);


            $doctor_id =$schedule->doctor->id;
            $data['doctor_id']=$doctor_id;
            $data['patient_id']=$patient->id;
            $data['status'] = 'pending';

            $this->appointment->create($data);
            $patientEmail=$patient->email;

            $doctor = $this->doctor->find($doctor_id);
            $doctorEmail = $doctor->user->email;

            Mail::to($patientEmail)->send(new AppointmentStatusMail($schedule, $patient));

            $doctor->notify(new AppointmentBookedNotification($patient));

            Mail::to($doctorEmail)->send(new AppointmentBookedMail($patient));

            DB::commit();
            return redirect('/caresync')->with('message', 'Successfully Booked!!!');

        }catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

    }
    public function edit(string $id)
    {

    }

    public function appointment(Request $request,  $id)
    {
        dd($request);
    }

    public function destroy( $id)
    {
        //
    }
}
