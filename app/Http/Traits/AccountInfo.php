<?php 
namespace App\Http\Traits;

trait AccountInfo
{
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
}