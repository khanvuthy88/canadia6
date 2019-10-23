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
use App\Http\Traits\AccountInfo;

class DashbaordController extends Controller
{
    use  AccountInfo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        return view('admin.dashbaord',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Account $account)
    {
        $countryArray = Arr::pluck(Country::all(),'name','id');
        $provinceArray = Arr::pluck(Province::all(),'name','id');
        $districtArray = Arr::pluck(District::all(),'name','id');
        $communeArray = Arr::pluck(Commune::all(),'name','id');
        $villageArray = Arr::pluck(Village::all(),'name','id');
        return view('admin.create-account',compact('account','countryArray','provinceArray','districtArray','communeArray','villageArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $countryArray = Arr::pluck(Country::all(),'name','id');
        $provinceArray = Arr::pluck(Province::all(),'name','id');
        $districtArray = Arr::pluck(District::all(),'name','id');
        $communeArray = Arr::pluck(Commune::all(),'name','id');
        $villageArray = Arr::pluck(Village::all(),'name','id');
        return view('admin.create-account',compact('account','countryArray','provinceArray','districtArray','communeArray','villageArray'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        return $account;
    }

    public function allAccounts()
    {
        $accounts = Account::all();
        return view('admin.account',compact('accounts'));
    }

    public function accountInfo(Account $account)
    {
        $html = '';
        $headers =array('Gender','Married status','First name', 'Family name', 'Date of birth', 'Nationality', 'Country of birth', 'Type legal', 'Issuring country', 'Expiry date', 'House number', 'Street', 'Group', 'Email', 'Phone', 'Professional situation', 'Position', 'Company name', 'Business type', 'Source of income', 'Monthly income', 'Why open account', 'Orther', 'Is US person', 'Account currency', 'Account PIN number', 'Account type', 'Primary bank service request', 'Branch location id', 'Village', 'Commune', 'District', 'Province', 'Acitve');
        $account_obj = array();
        $account_obj['account_info']=
        $account['full_name'] = $account->first_name.' '.$account->family_name;
        $account['gender'] = ($account->gender == 'f') ? 'Female' : 'Male';
        $account['married_status'] = ($account->married_status == 'married') ? 'Married' : 'Single';
        $account['nationality'] = $account->getNationalityname($account->nationality);
        $account['issuring_country'] = $account->getNationalityname($account->issuring_country);
        $account['country_of_birth'] = $account->getNationalityname($account->country_of_birth);   
        $account['village_id'] = $account->getVillageName($account->village_id);   
        $account['district_id'] = $account->getDistrictName($account->district_id);
        $account['commune_id'] = $account->getCommuneName($account->commune_id);
        $account['province_id'] = $account->getProvinceName($account->province_id);
        $account['is_active'] = ($account->is_active == 1) ? 'Active' : 'Un-active';
        $account['source_of_income'] = ($account->source_of_income == 'business_income') ? 'Business Income' : 'Salary Income';
        $account['why_open_account'] = $this->WhyOpenAccountString($account->why_open_account);
        $account['professional_situation'] = $account->professionalSituation($account->professional_situation);
        $account['primary_bank_service_request'] = $this->primaryBankServiceRequest($account->primary_bank_service_request);
        $account['acc_type'] = $account->getAccountType($account->acc_type);
        $account['type_legal'] = ($account->type_legal == "id_card") ? 'ID Card': 'Pasport';
        $account['is_us_person'] =($account->is_us_person == 'yes') ? 'Yes' : 'No';
        $account['acc_currency'] = ($account->acc_currency == 'usd') ? 'USD' : 'Riel';
        return $account;
    }
}