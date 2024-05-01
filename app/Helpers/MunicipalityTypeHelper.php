<?php
namespace App\Helpers;
use App\Models\MunicipalityType;

class MunicipalityTypeHelper
{
    public function __construct(MunicipalityType $municipalitytype){
        $this->municipalitytype=$municipalitytype;
    }
    public function dropdown()
    {
        $municipalitytype=$this->municipalitytype->orderby('id', 'desc')->pluck('municipality_name', 'id');
        return $municipalitytype;
    }
}
