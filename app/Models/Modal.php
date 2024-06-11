<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Modal extends Model
{
    use SoftDeletes;
    protected $table='modals';
    protected $fillable=['name','slug','link'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
