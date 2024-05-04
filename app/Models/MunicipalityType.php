<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalityType extends Model
{
    use SoftDeletes;
    protected $table='municipality_types';
    protected $fillable=['municipality_name', 'deleted_at'];

    public function municipality(){
        return $this->hasMany(Municipality::class, 'municipality_type_id');
    }

}
