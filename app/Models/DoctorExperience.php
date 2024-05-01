<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorExperience extends Model
{
    use SoftDeletes;
    protected $table='doctor_experiences';
    protected $fillable=['department_id','first_name','middle_name', 'last_name', 'country_id', 'provice_id', 'district_id', 'municipality_id', 'street', 'gender', 'phone_num', 'dob_ad', 'dob_bs'];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
