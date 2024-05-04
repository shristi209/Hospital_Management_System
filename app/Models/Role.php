<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    Use SoftDeletes;
    protected $tables='roles';
    protected $fillable=['roles_id', 'name', 'deleted_at'];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
