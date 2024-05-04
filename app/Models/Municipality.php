<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use SoftDeletes;
    protected $table='municipalities';
    protected $fillable=['municipality_type_id', 'district_id', 'municipality_code', 'nep_municipality_name', 'deleted_at'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function municipality_type(){
        return $this->belongsTo(MunicipalityType::class, 'municipality_type_id', 'id');
    }
    public function doctor(){
        return $this->hasOne(Doctor::clas, 'municipality_id', 'id');
    }
}
