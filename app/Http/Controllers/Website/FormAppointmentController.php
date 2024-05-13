<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Requests\AppointmentPatientValidationRequest;

class FormAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        dd('hello');

        return view('website.appointment.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentPatientValidationRequest $request)
    {
        $data=$request->validated();
        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        dd('show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd('hello');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }
}
