<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    use SoftDeletes;
    protected $table='menus';
    protected $fillable=['menu','menu_type','page_id', 'modal_id','link','parent_id','display_order','status'];

    protected $casts=[
        'menu'=>'json'
    ];



    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('display_order');
    }
}


