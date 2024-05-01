<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Department extends Model
{
    use SoftDeletes;
    protected $table='departments';
    protected $fillable=['department_name','description','department_code', 'deleted_at'];
}
