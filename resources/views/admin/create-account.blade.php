@extends('adminlte::page')

@section('title', 'Accounts')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/jquery-ui/jquery-ui.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/icheck/skins/flat/red.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-admin.css') }}">
@endsection
@section('content_header')	
	<div class="clearfix"></div>
    <h1>New Account</h1>
@stop

@section('content')
    <div class="row">
    	<div class="col-xs-12">
    		<div class="box box-primary ">
				<div class="box-header with-border">
					<h3 class="box-title">New Account</h3>					
				</div>
				<div class="box-body">

					{!! Form::open([
						'class'=>'form',
						'route'=> $account->exists  ? ['admin-account-update',$account] : 'admin-account-type-create']) !!}
						<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('gender', NULL, []) !!}
									{!! Form::select('gender', ['m'=>'Male','f'=>'Female'], $account->exists  ? $account->gender : 'm', ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('married_status', NULL, []) !!}
									{!! Form::select('married_status', ['single'=>'Single','married'=>'Married'], 'single', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('first_name', NULL, []) !!}
									{!! Form::text('first_name', $account->exists  ? $account->first_name : NULL, ['class'=>'form-control','required'=>'required']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('family_name', NULL, []) !!}
									{!! Form::text('family_name', $account->exists ? $account->family_name : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('date_of_birth', NULL, []) !!}
									{!! Form::date('date_of_birth',
									$account->exists ? $account->dob : \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
									
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('nationality', NULL, []) !!}
									{!! Form::select('nationality', $countryArray, $account->exists ? $account->nationality : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('type_legal', NULL, []) !!}
									{!! Form::select('type_legal', ['id_card'=>'National ID','passport'=>'Passport'], 
									$account->exists ? $account->type_legal : 'id_card', ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('issuring_country', NULL, []) !!}
									{!! Form::select('issuring_country', $countryArray, 
									$account->exists ? $account->issuring_country : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('ID Number', NULL, []) !!}
									{!! Form::text('id_number', $account->exists ? $account->id_number : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('issued_date', NULL, []) !!}
									{!! Form::date('issued_date', $account->exists ? $account->issued_date : \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('expiry_date', NULL, []) !!}
									{!! Form::date('expiry_date', $account->exists ? $account->expiry_date : \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('house_number(Optional)', NULL, []) !!}
									{!! Form::text('house_number', $account->exists ? $account->house_number : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('street(Optional)', NULL, []) !!}
									{!! Form::text('street', $account->exists ? $account->street : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('province', NULL, []) !!}
									{!! Form::select('province_id', $provinceArray, 
										$account->exists ? $account->province_id : NULL, [
										'class'=>'form-control',
										'id'=>'province_id']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('district', NULL, []) !!}
									{!! Form::select('district_id', [
										$account->exists ? $districtArray : NULL], 
										$account->exists ? $account->district_id : NULL, [
										'class'=>'form-control', 
										'disabled'=>true,
										'id'=>'district_id']) !!}
									
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('commune', NULL, []) !!}
									{!! Form::select('commune_id', [
										$account->exists ? $communeArray : NULL], 
										$account->exists ? $account->commune_id : NULL, [
										'class'=>'form-control', 
										'disabled'=>true,
										'id'=>'commune_id']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('village', NULL, []) !!}
									{!! Form::select('village_id', [
										$account->exists ? $villageArray : NULL], 
										$account->exists ? $account->village_id : NULL, [
										'class'=>'form-control', 
										'disabled'=>true,
										'id'=>'village_id']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('group(Optional)', NULL, []) !!}
									{!! Form::text('group', 
									$account->exists ? $account->group : NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('email(Optional)', NULL, []) !!}
									{!! Form::text('email', 
									$account->exists ? $account->email : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('phone', NULL, []) !!}
									{!! Form::text('phone', 
									$account->exists ? $account->phone : NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row " id="employement_detail">			
								<div class="col-md-12 form-group">	
									<div class="btn-group btn-group-toggle" id="radio-button" data-toggle="buttons">			
										<label class="btn bg-secondary {{ ($account->professional_situation == 'emplyee' && $account->exists) ? 'active' : '' }}" id="emplyee">
											{!! Form::radio('employement-detail', 'emplyee', 
											($account->professional_situation == 'emplyee') ? true : false, 
											['id'=>'emplyee']) !!}
											Employee
										</label>				
									
										<label class="btn bg-secondary {{ ($account->professional_situation == 'business-revenue' && $account->exists) ? 'active' : '' }}" id="business-revenue">
											{!! Form::radio('employement-detail', 'business-revenue', 
											($account->professional_situation == 'business-revenue') ? true : false
											, ['id'=>'business-revenue']) !!}
											Business Revenue
										</label>							
									
										<label class="btn bg-secondary {{ ($account->professional_situation == 'personal-own-property' && $account->exists) ? 'active' : '' }}" id="personal-own-property">									
											{!! Form::radio('employement-detail', 'personal-own-property', 
											($account->professional_situation == 'personal-own-property') ? true : false
											, ['id'=>'personal-own-property']) !!}
											Personal own property
										</label>							
									
										<label class="btn bg-secondary {{ ($account->professional_situation == 'other' && $account->exists) ? 'active' : '' }}" id="other">
											{!! Form::radio('employement-detail', 'other', 
											($account->professional_situation == 'other') ? true: false
											, ['id'=>'other']) !!}
											Other
										</label>	
									</div>			
								</div>														
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('institute_name', NULL, []) !!}
									{!! Form::text('institute_name', 
										$account->exists ? $account->institute_name : NULL
									, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('occupation', NULL, []) !!}
									{!! Form::text('occupation', 
										$account->exists ? $account->occupation : NULL
									, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('Insitution address', NULL, []) !!}
									{!! Form::text('insitution_address', 
										$account->exists ? $account->insitution_address : NULL
									, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('Type of bussiness', NULL, []) !!}
									{!! Form::text('type_of_bussiness', 
										$account->exists ? $account->type_of_bussiness : NULL
									, ['class'=>'form-control']) !!}
								</div>
							</div>	
							<div class="form-row">
								<div id="source_of_income"> 
									<div class="form-group col-md-12">				
										<label id="icheck">
											{!! Form::radio('source_of_income', 'monthly_salary', 
											($account->source_of_income == 'monthly_salary') ? True : False, []) !!}
											Monthly Salary
										</label>
										{!! Form::text('monthly_salary', NULL, ['id'=>'monthly_salary']) !!}
									</div>
									<div class="form-group col-md-12">
										<label id="icheck">
											{!! Form::radio('source_of_income', 'business_income', 
											($account->source_of_income =='business_income') ? True : False, []) !!}
											Business (Monthly income)
										</label>
										{!! Form::text('business_income', NULL, ['id'=>'business_income']) !!}
									</div>
								</div>
							</div>
							<div class="form-row" id="purpose_of_banking_service">								
								<div class="form-group col-md-12">
									<div class="btn-group-toggle btn-group purpose_of_banking_service" data-toggle="buttons">
										<label class="btn bg-light {{ ($account->exists && $account->why_open_account == 'saving') ? 'active' : ''  }}" id="emplyee">
											{!! Form::radio('purpose_of_banking_service', 'saving', 
												($account->why_open_account == 'saving') ? True : False 
											, ['id'=>'saving_account']) !!}
											Saving Account
										</label>				
									
										<label class="btn bg-light {{ ($account->exists && $account->why_open_account == 'day_to_day_business') ? 'active' : ''  }}" id="day_to_day_business">
											{!! Form::radio('purpose_of_banking_service', 'day_to_day_business', 
											($account->why_open_account == 'day_to_day_business') ? True : False, 
											['id'=>'day_to_day_business']) !!}
											Day to day Business
										</label>							
									
										<label class="btn bg-light {{ ($account->exists && $account->why_open_account == 'for_payroll') ? 'active' : ''  }}" id="for_payroll">
											{!! Form::radio('purpose_of_banking_service', 'for_payroll', 
											($account->why_open_account == 'for_payroll') ? True : False
											, ['id'=>'for_payroll']) !!}									
											For Payroll
										</label>

										<label class="btn bg-light {{ ($account->exists && $account->why_open_account == 'other') ? 'active' : ''  }}" id="other">
											{!! Form::radio('purpose_of_banking_service', 'other', 
											($account->why_open_account == 'other') ? True : False
											, ['id'=>'other']) !!}	
											Other
										</label>
										{!! Form::hidden('purpose_of_banking_service_other_input', NULL, [
											'class'=>'form-control',
											'id'=>'purpose_of_banking_service_other_input']) !!}
										

									</div>
								</div>											
							</div>							
							<div class="form-row">
								<div class="form-group col-md-12">
									FATCA Certiﬁcation:
									<hr/>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12" id="radio-button">
									<label id="icheck">
										{!! Form::radio('is_us_person', 'yes', 
										($account->exists && $account->is_us_person =='yes') ? True : False, []) !!}									
										Yes, I am a United States (US) citizen, resident, permanent resident, green card 
										<span class="small-text">holder or US tax payer by reason of having substantial physical presence in the US or any other reason</span>
									</label>
									<label id="icheck">
										{!! Form::radio('is_us_person', 'no', 
										($account->exists && $account->is_us_person == 'no') ? True : False, []) !!}									
										No, I/we certify that I am not subject to U.S. backup withholding because: (a) I am/we are exempt from U.S. backup withholding, or (b) I/we have not been notiﬁed by the Internal Revenue Service (IRS)  that I am/we are subject to U.S. backup withholding as a result of a failure to report all interest or dividends,   or (c) the IRS has notiﬁed me that I am/we are no longer subject to U.S. backup withholding. I acknowledge and aware that I will notify to the bank within 30 days of any change to my status.
									</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::select('account_currency', ['usd'=>'USD', 'khmer'=>'Riel'], 'usd', ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::select('choose_account_type', [
										'saving-account'=>'Saving Account',
										'elite-account'=>'Elite Account',
										'current-account'=>'Current Account'], 'saving-account', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<p>Primary Banking Services Request(Multiple Choice) </p>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" id="radio-button">
									<label id="icheck">
										{!! Form::radio('primary_banking_request', 'mobile-banking', 
										($account->primary_bank_service_request == 'mobile-banking') ?  "checked" : '', []) !!}
										Mobile Banking (free)
									</label>
								</div>
								<div class="form-group col-md-6" id="radio-button">
									<label id="icheck">
										{!! Form::radio('primary_banking_request', 'internet-banking', 
										($account->primary_bank_service_request == 'internet-banking') ?  "checked" : '', []) !!}
										Internet Banking (free)
									</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6" id="radio-button">
									<label id="icheck">
										{!! Form::radio('primary_banking_request', 'debit-card', 
										($account->primary_bank_service_request == 'debit-card') ?  "checked" : '', []) !!}
										Debit Card
									</label>
								</div> 
								<div class="form-group col-md-6" id="radio-button">
									<label id="icheck">
										{!! Form::radio('primary_banking_request', 'credit-card', 
										($account->primary_bank_service_request == 'credit-card') ?  "checked" : '', []) !!}
										Credit Card
									</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
								</div>
							</div>
					{!! Form::close() !!}

				</div>
    		</div>
    	</div>
    </div>
@stop

@section('js')
	<script type="text/javascript" src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('vendors/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
	<script src="{{ asset('vendors/icheck/icheck.min.js') }}"></script>
	<script src="{{ asset('vendors/axios/dist/axios.min.js') }}"></script>
	<script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
	<script>
		jQuery.noConflict();
		(function( $ ) {
			$(function() {
				let custom_values = [100, 300, 800, 2000, 30000, 5000];
				var my_from = custom_values.indexOf(100);
		    	var my_to = custom_values.indexOf(800);
				$("#monthly_salary").ionRangeSlider({
			        skin: "flat",
			        type: "double",
			        grid: true,
			        from: my_from,
			        to: my_to,
			        values: custom_values,
			    });
			    $('#business_income').ionRangeSlider({
			    	skin: "flat",
			    	values: custom_values
			    });
			    $('#icheck input[type=radio]').iCheck({
				    checkboxClass: 'icheckbox_flat-red',
				    radioClass: 'iradio_flat-red'
				});
				$('#gender, #married_status, #nationality, #issuring_country, #province_id, #commune_id, #district_id, #village_id').select2();
				$('#date_of_birth').datepicker({
					dateFormat: 'd/m/yy',
					changeMonth: true,
      				changeYear: true,
      				defaultDate: "-18y",
				});

				$("#id_number").change(function(){
					let id_number = $('#id_number').val();
					let url = 'http://'+window.location.hostname+'/frontend/account/type/id_card-validate';
					hotValidateField(id_number,url);
				});

				$('#phone').change(function(){
					let phone_number = $('#phone').val();
					let url = 'http://'+window.location.hostname+'/frontend/account/type/phone-validate';
					hotValidateField(phone_number, url);
				});

				$('#email').change(function(){
					let email_address = $('#email').val();
					let url = 'http://'+window.location.hostname+'/frontend/account/type/email-validate';
					hotValidateField(email_address, url);
				});

				$('#province_id').change(function(){
					let url = 'http://'+window.location.hostname+'/frontend/ajax-request/district/'+$(this).val();
					let parent_selector = "#province_id";
					let selector = '#district_id';
					ajaxRequestObject(url, selector, parent_selector)
				});

				$('#district_id').change(function(){
					let url = 'http://'+window.location.hostname+'/frontend/ajax-request/commune/'+$(this).val();
					let parent_selector = "#district_id";
					let selector = '#commune_id';
					ajaxRequestObject(url, selector, parent_selector)
				});
				$('#commune_id').change(function(){
					let url = 'http://'+window.location.hostname+'/frontend/ajax-request/village/'+$(this).val();
					let selector = '#village_id';
					ajaxRequestObject(url, selector)
				});

				// Ajax Request province, district, commune

				function ajaxRequestObject(url, selector, parent_selector = '') {
					if($(parent_selector) == '#province_id'){
						$('#commune_id').empty();
						$('#village_id').empty();
					}else{
						if($(parent_selector) == '#district_id'){
							$('#village_id').empty();
						}
					}
					axios.post(url)
					.then(res=>{
						if(res.status === 200){
							$(selector).empty();
							$(selector).attr('disabled',false);
							$.each(res.data, function(i, value){
								$(selector).append($('<option>',{
									value:i,
									text:value
								}));
							});
						}
					});
				}

				function hotValidateField(value, url) {
					axios.post(url+'/'+value)
						.then(res=>{
							let return_data = res.data;
							if(return_data == false){
								Swal.fire({
									  title: 'Error!',
									  text: 'Do you want to continue',
									  type: 'error',
									  confirmButtonText: 'Cool'
									});
							}
						});
				}

				// Set checked attribute for employement-detail section
				$('.purpose_of_banking_service label').click(function(){
					let type = $('input[type=radio]');
					for(i=0; i< type.length; i++){
						if($(this).attr('id') == 'other'){
							$('#purpose_of_banking_service_other_input').attr('type',''); 
							$('#purpose_of_banking_service_other_input').attr('autofocus','autofocus'); 
							$('#purpose_of_banking_service_other_input').focus();
						}else{
							$('#purpose_of_banking_service_other_input').attr('type','hidden');
						}
						if($(type[i]).attr('id') == $(this).attr('id')){
							$(type[i]).attr('checked', true);
						}else{						
							$(type[i]).attr('checked', false);
						}					
					}
				});
				$('#employement_detail #radio-button .btn').click(function(){
					let type = $('input[type=radio]');
					for(i=0; i< type.length; i++){
						if($(type[i]).attr('id') == $(this).attr('id')){
							$(type[i]).attr('checked', true);
						}else{						
							$(type[i]).attr('checked', false);
						}					
					}

				});					
				
				
			});
		})(jQuery);		
	</script>
@stop 