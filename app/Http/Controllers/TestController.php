<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function checkData(Request $request) {
        // return $request->all();
        if($request['name'] == 'john' && $request['type'] == 'CEO') {
            return 'You are CEO';
        } else {
            return 'You are not CEO';
        }
    }
}
