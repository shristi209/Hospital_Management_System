<?php
namespace App\Helpers;
use App\Models\Country;

class CountryHelper
{
    public function __construct(Country $country)
    {
        $this->country=$country;
    }
    public function dropdown(){
        $country=$this->country->orderBy('id', 'desc') -> pluck('country_name', 'id')->toArray();
        $country = ['Nepal' => 'Nepal'] + $country;
        return $country;
    }
}
