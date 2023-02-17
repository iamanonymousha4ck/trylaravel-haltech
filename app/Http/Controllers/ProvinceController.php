<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function listProvince() {
        // $listProvinces = Province::all();
        // $listProvinces = Province::orderBy('id', 'desc')->where('id', 2)->get();
        $listProvinces = Province::orderBy('id', 'desc')->get();

        return $listProvinces;
    }

    public function addProvince(ProvinceRequest $request) {

        $addProvince = new Province();
        $addProvince->name = $request->name;
        $addProvince->save();

        return $addProvince;
    }

    public function editProvince(ProvinceRequest $request, $id) {
        // return $request->all();
        
        $editProvince = Province::find($id);
        $editProvince->name = $request->name;
        $editProvince->save();

        return $editProvince;
    }

    public function deleteProvince(ProvinceRequest $request) {
        
        $deleteProvince = Province::find($request['id']);
        $deleteProvince->delete();

        return $deleteProvince;
    }
}
