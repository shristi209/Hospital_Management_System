<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentPatientValidationRequest;
use  App\Models\Patient;
use  App\Models\Schedule;
use  App\Models\Appointment;
use  App\Models\Doctor;

use App\Notifications\AppointmentBookedNotification;
use App\Mail\AppointmentBookedMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

            $doctor = $this->doctor->find($doctor_id);

            $doctor = $this->doctor->find($doctor_id);
            $doctorEmail = $doctor->user->email;

            $doctor->notify(new AppointmentBookedNotification());

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
