<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function listDistricts() {
        // return 'Pass';

        // relation table
        // $listDistricts = District::select(
        //     'districts.*',
        //     'provinces.name as province_name'
        // )
        // ->join('provinces', 'provinces.id', '=', 'districts.province_id')
        // ->orderBy('id', 'desc')->get();

        // relation model
        $listDistricts = District::orderBy('id', 'desc')->get();
        $listDistricts->map(function ($item) {
            $item->province;
        });

    
        return $listDistricts;
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
        // return $request->all();
        
        $editDistrict = District::find($id);
        $editDistrict->name = $request['name'];
        $editDistrict->province_id = $request['province_id'];
        $editDistrict->save();

        return $editDistrict;
    }

    public function deleteDistrict(DistrictRequest $request) {
        // return $request['id'];
        
        $deleteDistrict = District::find($request['id']);
        $deleteDistrict->delete();

        return $deleteDistrict;
    }
}
