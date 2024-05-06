<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $tables='schedules';
    protected $fillable=['doctor_id','schedule_date', 'start_time', 'end_time'];
}
