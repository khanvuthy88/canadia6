<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\District;
use App\Commune;
use App\Village;
use Illuminate\Support\Arr;

class FrontendAccountController extends Controller
{
    public function create(Request $request)
    {
    	if ($request->exists('agree_condition')) {
    		$account = $request['saving_account'];
    		$countryArray = Arr::pluck(Country::all(),'name','id');
    		$provinceArray = Arr::pluck(Province::all(),'name','id');
    		$districtArray = Arr::pluck(District::all(),'name','id');
    		$communeArray = Arr::pluck(Commune::all(),'name','id');
    		$villageArray = Arr::pluck(Village::all(),'name','id');
    		return view('account.create',compact('account','countryArray','provinceArray','districtArray','communeArray','villageArray'));
    	}else{
    		return back();
    	}
    	
    }
}
