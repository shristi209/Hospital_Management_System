<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $table='appointments';
    protected $fillable=['doctor_id','schedule_id', 'time_interval', 'patient_id', 'reason', 'status' ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
