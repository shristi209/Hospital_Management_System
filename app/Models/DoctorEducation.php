<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorEducation extends Model
{
    use SoftDeletes;
    protected $table='doctor_educations';
    protected $fillable=['doctor_id', 'institute_name', 'specialization', 'graduation_year_start_bs', 'graduation_year_start_ad', 'graduation_year_end_bs', 'graduation_year_end_ad'];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

}
