<?php
namespace App\Helpers;
use App\Models\Province;

class ProvinceHelper
{
    protected $province;
    public function __construct(Province $province){
        $this->province=$province;
    }
    public function dropdown(){
        $province=$this->province->orderBy('id', 'desc')->pluck('english_name', 'id') ;
        return $province;
    }
}
