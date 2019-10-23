<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\District;
use App\Commune;
use App\Village;
use App\Account;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use DateTime;

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

    public function store(Request $request)
    {
        // return $request;
        $monthly_salary = '';
        $source_income = '';
        
        if($request['source_of_income'] == 'monthly_salary'):
            $monthly_salary = $request['monthly_salary'];
            $source_income = 'monthly_salary';
        else:
            $monthly_salary = $request['business_income'];
            $source_income = 'business_income';
        endif;
        

        $account = new Account();
        $account->gender = $request['gender'];
        $account->married_status = $request['married_status'];
        $account->first_name = $request['first_name'];
        $account->family_name = $request['family_name'];
        $account->dob = DateTime::createFromFormat('Y-m-d',$request['date_of_birth']);;
        $account->nationality = $request['nationality'];
        $account->country_of_birth = $request['country_of_birth'];
        $account->type_legal = $request['type_legal'];
        $account->issuring_country = $request['issuring_country'];
        $account->id_number = $request['id_number'];
        $account->issued_date = $request['issued_date'];
        $account->expiry_date = $request['issued_date'];
        $account->house_number = $request['house_number'];
        $account->street = $request['street'];
        $account->group = $request['group'];
        $account->email = $request['email'];
        $account->phone = $request['phone'];
        $account->professional_situation = $request['employement-detail'];
        $account->position = $request['occupation'];
        $account->company_name = $request['institute_name'];
        $account->business_type = $request['type_of_bussiness'];
        $account->source_of_income = $source_income;
        $account->monthly_income = $monthly_salary;
        $account->why_open_account = $request['purpose_of_banking_service'];
        $account->is_us_person = $request['is_us_person'];
        $account->acc_currency = $request['account_currency'];
        $account->acc_type = $request['choose_account_type'];
        $account->primary_bank_service_request = $request['primary_banking_request'];
        $account->province_id = $request['province_id'];
        $account->district_id = $request['district_id'];
        $account->commune_id = $request['commune_id'];
        $account->village_id = $request['village_id'];      
        $account->acc_pin_number = $account->generateUniqueNumber();  
        $account->save();

        return redirect()->route('frontend-account-created-success',compact('account'));

    }

    public function accountCreatedSuccess(Account $account)
    {
        $account_code = $account->acc_pin_number;
        return view('account.success',compact('account_code'));
    }


    public function dobValidtor($value='')
    {
        $years = Carbon::parse($value)->age;
        if ($years <18) {
            return 'false';
        }else{
            return 'true';
        }
    }

    public function idNumberValidator($value='')
    {
        if(Account::where('id_number',$value)->first()):
            return 'false';
        else:
            return 'true';
        endif;
    }

    public function phoneNumberValidator($value='')
    {
        if(Account::where('phone',$value)->first()):
            return 'false';
        else:
            return 'true';
        endif;
    }

    public function emailValidator($value='')
    {
        if(Account::where('email',$value)->first()):
            return 'false';
        else:
            return 'true';
        endif;
    }

    public function getDistrictByProvinceid(Province $province)
    {
        $district_array = Arr::pluck(District::where('province_id',$province->id)->get(),'name','id');
        return $district_array;
    }

    public function getDistrictByDistrictid(District $district)
    {
        $commune_array = Arr::pluck(Commune::where('district_id',$district->id)->get(),'name','id');
        return $commune_array;
    }

    public function getVillageByCommuneid(Commune $commune)
    {
        $village_array = Arr::pluck(Village::where('commune_id',$commune->id)->get(),'name','id');
        return $village_array;
    }
}
