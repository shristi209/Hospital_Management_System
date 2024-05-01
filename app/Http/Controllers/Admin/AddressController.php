<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Helpers\ProvinceHelper;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;

class AddressController extends Controller
{
    public function fetchDistrict(Request $request, $id)
    {
        $data=District::where('province_id', $id)->get();
        return response()->json($data);
    }

    public function fetchMunicipality(Request $request, $id)
    {
        $data=Municipality::where('district_id',$id)->get();
        return response()->json($data);
    }

    public function addfetchDistrict(Request $request, $id)
    {
        $data=District::where('province_id', $id)->get();
        return response()->json($data);
    }

    public function addfetchMunicipality(Request $request, $id)
    {
        $data=Municipality::where('district_id',$id)->get();
        return response()->json($data);
    }
}
