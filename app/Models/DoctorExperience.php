<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorExperience extends Model
{
    use SoftDeletes;
    protected $table='doctor_experiences';
    protected $fillable=['doctor_id','organization_name','org_start_bs', 'org_start_ad', 'org_end_bs', 'org_end_ad', 'description'];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
