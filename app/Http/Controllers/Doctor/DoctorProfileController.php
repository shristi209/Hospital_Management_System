<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function getProfile(){
        return view('doctor.profile');
    }
}
