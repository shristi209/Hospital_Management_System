<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    protected $fillable=['nepali_name','english_name', 'deleted_at'];

    public function district(){
        return $this->hasMany(District::class, 'province_id');
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class,'province_id','id');
    }

}
