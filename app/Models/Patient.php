<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $table='patients';
    protected $fillable=['full_name','gender', 'date_of_birth','temporary_address', 'permanent_address', 'phone','email', 'parents_name', 'appointment_message', 'medical_history'];

    public function appointment()
    {
        return $this->hasOne(Appointment::class, 'patient_id', 'id');
    }
}
