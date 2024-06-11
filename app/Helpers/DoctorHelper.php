<?php
namespace App\Helpers;
use App\Models\Doctor;


class DoctorHelper
{
    protected $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor=$doctor;
    }
    public function dropdown()
    {
        $doctors = $this->doctor->orderBy('id', 'desc')->selectRaw("CONCAT(first_name, ' ', COALESCE(middle_name, ''), ' ', last_name) as full_name, id")->pluck('full_name', 'id');
        return $doctors;
    }
    public function fetchDoctors()
    {
        $doctors=$this->doctor->get();
        return $doctors;
    }
}



