@extends('layouts.print')

@section('custom-style')
	{{-- <link href="https://fonts.googleapis.com/css?family=Khmer&amp;display=swap" rel="stylesheet"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
@endsection
@section('content')

	<section id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header">
						<div class="row">
							<div class="col-md-6">
								<img src="{{ asset('images/logo.png') }}" class="logo">
							</div>
							<div class="col-md-6">
								<div class="image">
									<img src="{{ asset('images/logo-right.png') }}" class="right-logo pull-right">
								</div>
								<div class="text">
									<label class="pull-right">
										{{ __('print.application_date') }}
										{!! Form::date('application_date', \Illuminate\Support\Carbon::now(), ['style'=>'border:none;']) !!}
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"> 
								<label>
									{{ __('print.request') }}
								</label>
							</div>
							<div class="col-md-5">
								<label>									
									{!! Form::checkbox('single_personal_account', NULL, false, []) !!}
									{{ __('print.single_personal_account') }}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{!! Form::checkbox('joint_member_account', null, false, []) !!}
									{{ __('print.joint_member_account') }}
								</label>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="application_detail" class="mt-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3">
					<h5 class="title">{{  __('print.application_detail') }}</h5>
				</div>
				<div class="col-md-4">

					<label>
						{!! Form::checkbox('tick_the_box', null, false, []) !!}
						{{ __('print.tick_the_box') }}
					</label>
				</div>
				<div class="col-md-4">
					<label>
						{!! Form::checkbox('new_customer', null, false, []) !!}
						{{ __('print.new_customer') }}
					</label>
				</div>
				<div class="col-md-4">
					<label>
						{!! Form::checkbox('existing_customer_information', null, false, []) !!}
						{{ __('print.existing_customer_information') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-3">
					<div class="block-info">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">{{ __('print.personal_detail') }}</h5>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-6">
								<label>
									{{ __('print.family_name') }}
									{!! Form::text('family_name', $account->exists  ? $account->family_name : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label>
									{{ __('print.first_name') }}
									{!! Form::text('first_name', $account->exists  ? $account->first_name : NULL, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<label>
									{{ __('print.date_of_birth') }}
									{!! Form::date('date_of_birth', $account->exists  ? $account->dob :  \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.gender') }}
									{!! Form::text('gender', $account->exists  ? $account->gender : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.nationality') }}
									{!! Form::text('nationality', $account->exists ? $account->nationality : NULL, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-6">
								<label>
									{{ __('print.place_of_birth') }}
									{!! Form::text('place_of_birth ', $account->exists ? $account->place_of_bith : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label>
									{{ __('print.country_of_birth') }}
									{!! Form::text('country_of_birth', $account->exists ? $account->country_of_birth : NULL, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<label>
									{{ __('print.marital_status') }}
									{!! Form::text('marital_status', $account->exists ? $account->married_status : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Type of Legal
									{!! Form::text('type_of_legal', $account->exists ? $account->type_legal : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.number') }}
									{!! Form::text('number', $account->exists ? $account->id_number : NULL, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<label>
									{{ __('print.issuing_country') }}
									{!! Form::text('issuing_country', $account->exists ? $account->issuring_country : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.issuing_date') }}
									{!! Form::date("issuing_date", $account->exists ? $account->issued_date : \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.expire_date') }}
									{!! Form::date('expire_date', $account->exists ? $account->expiry_date : \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<label style="width: 100%">
									{{ __('print.current_address') }}
									{!! Form::text('current_address', $account->exists ? $account->current_address : NULL, ['style'=>'width:70%;']) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<label>
									{{ __('print.permanent_address') }}
									{!! Form::text('permanent_address', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<label>
									{{ __('print.country_code') }}
									{!! Form::text('country_code', null, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.phone_number') }}
									{!! Form::text('phone_number', $account->exists ? $account->phone : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{{ __('print.email_address') }}
									{!! Form::email('email_address', $account->exists ? $account->email : NULL, []) !!}
								</label>
							</div>
						</div>
						<div class="row mt-3 mb-3">
							<div class="col-md-12">
								<h5 class="sub-title">{{ __('print.employment_detail') }}</h5>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-6">
								<label>
									{{  __('print.institution_name') }}
									{!! Form::text('institution_name ', $account->exists ? $account->institute_name : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label style="width: 100%;">
									{{  __('print.occupation') }}
									{!! Form::text('occupation', $account->exists ? $account->sub_employement: NULL, ['style'=>'width:70%']) !!}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-6">
								<label>
									{{  __('print.institution_address') }}
									{!! Form::text('institution_address ', $account->exists ? $account->insitution_address : NULL, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label style="width: 100%;">
									{{ __('print.type_of_business') }}
									{!! Form::text('type_of_business', $account->exists ? $account->employment : NULL, ['style'=>'width:70%;']) !!}
								</label>
							</div>
						</div>
						<div class="row mt-3 mb-3">
							<div class="col-md-12">
								<h5 class="sub-title">{{  __('print.income_and_banking') }}</h5>
							</div>
							<div class="col-md-12">
								<p>{{  __('print.primary_soucre_of_income') }}</p>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-3">
								<label>									
									{!! Form::checkbox('personal_own_property', null, false, []) !!}
									{{ __('print.personal_own_property') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>								
									{!! Form::checkbox('salary', null, false, []) !!}
									{{  __('print.salary') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>									
									{!! Form::checkbox('business_revenue', null, false, []) !!}
									{{  __('print.business_revenue') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>									 
									{!! Form::checkbox('source_income_other', null, false, []) !!}
									{{  __('print.source_income_other') }}
								</label>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<p>{{ __('print.purpose_of_banking_service') }}</p>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-3">
								<label>									
									{!! Form::checkbox('saving', null, false, []) !!}
									{{ __('print.saving') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>								
									{!! Form::checkbox('day_to_day_business', null, false, []) !!}
									{{ __('print.day_to_day_business') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>									
									{!! Form::checkbox('payroll', null, false, []) !!}
									{{ __('print.payroll') }}
								</label>
							</div>
							<div class="col-md-3">
								<label>									 
									{!! Form::checkbox('banking_service_other', null, false, []) !!}
									{{ __('print.banking_service_other') }}
								</label>
							</div>
						</div>
						<div class="row mt-3 mb-3">
							<div class="col-md-12">
								<h5 class="sub-title">{{ __('print.fatca_certification') }}</h5>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-md-12">
								<label>
									{!! Form::checkbox('is_us_person', 'YES', ($account->exists && $account->is_us_person =='yes') ? true : false , []) !!}
									{{ __('print.yes_ustin') }}
									{!! Form::text('is_us_person_code', ($account->exists && $account->is_us_person_code !='') ? $account->is_us_person_code : NULL, []) !!}
								</label>								
							</div>
							<div class="col-md-12">
								<label>
									{{ __('print.fatca_exemption_code') }}
									{!! Form::text('is_us_person_code_name', ($account->exists && $account->is_us_person_yes_code !='') ? $account->is_us_person_yes_code : NULL, []) !!}
								</label>
								<p>{{ __('print.fatca_yes_description') }}</p>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-md-12">
								<label>
									{!! Form::checkbox('no_us_persion', "NO",($account->exists && $account->is_us_person =='no') ? true : false , []) !!}
									{{ __('print.fatca_no_description') }}
								</label>
							</div>
						</div>
					</div>
					<div class="row mt-1 mb-2">
						<div class="col-md-12">
							<h6><strong>SM & PI Oct 2019 V1.4</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="desposit_product_service_detial">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="title">{{ __('print.deposit_product_service_detail') }}</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="block-info mb-1">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">{{ __('print.link_account') }}</h5>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12">
								<label>
									{{ __('print.current_account_number') }}
									{!! Form::text('current_account_number', null, []) !!}
								</label>
							</div>
							<div class="col-md-12">
								<label>
									{{ __('print.saving_account_number') }}
									{!! Form::text('saving_account_number', null, []) !!}
								</label>
							</div>
							<div class="col-md-12">
								<label>
									{{ __('print.debit_account_number') }}
									{!! Form::text('debit_account_number', null, []) !!}
								</label>
							</div>
						</div>
					</div>
					<div class="block-info mb-1">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">2.កាស្នើរសុំកាត / Card Request</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<label>
									{!! Form::checkbox('2', '2', false, []) !!}
									Debit Card​ ( សូមបំពេញព័ត៏មានខាងក្រោម/
Please complete below infomation)
								</label>
							</div>
							<div class="col-md-7">
								<label>
									{!! Form::checkbox('2', '2', false, []) !!}
									កាតឥណទាន / Credit Card (* សូមបំពេញពាក្យស្នើសុំប័ណ្ណឥណទាននៃធនាគាកាណាឌីយ៉ា/Please complete Canadia Bank Application Form )
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>2.1 ប្រភេទអតិថិជន / Customer type</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('3', '3', false, []) !!}
									Customer
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('3', '3', false, []) !!}
									Staff
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('3', '3', false, []) !!}
									Payroll Service
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('3', '3', false, []) !!}
									Other 
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>2.2 ប្រភេទកាត / Card Type</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									 ATM Card
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									 VISA
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									 UPI
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									Elite Card
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>ប្រភេទផលិតផល / Product type</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									Normal
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									Premium
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('2', '3', false, []) !!}
									VIP
								</label>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>									
									Account No
									{!! Form::text('2', null, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label>
									Secret Phrase
									{!! Form::text('2', null, []) !!}									
								</label>
							</div>														
						</div>
						<div class="row">
							<div class="col-md-8">
								<label style="width: 100%">							
									Emboss Name
									{!! Form::text('2', null, ['style'=>'width:80%']) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Pickup Branch 
									{!! Form::text('2', null, []) !!}									
								</label>
							</div>														
						</div>
						<div class="row">
							<div class="col-md-12">
								<label style="width: 100%">
									Account Linkage
									{!! Form::text('2', null, ['style'=>'width:80%']) !!}	
								</label>
							</div>
						</div>
					</div>
					<div class="block-info mb-1">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">{{ __('print.individaul_internet_banking') }}</h5>
							</div>
							<div class="col-md-3">
								<label>
									Customer Type:
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('internet_banking_individaul', 'Individaul', false, []) !!}
									Individaul
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('internet_banking_rgc_customer', 'RGC Customer', false, []) !!}
									RGC Customer
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('internet_banking_canadia_group', "Canadia's Group", false, []) !!}
									Canadia's Group
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>
									Service Type:
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('service_type_inquiry', 'Inquiry', false, []) !!}
									Inquiry
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('service_type_regular', 'Regular', false, []) !!}
									Regular
								</label>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>
									Account No:
									{!! Form::number('account_number', null, []) !!}
								</label>
							</div>
							<div class="col-md-12">
								<label>
									Device Serial No
									{!! Form::number('device_serial_no', null, []) !!}
								</label>
							</div>
							<div class="col-md-3">
								<label>
									Fee Charge:
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('pay_by_cash', 'Pay by Cash', false, []) !!}
									Pay by Cash
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::checkbox('debit_from_account', 'Debit from Account', false, []) !!}
									Debit from Account
								</label>
							</div>
							<div class="col-md-3">
								<label>
									{!! Form::number('amount', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>Customer can download Canadia Mobile Banking App from Play Store or App Store for mobile banking self-register</p>
							</div>
						</div>
					</div>
					<div class="block-info mb-1">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">4.សំរាប់គណនីមានកាលកំណត់ / FOR FIXED DEPOSIT ACCOUNT ONLY</h5>
							</div>
							<div class="col-md-4">
								<label>
									Depost Amount
									{!! Form::number('deposit_amount', NULL, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Interest Rate
									{!! Form::number('interest_rate', null, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Certificate Number
									{!! Form::number('certificate_number', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-4">
										<label>
											Term Length: &nbsp;
											{!! Form::checkbox('6_months', '6 months', false, []) !!}
											6 months
										</label>
									</div>
									
									<div class="col-md-3">
										<label>											
											{!! Form::checkbox('12_months', '12 months', false, []) !!}
											12 months
										</label>
									</div>
									<div class="col-md-3">
										<label>											
											{!! Form::checkbox('24_months', '24 months', false, []) !!}
											24 months
										</label>
									</div>
									<div class="col-md-2">
										<label>
											{!! Form::checkbox('other', 'Other', false, []) !!}
											Other
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<label>
									Nominated Account
									{!! Form::number('nominated_account', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>Maturity Instruction</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>
									Roll Over?
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{!! Form::radio('roll_over', "YES", true, []) !!}
									Yes (Please select below Instruction)
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{!! Form::radio("roll_over", "NO", false, []) !!}
									No (Auto close on maturity)
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>
									{!! Form::radio('roll_over', "Principle only", false, []) !!}
									Principle only
								</label>
							</div>
							<div class="col-md-4">
								<label>
									{!! Form::radio('roll_over', "Principle and Interest", false, []) !!}
									Principle and Interest
								</label>
							</div>							
							<div class="col-md-4">
								<label>
									{!! Form::radio('roll_over', "Transfer interest every month	", false, []) !!}
									Transfer interest every month	
								</label>
							</div>
						</div>
					</div>
					<div class="block-info mb-1">
						<div class="row">
							<div class="col-md-12">
								<h5 class="sub-title">5.សំរាប់គណនីបញ្ញើរតាមផែនការ / FOR INSTALLMENT DEPOSIT ACCOUNT ONLY</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>
									Monthly Depost Amount
									{!! Form::number('monthly_deposit_amount', null, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Interest Rate
									{!! Form::number('interest_rate', null, []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Certificate Number
									{!! Form::number('certificate_number', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-4">
										<label>
											Term Length: &nbsp;
											{!! Form::checkbox('12_months', '12 months', false, []) !!}
											12 months
										</label>
									</div>
									
									<div class="col-md-3">
										<label>											
											{!! Form::checkbox('24_months', '24 months', false, []) !!}
											24 months
										</label>
									</div>
									<div class="col-md-3">
										<label>											
											{!! Form::checkbox('36_months', '36 months', false, []) !!}
											36 months
										</label>
									</div>									
								</div>
							</div>
							<div class="col-md-4">
								<label>
									Other
									{!! Form::number('other', null, []) !!}
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>
									Opening Instruction
									{!! Form::text('opening_instruction', null, []) !!}
								</label>
							</div>
							<div class="col-md-12">
								<label>
									Please transfer fund from account
									{!! Form::number('transfer_fund_from_account', null, []) !!}
								</label>
							</div>
							<div class="col-md-12">
								<label>
									Please transfer the maturity and interest to account
									{!! Form::number('maturity_and_interest_to_account', null, []) !!}
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-1 mb-2">
				<div class="col-md-12">
					<h6><strong>SM & PI Oct 2019 V1.4</strong></h6>
				</div>
			</div>
		</div>
	</section>
	<section id="deposit_product_detial" class="mt-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="title">III. ព័ត៍មានលម្អិតនៃគណនី​ / Deposit Product Detail</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="block-info">
						<div class="row">
							<div class="col-md-4">
								<label>
									Account Type:
								</label>
							</div>
							<div class="col-md-4">
								<label>Currency Type</label>
							</div>
							<div class="col-md-4">
								<label>
									Account Number
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												<label>SV</label>
											</div>
											<div class="col-md-4">
												<label>CR</label>
											</div>
											<div class="col-md-4">
												<label>FD</label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Or other A/C type</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">									
									<div class="col-md-3">
										<label>KHR</label>
									</div>
									<div class="col-md-3">
										<label>USD</label>
									</div>
									<div class="col-md-3">
										<label>THB</label>
									</div>
									<div class="col-md-3">
										<label>RMB</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												{!! Form::checkbox('SV','SV' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('CR','CR' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('FD','FD' , false, []) !!}
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												{!! Form::text('ac_type', null, []) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">									
									<div class="col-md-3">
										<label>{!! Form::checkbox('KHR', "KHR", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('USD', "USD", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('THB', "THB", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('RMB', "RMB", false, []) !!}</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										{!! Form::text('account_number', null, []) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												{!! Form::checkbox('SV','SV' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('CR','CR' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('FD','FD' , false, []) !!}
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												{!! Form::text('ac_type', null, []) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">									
									<div class="col-md-3">
										<label>{!! Form::checkbox('KHR', "KHR", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('USD', "USD", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('THB', "THB", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('RMB', "RMB", false, []) !!}</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										{!! Form::text('account_number', null, []) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												{!! Form::checkbox('SV','SV' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('CR','CR' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('FD','FD' , false, []) !!}
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												{!! Form::text('ac_type', null, []) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">									
									<div class="col-md-3">
										<label>{!! Form::checkbox('KHR', "KHR", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('USD', "USD", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('THB', "THB", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('RMB', "RMB", false, []) !!}</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										{!! Form::text('account_number', null, []) !!}
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4">
												{!! Form::checkbox('SV','SV' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('CR','CR' , false, []) !!}
											</div>
											<div class="col-md-4">
												{!! Form::checkbox('FD','FD' , false, []) !!}
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												{!! Form::text('ac_type', null, []) !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">									
									<div class="col-md-3">
										<label>{!! Form::checkbox('KHR', "KHR", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('USD', "USD", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('THB', "THB", false, []) !!}</label>
									</div>
									<div class="col-md-3">
										<label>{!! Form::checkbox('RMB', "RMB", false, []) !!}</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										{!! Form::text('account_number', null, []) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="customer_declaration" class="mt-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="title">IV. ការអះអាងធានារបស់អតិថិជន​ / CUSTOMER DECLARATION</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="block-info">
						<div class="row">
							<div class="col-md-12">
								<p>I/We, the undersigned hereby declare that:</p>
							</div>
							<div class="col-md-12">
								<p>1. I/We assue and attest that all information above is complete and accurate. I/We agree to take full responsibility before Canadia Bank and the law of Cambodia should any of information above be false or inaccurate. Should there be any change, I/We will inform the Bank immediately.</p>
							</div>
							<div class="col-md-12">
								<p>2. I/We hereby acknowledge that I have read and understand the terms and conditions, and I/We agree to adhere to them without any force from any side.</p>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	<section id="account_signing_instruction_and_specimen" class="mt-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="title">V. លក្ខខណ្ឌប្រតិបត្តិការគណនី និងគំរូហត្ថលេខា​ / ACCOUNT SIGNING INSTRUCTION AND SPECIMEN</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="block-info">
						<div class="row">
							<div class="col-md-12">
								<div class="account_signing_instruction_and_specimen">
									<div>
										<h6 class="sub-title">Signing Instruction to perform transaction(on) account</h6>
										<div class="block clearfix">
											<div>
												<label>
													{!! Form::checkbox('1', "1", false, []) !!}
													Any one to sign
												</label>
											</div>
											<div>
												<label>
													{!! Form::checkbox('2', "2", false, []) !!}
													All to sign
												</label>
											</div>
										</div>
										<div class="block-100 clearfix">
											<h6 class="sub-title">Mandate instruction for account closure (for join account only)</h6>
											<label class="mb-2">
												{!! Form::checkbox('3', "3", false, []) !!}
												The same as account operating condition
											</label>
											<label class="mb-2">
												{!! Form::checkbox('3', "3", false, []) !!}
												All to sign to close
											</label>
											<label class="mb-2">
												{!! Form::checkbox('3', "3", false, []) !!}
												Biometric Request for Transaction
											</label>
										</div>
									</div>
									<div>
										<div class="block clearfix">
											<p>Account Holding Signature(1)</p>
										</div>
										<div class="block-100 clearfix">
											<label>
												Name : {!! Form::text('name', null, []) !!}
											</label>
											<label>
												Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
											</label>
											<label>
												CID No: {!! Form::number('number', NULL, []) !!}
											</label>
										</div>
										<div class="block clearfix">
											<p>Account Holding Signature(3)</p>
										</div>
										<div class="block-100 clearfix">
											<label>
												Name : {!! Form::text('name', null, []) !!}
											</label>
											<label>
												Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
											</label>
											<label>
												CID No: {!! Form::number('number', NULL, []) !!}
											</label>
										</div>
									</div>
									<div>
										<div class="block clearfix">
											<label>Account Holding Signature(2)</label>
										</div>
										<div class="block-100 clearfix">
											<label>
												Name : {!! Form::text('name', null, []) !!}
											</label>
											<label>
												Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
											</label>
											<label>
												CID No: {!! Form::number('number', NULL, []) !!}
											</label>
										</div>
										<div class="block clearfix">
											<label>Account Holding Signature(4)</label>
										</div>
										<div class="block-100 clearfix">
											<label>
												Name : {!! Form::text('name', null, []) !!}
											</label>
											<label>
												Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
											</label>
											<label>
												CID No: {!! Form::number('number', NULL, []) !!}
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="for_bank_user_only" class="mt-2 mb-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="title">សម្រាប់ធនាគាបំពេញ​ / FOR BANK USER ONLY</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="block-info">
						<div class="row">
							<div class="col-md-6">
								<label>
									Branch Name :
									{!! Form::text('brand_name', null, []) !!}
								</label>
							</div>
							<div class="col-md-6">
								<label>
									Account Name  :
									{!! Form::text('account_name', null, []) !!}
								</label>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-4 cmb-100">
								<label class="text-center">Attended By (CSO)</label>
							</div>	
							<div class="col-md-4 cmb-100">
								<label class="text-center">Verified By (CSS)</label>
							</div>
							<div class="col-md-4 cmb-100">
								<label class="text-center">Approved By (BM/DBM)</label>
							</div>	
						</div>	
						<div class="row">
							<div class="col-md-4">
								<p>-------------------------------------------------------</p>
							</div>
							<div class="col-md-4">
								<p>-------------------------------------------------------</p>
							</div>
							<div class="col-md-4">
								<p>-------------------------------------------------------</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>
									Name : {!! Form::text('name', null, []) !!}
								</label>
								<label>
									Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Name : {!! Form::text('name', null, []) !!}
								</label>
								<label>
									Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
							<div class="col-md-4">
								<label>
									Name : {!! Form::text('name', null, []) !!}
								</label>
								<label>
									Date : {!! Form::date('date', \Illuminate\Support\Carbon::now(), []) !!}
								</label>
							</div>
						</div>			
					</div>
				</div>
			</div>
			<div class="row mt-1 mb-2">
				<div class="col-md-12">
					<h6><strong>SM & PI Oct 2019 V1.4</strong></h6>
				</div>
			</div>
		</div>
	</section>
	
@endsection