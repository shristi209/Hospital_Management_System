<?php
namespace App\Helpers;
use App\Models\DoctorEducation;

class SpecializationHelpers
{
    protected $doctoreducation;
    public function __construct(DoctorEducation $doctoreducation)
    {
        $this->doctoreducation=$doctoreducation;
    }
    public function dropdown()
    {
        return $this->doctoreducation->orderBy('id', 'desc')->distinct()->pluck('specialization', 'specialization')->toArray();
    }
}
