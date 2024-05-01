<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable=['name','code', 'deleted_at'];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'country_id', 'id');
    }
}
