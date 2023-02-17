<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function listDistrict() {
        $listDistrict = District::orderBy('id', 'desc')->get();
    
        return $listDistrict;
    }

    public function addDistrict(DistrictRequest $request) {

        // return $request->all();

        $addDistrict = new District();
        $addDistrict->name = $request->name;
        $addDistrict->province_id = $request['province_id'];
        $addDistrict->save();

        return $addDistrict;
    }


    public function editDistrict(DistrictRequest $request, $id) {
        return $request->all();
        
        $editDistrict = District::find($id);
        $editDistrict->name = $request->name;
        $editDistrict->province_id = $request['province_id'];
        $editDistrict->save();

        return $editDistrict;
    }

    public function deleteDistrict(DistrictRequest $request) {
        
        $deleteDistrict = District::find($request['id']);
        $deleteDistrict->delete();

        return $deleteDistrict;
    }
}
