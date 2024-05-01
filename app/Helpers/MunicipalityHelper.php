<?php
namespace App\Helpers;
use App\Models\Municipality;

class MunicipalityHelper
{
    public function __construct(Municipality $municipality){
        $this->municipality=$municipality;
    }
    public function dropdown()
    {
        $municipality=$this->municipality->orderby('id', 'desc')->pluck('nep_municipality_name', 'id');
        return $municipality;
    }
}
