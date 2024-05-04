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
        $countries = $this->country->orderBy('id', 'desc')->pluck('country_name', 'id')->toArray();
        return $countries;
    }
}
