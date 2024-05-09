<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $table='doctors';
    protected $fillable=['department_id','photo', 'first_name','middle_name', 'last_name', 'licence_no','country_id', 'province_id', 'district_id', 'municipality_id', 'street', 'gender', 'phone_num', 'dob_ad', 'dob_bs', 'deleted_at','temp_country_id', 'temp_province_id', 'temp_district_id', 'temp_municipality_id', 'temp_street' ];

    public function user(){
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function education()
    {
        return $this->hasMany(DoctorEducation::class, 'doctor_id');
    }
    public function experience()
    {
        return $this->hasMany(DoctorExperience::class, 'doctor_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function municipality()
    {
        return $this->belongsTo(Municipality::class,'municipality_id','id');
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class,'doctor_id','id');
    }


}
