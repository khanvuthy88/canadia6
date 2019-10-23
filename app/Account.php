<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
class Account extends Model
{
    protected $casts = ['dob']; 
    // public function getDobAttribute($value)
    // {
    //     // $dob = Carbon::createFromFormat('Y-m-d', $value);
    //     $dob = Carbon::parse($value);
    //     return $dob->format('d-m-Y');
    // }

    // public function setDobAttribute($dob)
    // {
    //     $this->attributes['dob'] = DateTime::createFromFormat('Y-m-d','2011-09-09');
    // }

    public function commune()
    {
        return $this->belongsTo(Address::class, 'commune_id');
    }
    public function district()
    {
        return $this->belongsTo(Address::class, 'district_id');
    }
    public function province()
    {
        return $this->belongsTo(Address::class, 'province_id');
    }

    public function village()
    {
        return $this->belongsTo(Address::class, 'village_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'nationality');
    }
    public function getNationalityname($id) {
        if ($country = Country::where('id',$id)->first()) {
            return $country->name;
        }
        return ;
    }
    public function getVillageName($id) {
        if ($village = Village::where('id',$id)->first()) {
            return $village->name;
        }
        return ;
    }

    /**
     * Get commune name base on param $id
     * @param  int
     * @return commune name
     */
    public function getCommuneName($id)
    {
        if($commune = Commune::where('id',$id)->first()){
            return $commune->name;    
        }
        return;
        
    }

    /**
     * Get district name base on param $id;
     * @param  int
     * @return district name
     */
    public function getDistrictName($value='')
    {
        if($district = District::where('id',$value)->first()){
            return $district->name;
        }
        return;        
    }

    /**
     * Get province name base on param $id;
     * @param  int
     * @return province name
     */
    public function getProvinceName($value='')
    {
        if($province = Province::where('id',$value)->first()){
            return $province->name;
        }
        return;
    }

    /**
     * Get reason base on key in reasons why_open_account
     * @param string
     * @return  string
     */
    public function WhyOpenAccountString($value='')
    {
        $reasons = array(
            'saving' => 'Saving Account', 
            'day_to_day_business'=>'Day to day Business', 
            'for_payroll'=>'For Payroll', 
            'other'=>'Other' );

        foreach ($reasons as $key => $reason) {
            if($value == $key){
                return $reason;
            }
        }
        return 'Unknow';
    }

    /**
     * Get primary_bank_service_request base on param $value
     * @param  string
     * @return string
     */
    public function primaryBankServiceRequest($value='')
    {
        $services = array(
            'mobile-banking' => 'Mobile Banking', 
            'internet-banking' => 'Internet Banking',
            'debit-card' => 'Debit Card',
            'credit-card' => 'Credit Card'
        );

        foreach ($services as $key => $service) {
            if($value  == $key){
                return $service;
            }
        }
        return 'Unknow';
    }

    /**
     * Get acc_type base on param $value;
     * @param  string
     * @return string
     */
    public function getAccountType($value='')
    {
        $types = array(
            'saving-account' => 'Saving Account',
            'elite-account' => 'Elite Account',
            'current-account' => 'Current Account' 
        );

        foreach ($types as $key => $type) {
            if($value == $key){
                return $type;
            }
        }
        return 'Unknow';
    }

    public function professionalSituation($value='')
    {
        $situations = array(
            'emplyee' => 'Employee',
            'business-revenue' => 'Business Revenue',
            'personal-own-property' => 'Personal own property',
            'other' => 'Other'
        );

        foreach ($situations as $key => $situation) {
            if($value == $key){
                return $situation;
            }
        }
        return 'Unknow';
    }

    // Using for generate reference_code for each user account
    public function generateUniqueNumber()
    {
        $number = random_int(0, 0xfffff);
        if($this->checkExistcode($number)):
            return $this->generateUniqueNumber();
        endif;

        return $number;
    }

    public function checkExistcode($value='')
    {
        return Account::where('reference_code', (string)$value)->exists();
    }
}
