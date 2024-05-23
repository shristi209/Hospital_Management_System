<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $table='pages';
    protected $fillable=['slug','title', 'content', 'image'];
    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
   
}



























// public function setEnglishTitleAttribute($value)
// {
//     $title = json_decode($this->attributes['title'], true) ?? [];
//     $title['en'] = $value;
//     $this->attributes['title'] = json_encode($title);
// }

// public function setNepaliTitleAttribute($value)
// {
//     $title = json_decode($this->attributes['title'], true) ?? [];
//     $title['ne'] = $value;
//     $this->attributes['title'] = json_encode($title);
// }

// public function setEnglishContentAttribute($value)
// {
//     $content = json_decode($this->attributes['content'], true) ?? [];
//     $content['en'] = $value;
//     $this->attributes['content'] = json_encode($content);
// }

// public function setNepaliContentAttribute($value)
// {
//     $content = json_decode($this->attributes['content'], true) ?? [];
//     $content['ne'] = $value;
//     $this->attributes['content'] = json_encode($content);
// }
