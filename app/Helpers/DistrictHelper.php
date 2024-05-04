<?php
namespace App\Helpers;
use App\Models\District;
use App\Models\Province;

class DistrictHelper
{
    public function fetchDistricts($province)
    {
        $districts = District::where('province_id', $province)->pluck('name', 'id');
        return response()->json(['districts' => $districts]);
    }

}
