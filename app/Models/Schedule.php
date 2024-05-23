<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


class Schedule extends Model
{
    use SoftDeletes;
    protected $tables='schedules';
    protected $fillable=['doctor_id','schedule_date', 'start_time', 'end_time','day', 'status','quota'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id','id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'schedule_id','id');
    }
    public function getTimeIntervals()
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);
        $scheduleDate=Carbon::parse($this->schedule_date)->format('Y-m-d, l');

        $intervals = [];

        while ($startTime->lt($endTime)) {
            $intervalEnd = $startTime->copy()->addMinutes(30);
            $intervals[] = [
                'schedule_date'=>$scheduleDate,
                'start_time' => $startTime->format('H:i A'),
                'end_time' => $intervalEnd->format('H:i A'),
            ];
            $startTime = $intervalEnd;
        }
        return $intervals;
    }
}
