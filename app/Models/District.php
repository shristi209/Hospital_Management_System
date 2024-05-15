<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    protected $table='districts';
    protected $fillable=['province_id','district_code', 'nep_district_name', 'eng_district_name', 'deleted_at'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'district_id', 'id');
    }
}
