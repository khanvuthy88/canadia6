<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\Province;
use App\District;
use App\Commune;
use App\Village;
use App\Account;
use App\TblCountry;
use App\EmploymentStatus;
use App\TblProvince;
use App\TblDistrict;
use App\TblCommune;
use App\TblVillage;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use DateTime;

class FrontendAccountController extends Controller
{
    public function create(Request $request)
    {
    	if ($request->exists('agree_condition')) {
    		$account = $request['saving_account'];
    		$countryArray = Arr::pluck(TblCountry::all(),'name','code');
    		$provinceArray = Arr::pluck(TblProvince::all(),'title','pid');
    		$districtArray = Arr::pluck(TblDistrict::all(),'title','did');
    		$communeArray = Arr::pluck(TblCommune::all(),'title','cid');
    		$villageArray = Arr::pluck(TblVillage::all(),'title','vid');
            $default_district = Arr::pluck(TblDistrict::where('did','like','01.%')->get(),'title','did');
            $default_commune = Arr::pluck(TblCommune::where('cid','like','01.001.%')->get(),'title','cid');
            $employmentArray =  Arr::pluck(EmploymentStatus::where('parent_id',NULL)->get(),'name','id');
            $default_village =  Arr::pluck(TblVillage::where('vid','like','01.001.001.%')->get(),'title','vid');

    		return view('account.create',compact('account','countryArray','provinceArray','districtArray','communeArray','villageArray','employmentArray','default_district','default_commune','default_village'));
    	}else{
    		return back();
    	}
    	
    }

    public function store(Request $request)
    {

        // If is_us_person == yes, then we will us_code and code if not those fields will empty
        $is_us_person_code = '';
        $is_us_person_yes_code = '';
        if($request['is_us_person'] == 'yes'):
            $is_us_person_code = $request['is_us_person_yes'];
            $is_us_person_yes_code = $request['is_us_person_yes_code'];
        endif;

        // Set Type of legal because I don't want to change on view, if type_legal == id_card then value =1-National ID else value = 2-PASSPORT, default blank;
        $type_legal ='';
        if($request['type_legal'] == 'id_card' ):
            $type_legal = '1-National ID';
        else:
            $type_legal = '2-PASSPORT';
        endif;

        // Check Primary Banking Services Request(Multiple Choice), because I store those service as boolean field but value frontend is array, if you don't want to hard code as below, you can rename it on frontend as field in database.
        $purpose_mobile_banking = 0;
        $purpose_internet_banking = 0;
        $purpose_debit_card = 0;
        $purpose_credit_card = 0;
        // Check if primary_banking_request present in $request array and not empty
        if($request->filled('primary_banking_request')):
            // Check those key in array request using Arr helper
            if(Arr::has($request['primary_banking_request'], 'mobile-banking')):
                $purpose_mobile_banking = 1;
            elseif(Arr::has($request['primary_banking_request'], 'internet-banking')):
                $purpose_internet_banking = 1;
            elseif(Arr::has($request['primary_banking_request'], 'debit-card')):
                $purpose_debit_card = 1;
            elseif(Arr::has($request['primary_banking_request'], 'credit-card')):
                $purpose_credit_card = 1;
            endif;
        endif;

        $account = new Account();
        $account->first_name = $request['first_name'];
        $account->family_name = $request['family_name'];
        $account->dob = $request['date_of_birth'];
        $account->gender = $request['gender'];
        $account->married_status = $request['married_status'];
        $account->place_of_bith = $request['place_of_birth'];
        $account->nationality = $request['nationality'];
        $account->country_of_birth = $request['country_of_birth'];
        $account->type_legal =  $request['type_legal'];
        $account->issuring_country = $request['issuring_country'];
        $account->id_number = $request['id_number'];
        $account->issued_date = $request['issued_date'];
        $account->expiry_date = $request['expiry_date'];
        $account->house_number = $request['house_number'];
        $account->street = $request['street'];
        $account->group = $request['group'];
        $account->province_code = $request['province_id'];
        $account->district_code = $request['district_id'];
        $account->commune_code = $request['commune_id'];
        $account->village_code = $request['village_id'];
        $account->email = $request['email'];
        $account->phone = $request['phone'];
        $account->employement_detail = $request['employement-detail'];
        $account->sub_employement_detail = $request['sub_typoec'];
        $account->other_sub_type = $request['other_sub_type'];
        $account->institute_name = $request['institute_name'];
        $account->insitution_address = $request['insitution_address'];
        $account->source_of_income = $request['source_of_income'];
        $account->monthly_income = $request['income-amount'];
        $account->why_open_account = $request['purpose_of_banking_service'];
        $account->orther = $request['purpose_of_banking_service_other_input'];
        $account->is_us_person = $request['is_us_person'];
        $account->is_us_person_code = $is_us_person_code;
        $account->is_us_person_yes_code = $is_us_person_yes_code;
        $account->acc_currency = $request['account_currency'];
        $account->acc_type = $request['choose_account_type'];
        $account->purpose_mobile_banking = $purpose_mobile_banking;
        $account->purpose_internet_banking = $purpose_internet_banking;
        $account->purpose_debit_card = $purpose_debit_card;
        $account->purpose_credit_card = $purpose_credit_card; 
        // Generate unique code for acc pin number
        $account->acc_pin_number = $account->generateUniqueNumber();  
        $account->save();

        // After save file to database, below code will create new file with telephone number as name
        $file_content = '';
        $file_name = $account->phone;
        $file_content.=$account->first_name.'|'.$account->family_name.'|'.$account->dob.'|'.$account->gender.'|'.$account->married_status.'|'.$account->place_of_birth.'|'.$account->nationality.'|'.$account->country_of_birth.'|'.$account->type_legal.'|'.$account->issuring_country.'|'.$account->id_number.'|'.$account->issued_date.'|'.$account->expiry_date.'|'.$account->house_number.'|'.$account->street.'|'.$account->province_code.'|'.$account->district_code.'|'.$account->commune_code.'|'.$account->village_code.'|'.$account->email.'|'.$account->phone.'|'.$account->employement_detail.'|'.$account->sub_employement_detail.'|'.$account->institute_name.'|'.$account->insitution_address.'|'.$account->source_of_income.'|'.$account->monthly_income.'|'.$account->why_open_account.'|'.$account->orther.'|'.$account->is_us_person.'|'.$account->is_us_person_code.'|'.$account->is_us_person_yes_code.'|'.$account->acc_currency.'|'.$account->acc_type;
        

        Storage::disk('public')->put($file_name.'.txt', $file_content);
        return redirect()->route('frontend-account-created-success',compact('account'));

    }

    public function accountCreatedSuccess(Account $account)
    {
        // $account_code = $account->acc_pin_number;
        $account_code = $account->phone;

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

    public function getDistrictByProvinceid($province)
    {
        $district_array = Arr::pluck(DB::table('tbl_districts')->where('did','like',$province.'.%')->get(),'title','did');
        return $district_array;
    }

    public function getCommuneByDistrictid($district)
    {
        $commune_array = Arr::pluck(DB::table('tbl_communes')->where('cid','like',$district.'.%')->get(),'title','cid');
        return $commune_array;
    }

    public function getVillageByCommuneid($commune)
    {
        $village_array = Arr::pluck(DB::table('tbl_villages')->where('vid','like',$commune.'.%')->get(),'title','vid');
        return $village_array;
    }

    public function getSubEmployment(EmploymentStatus $employment)
    {
        $employment_array = Arr::pluck(EmploymentStatus::where('parent_id',$employment->id)->get(),'name','id');
        return $employment_array;
    }
}
