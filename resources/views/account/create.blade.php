@extends('layouts.app')
@section('custom-style')
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/icheck/skins/flat/red.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert2/dist/sweetalert2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
	
	<style type="text/css">
		#source_of_income{
			width:100%;
		}
		#fronted-account {
		  /*background-color: #ffffff;*/
		  min-width: 300px;
		  background-color: #f8fafc;
		}
		/* Hide all steps by default: */
		.tab {
		  display: none;
		}
		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 13px;
    	  width: 13px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none; 
		  border-radius: 50%;
		  display: inline-block;
		  /*opacity: 0.5;*/
		}

		/* Mark the active step: */
		.step.active {
		  opacity: 1;
		  background-color: #F00;
		  border:#fff solid 3px;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #dc3b31;
		  border: 2px solid #ffffff;

		}
		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		  border: 1px solid red;
		}
		
	</style>
@endsection
@section('content')
	<section id="frontend-create-account">
		{!! Form::open([
				'route'=> ['frontend-account-type-create',$account],
				'method'=> 'post',
				"id"=>"fronted-account"
			]) !!}
			<div class="headline_block mb-5 text-center">
				<div class="block clearfix">
					<div id="icons_image" class="icon">
						<img id="icon" src="/../images/icons/user.svg">
					</div>
					<div class="content">
						<div id="head_title_name0">
							<h1 >Let's Get Started</h1>
						</div>
						<div class="col-md-12">								
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
						</div>
					</div>
				</div>					
			</div>	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab">
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('first_name', NULL, []) !!}
									{!! Form::text('first_name', NULL, ['class'=>'form-control','required'=>'required']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('family_name', NULL, []) !!}
									{!! Form::text('family_name', NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('date_of_birth', NULL, []) !!}
									{!! Form::date('date_of_birth', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}									
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('gender', NULL, []) !!}
									{!! Form::select('gender', [
										'M'=>'Male',
										'F'=>'Female',
										'U'=>'Unknown'
										], 'M', ['class'=>'form-control']) !!}
								</div>								
							</div>
							
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('married_status', NULL, []) !!}
									{!! Form::select('married_status', 
										[
											'SINGLE'=>'Single',
											'MARRIED'=>'Married',
											'OTHER'=>'Other'
										],'SINGLE', ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('place_of_birth', NULL, []) !!}
									{!! Form::select('place_of_birth', $countryArray, 'KH', ['class'=>'form-control']) !!}
								</div>								
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('nationality', NULL, []) !!}
									{!! Form::select('nationality', $countryArray, 'KH', ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('country_of_birth', NULL, []) !!}
									{!! Form::select('country_of_birth', $countryArray, 'KH', ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="tab">
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('type_legal', NULL, []) !!}
									{!! Form::select('type_legal', ['id_card'=>'National ID','passport'=>'Passport'], 'id_card', ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('issuring_country', NULL, []) !!}
									{!! Form::select('issuring_country', $countryArray, 'KH', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('ID Number', NULL, []) !!}
									{!! Form::text('id_number', NULL, ['class'=>'form-control','id'=>'id_number']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('issued_date', NULL, []) !!}
									{!! Form::date('issued_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('expiry_date', NULL, []) !!}
									{!! Form::date('expiry_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>
						
						<div class="tab">
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('house_number(Optional)', NULL, []) !!}
									{!! Form::text('house_number', NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-3 form-group">
									{!! Form::label('street(Optional)', NULL, []) !!}
									{!! Form::text('street', NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-3 form-group">
									{!! Form::label('group(Optional)', NULL, []) !!}
									{!! Form::text('group', NULL, ['class'=>'form-control','placeholder'=>'N/A']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('province', NULL, []) !!}
									{!! Form::select('province_id', $provinceArray, NULL, [
										'class'=>'form-control',
										'id'=>'province_id']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('district', NULL, []) !!}
									{!! Form::select('district_id', $default_district, NULL, [
										'class'=>'form-control',
										'id'=>'district_id']) !!}
									
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('commune', NULL, []) !!}
									{!! Form::select('commune_id', $default_commune, NULL, [
										'class'=>'form-control', 
										'id'=>'commune_id']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('village', NULL, []) !!}
									{!! Form::select('village_id', $default_village, NULL, [
										'class'=>'form-control',
										'id'=>'village_id']) !!}
								</div>
							</div>
							<div class="form-row">
								
								<div class="form-group col-md-6">
									{!! Form::label('email', NULL, []) !!}
									{!! Form::text('email', NULL, ['class'=>'form-control','placeholder'=>'example: abc@gmail.com']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('phone', NULL, []) !!}
									{!! Form::text('phone', NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							
						</div>
						<div class="tab" id="employement_detail">
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('employement Status', NULL, []) !!}
									{!! Form::select('employement-detail',$employmentArray
									, NULL, ['class'=>'form-control','id'=>'employement-detail']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('Sub Employment', null, []) !!}
									<select id="sub_typoec" name="sub_typoec" class="form-control">
										<option value="6">Employed Government PEP</option>
										<option value="7">Employed Government Other</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group">
									{!! Form::text('other_sub_type', NULL, ['class'=>'form-control','id'=>'other_sub_type','placeholder'=>'Other Sub Employment','required'=>'required']) !!}
								</div>
							</div>
							<!-- <div class="form-row btn-group-toggle btn-group" id="radio-button" data-toggle="buttons">								
								<label class="btn bg-light active" id="emplyee">
									{!! Form::radio('employement-detail', 'emplyee', true, ['id'=>'emplyee']) !!}
									Employee
								</label>				
							
								<label class="btn bg-light" id="business-revenue">
									{!! Form::radio('employement-detail', 'business-revenue', false, ['id'=>'business-revenue']) !!}
									Business Revenue
								</label>							
							
								<label class="btn bg-light" id="personal-own-property">									
									{!! Form::radio('employement-detail', 'personal-own-property', false, ['id'=>'personal-own-property']) !!}
									Personal own property
								</label>							
							
								<label class="btn bg-light" id="other">
									{!! Form::radio('employement-detail', 'other', false, ['id'=>'other']) !!}
									Other
								</label>																
							</div> -->
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('institute_name', NULL, []) !!}
									{!! Form::text('institute_name', NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('Insitution address', NULL, []) !!}
									{!! Form::text('insitution_address', NULL, ['class'=>'form-control']) !!}
								</div>
								<!-- <div class="form-group col-md-6">
									{!! Form::label('occupation', NULL, []) !!}
									{!! Form::text('occupation', NULL, ['class'=>'form-control']) !!}
								</div> -->
							</div>
							<!-- <div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('Insitution address', NULL, []) !!}
									{!! Form::text('insitution_address', NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('Type of bussiness', NULL, []) !!}
									{!! Form::text('type_of_bussiness', NULL, ['class'=>'form-control']) !!}
								</div>
							</div>	 -->
							
							<div class="form-row">
								<div class="col-md-12">
									{!! Form::label('Primary Source of Income:', null, []) !!}
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('source_of_income', 'monthly_salary', true, []) !!}
									Salary
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('source_of_income', 'business-revenue', false, []) !!}
									Business Revenue
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('source_of_income', 'personal-own-property', false, []) !!}
									Personal own property
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('source_of_income', 'other', false, []) !!}
									Other
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group">
									{!! Form::label('Income Amount', null, []) !!}
									{!! Form::number('income-amount', null, ['class'=>'form-control']) !!}
								</div>
							</div>
							<!-- <div class="form-row">
								<div id="source_of_income"> 
									<div class="form-group col-md-12">				
										<label id="icheck">
											{!! Form::radio('source_of_income', 'monthly_salary', True, []) !!}
											Monthly Salary
										</label>
										{!! Form::text('monthly_salary', NULL, ['id'=>'monthly_salary']) !!}
									</div>
									<div class="form-group col-md-12">
										<label id="icheck">
											{!! Form::radio('source_of_income', 'business_monthly_income', False, []) !!}
											Business (Monthly income)
										</label>
										{!! Form::text('business_income', NULL, ['id'=>'business_income']) !!}
									</div>
								</div>
							</div>	 -->								
						</div>

						<div class="tab" id="purpose_of_banking_service">
							<div class="form-row">
								<div class="col-md-12 form-group">
									Purpose of Banking Service
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('purpose_of_banking_service', 'saving', true, ['class'=>'purpose_of_banking_service']) !!}
									Saving Account
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('purpose_of_banking_service', 'day_to_day_business', false, ['class'=>'purpose_of_banking_service']) !!}
									Day to day Business
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('purpose_of_banking_service', 'for_payroll', false, ['class'=>'purpose_of_banking_service']) !!}
									For Payroll
								</div>
								<div class="col-md-3 form-group" id="icheck">
									{!! Form::radio('purpose_of_banking_service', 'other', false, ['class'=>'purpose_of_banking_service']) !!}
									Other
								</div>
								<div class="col-md-12 form-group" id="icheck">
									{!! Form::text('purpose_of_banking_service_other_input', null, ['class'=>'form-control','id'=>'purpose_of_banking_service_other_input']) !!}
								</div>
							</div>
							<!-- <div class="form-row btn-group-toggle col-md-12 btn-group" data-toggle="buttons" id="reasons_group">
								<label class="btn bg-light active" id="emplyee">
									{!! Form::radio('purpose_of_banking_service', 'saving', True, ['id'=>'saving_account']) !!}
									Saving Account
								</label>				
							
								<label class="btn bg-light" id="day_to_day_business">
									{!! Form::radio('purpose_of_banking_service', 'day_to_day_business', False, ['id'=>'day_to_day_business']) !!}
									Day to day Business
								</label>							
							
								<label class="btn bg-light" id="for_payroll">
									{!! Form::radio('purpose_of_banking_service', 'for_payroll', False, ['id'=>'for_payroll']) !!}									
									For Payroll
								</label>												
							</div> -->
							<!-- <div class="form-row col-md-12" id="another_reason radio-button">
								<label class="btn" id="purpose_of_banking_service_other">
									<div id="icheck"> 
									{!! Form::radio('purpose_of_banking_service_other', 'other',false, ['id'=>'purpose_of_banking_service_other']) !!}									
									Other
									</div>
								</label>
								{!! Form::text('purpose_of_banking_service_other_input', NULL, ['class'=>'form-control']) !!}
							</div> -->
							<div class="form-row">
								<div class="form-group col-md-12">
									FATCA Certiﬁcation:
									<hr/>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12" id="radio-button">
									<label id="icheck">
										{!! Form::radio('is_us_person', 'yes', false, ['class'=>'is_us_person']) !!}									
										Yes USTIN: 
										{!! Form::text('is_us_person_yes', null, ['class'=>'form-control','id'=>'is_us_person_yes']) !!}, I am a United States (US) citizen, resident, permanent resident, green card 
										<span class="small-text">holder or US tax payer by reason of having substantial physical presence in the US or any other reason</span>
									</label>
								</div>
								<div class="form-group col-md-12" id="is_us_person_yes_code">
									{!! Form::select('is_us_person_yes_code', ["DNFFE"=>"Direct Reporting NFFE","SPUSP"=>"Specified U.S.Person ","ODFFI"=>"Owner-Documented FFI with specified U.S. owner(s)","NPFFI"=>"Non-Participating FFI","PASUS"=>"Passive NFFE with substantial U.S. owner(s)" ], NULL, ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-12">
									<label id="icheck">
										{!! Form::radio('is_us_person', 'no', true, ['class'=>'is_us_person']) !!}									
										No, I/we certify that I am not subject to U.S. backup withholding because: (a) I am/we are exempt from U.S. backup withholding, or (b) I/we have not been notiﬁed by the Internal Revenue Service (IRS)  that I am/we are subject to U.S. backup withholding as a result of a failure to report all interest or dividends,   or (c) the IRS has notiﬁed me that I am/we are no longer subject to U.S. backup withholding. I acknowledge and aware that I will notify to the bank within 30 days of any change to my status.
									</label>
								</div>
							</div>
						</div>

						<div class="tab" id="account_information">
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('Account Currency', null, []) !!}
									{!! Form::select('account_currency', 
									["KHR"=>"Khmer Riel (KHR)","USD"=>"Dollar (USD)","THB"=>"Thai (THB)","CNY"=>"CHINESE YUAN (RMB)"], 'KHR', ['class'=>'form-control']) !!}
								</div>
								<div class="form-group col-md-6">
									{!! Form::label('Account Types', NULL, []) !!}
									{!! Form::select('choose_account_type', [
										"6000"=>"Saving Account", "6010"=>"Junior Account", "1001"=>"Current Account", "1007"=>"Current Elite Account","6000-06"=>"Easy One Account","1002-1002.02"=>"Payroll Account","1002-1002.01"=>"RGC Account", "6003"=>"Wedding Account", "1008"=>"Premium Account"
										], '6000', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<p>Primary Banking Services Request(Multiple Choice) </p>
								</div>
								<div class="form-group col-md-6" id="icheck">
									{!! Form::checkbox('primary_banking_request[]', 'mobile-banking', true, []) !!}
									Mobile Banking (free)
								</div>
								<div class="form-group col-md-6" id="icheck">
									{!! Form::checkbox('primary_banking_request[]', 'internet-banking', false, []) !!}
									Internet Banking (free)
								</div>
								<div class="form-group col-md-6" id="icheck">
									{!! Form::checkbox('primary_banking_request[]', 'debit-card', false, []) !!}
									Debit Card
								</div>
								<div class="form-group col-md-6" id="icheck">
									{!! Form::checkbox('primary_banking_request[]', 'credit-card', false, []) !!}
									Credit Card
								</div>
							</div>							
						</div>

					</div>
					<div class="button_block">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn previous text-white" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
									<button type="button" class="btn next text-white" id="nextBtn" onclick="nextPrev(1)">Next</button>
								</div>									
							</div>
						</div>
					</div>

				</div>
			</div>	
			
		{!! Form::close() !!}
	</section>


@endsection

@section('script')
	<script src="{{ asset('vendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('vendors/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
	<script src="{{ asset('vendors/icheck/icheck.min.js') }}"></script>
	<script type="text/javascript">

		document.title = "Open Account";
		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab
		function showTab(n) {
			// This function will display the specified tab of the form ...
			var x = document.getElementsByClassName("tab");
			x[n].style.display = "block";
			// ... and fix the Previous/Next buttons:
			if (n == 0) {
				document.getElementById("prevBtn").style.display = "none";
			} else {
				document.getElementById("prevBtn").style.display = "inline";
			}
			if (n == (x.length - 1)) {
				document.getElementById("nextBtn").innerHTML = "Submit";
			} else {
				document.getElementById("nextBtn").innerHTML = "Next";
			}
			switch (n) {
				case 0:
					text = "<h1>Let's Get Started</h1>";
					img = "../../../../images/icons/user.svg";
					break;
				case 1:
					text = "<h1>Identify Information</h1>";
					img = "../../../../images/icons/id-card.svg";
					break;
				case 2:
					text = "<h1>Residential Address</h1>";
					img = "../../../../images/icons/home.svg";
					break;
				case 3:
					text = "<h1>Employement Detail</h1>";
					img = "../../../../images/icons/briefcase.svg";
					break;
				case 4:
					text = "<h1>Purpose of Banking Service</h1>";
					img = "../../../../images/icons/question-circle-solid.svg";
					break;
				case 4:
					text = "<h1>Purpose of Banking Service</h1>";
					img = "../../../../images/icons/question-circle-solid.svg";
					break;
				default:
					text = "<h1>Account Information</h1>";
					img = "../../../../images/icons/contract.svg"
			}
			document.getElementById('head_title_name0').innerHTML = text;
			document.getElementById('icon').src=img;
			// ... and run a function that displays the correct step indicator:
			fixStepIndicator(n)
		}

		function nextPrev(n) {
			// This function will figure out which tab to display
			var x = document.getElementsByClassName("tab");
			// Exit the function if any field in the current tab is invalid:
			if (n == 1 && !validateForm()) return false;
				// Hide the current tab:
				x[currentTab].style.display = "none";
				// Increase or decrease the current tab by 1:
				currentTab = currentTab + n;
				// if you have reached the end of the form... :
			if (currentTab >= x.length) {
				//...the form gets submitted:
				document.getElementById("fronted-account").submit();
				return false;
			}
			// Otherwise, display the correct tab:
			showTab(currentTab);
		}

		function validateForm() {
			// This function deals with validation of the form fields
			var x, y, i, valid = true;
			let dob_check = true;
			x = document.getElementsByClassName("tab");
			y = x[currentTab].getElementsByTagName("input");
			// A loop that checks every input field in the current tab:
			for (i = 0; i < y.length; i++) {
				// If a field is empty...
				if (y[i].value == "" && y[i].style.display != 'none') {
					// add an "invalid" class to the field:
					y[i].className += " invalid";
					// and set the current valid status to false:
					valid = false;
				}
			}
			// If the valid status is true, mark the step as finished and valid:
			if (valid) {
				document.getElementsByClassName("step")[currentTab].className += " finish";
			}
			return valid; // return the valid status
		}

		function fixStepIndicator(n) {
			// This function removes the "active" class of all steps...
			var i, x = document.getElementsByClassName("step");
			for (i = 0; i < x.length; i++) {
				x[i].className = x[i].className.replace(" active", "");
			}
			//... and adds the "active" class to the current step:
			x[n].className += " active";
		}

		$(document).ready(function(){
			var now = new Date();
			var date = new Date();
			var now_date = moment();
			let max_date = now.getFullYear-18;
			let custom_values = [100, 300, 800, 2000, 30000, 5000];
			// be careful! FROM and TO should be index of values array
		    var my_from = custom_values.indexOf(100);
		    var my_to = custom_values.indexOf(800);

		    let issued_date_10 = moment().subtract(10, 'y');
		    $('#issued_date').val(moment(issued_date_10).format("Y-MM-DD"));
		    $('#expiry_date').val("");

		    $('#other_sub_type, #purpose_of_banking_service_other_input, #is_us_person_yes, #is_us_person_yes_code').css('display','none');

			$("#datepicker").focusout(function(){
		         $('#datepicker').val('');
		    });
		    $('#issued_date').change(function(){
		    	let add_10_year = moment($(this).val()).add(10,'y');
		    	$('#expiry_date').val(moment(add_10_year).format("Y-MM-DD"));
		    });

		    $('#expiry_date').change(function(){
		    	let expire_date = $(this).val();
		    	let issued_date = $(this).val();
		    });

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
		    $('#icheck input[type=radio], #icheck input[type=checkbox]').iCheck({
			    checkboxClass: 'icheckbox_flat-red',
			    radioClass: 'iradio_flat-red'
			});
			// console.log(moment().diff(now,'years'));
			$("#datepicker").datepicker({ 
			        autoclose: true, 
			        todayHighlight: true,
			        onSelect: function(dateText) {
				        console.log("Selected date: " + dateText + "; input's current value: " + this.value);
				    }
			  }).datepicker('update', new Date());
			$('#datepicker').change(function(){
				let get_date = $('#date_of_birth').val();
				let url = 'http://'+window.location.hostname+'/frontend/account/type/dob-validate';
				hotValidateField(get_date, url);
			});
			$("#id_number").change(function(){
				let id_number = $('#id_number').val();
				let url = 'http://'+window.location.hostname+'/frontend/account/type/id_card-validate';
				let message = "ID Number already exist.";
				hotValidateField(id_number,url, message);
			});

			$('#phone').change(function(){
				let phone_number = $('#phone').val();
				let url = 'http://'+window.location.hostname+'/frontend/account/type/phone-validate';
				let message = "Phone Number already exist.";
				hotValidateField(phone_number, url, message);
			});

			$('#email').change(function(){
				let email_address = $('#email').val();
				let url = 'http://'+window.location.hostname+'/frontend/account/type/email-validate';
				let message = "Email address already exist.";
				hotValidateField(email_address, url, message);
			});

			$('#province_id').change(function(){
				let url = 'http://'+window.location.hostname+'/frontend/ajax-request/district/'+$(this).val();
				let parent_selector = "#province_id";
				let selector = '#district_id';
				$('#commune_id').empty();
				$('#village_id').empty();
				ajaxRequestObject(url, selector, parent_selector)
			});

			$('#district_id').change(function(){
				let url = 'http://'+window.location.hostname+'/frontend/ajax-request/commune/'+$(this).val();
				let parent_selector = "#district_id";
				let selector = '#commune_id';
				$('#village_id').empty();
				ajaxRequestObject(url, selector, parent_selector)
			});
			$('#commune_id').change(function(){
				let url = 'http://'+window.location.hostname+'/frontend/ajax-request/village/'+$(this).val();
				let selector = '#village_id';
				ajaxRequestObject(url, selector)
			});
			
			
			$('#employement-detail').change(function(){
				let url = 'http://'+window.location.hostname+'/frontend/ajax-request/employment/'+$(this).val();
				let selector = '#sub_typoec';
				let parent_selector = '#employement-detail';
				ajaxRequestObject(url, selector,parent_selector)
			});

			$('#sub_typoec').change(function(){
				let sub_type = $(this).val();
				let other = ['29','7', '16', '29', '48', '54']
				$.each(other, function(key, value){
					if(sub_type == value){
						$('#other_sub_type').css("display","block");
						return false;
					}else{
						$('#other_sub_type').empty();						
						$('#other_sub_type').css("display","none");
					}
				});
			});
			$('.purpose_of_banking_service').on('ifChecked', function(event){
				if($(this).val() == 'other'){
					$('#purpose_of_banking_service_other_input').css("display","block");
				}else{
					$('#purpose_of_banking_service_other_input').empty();					
					$('#purpose_of_banking_service_other_input').css("display","none");
				}
			});

			$('.is_us_person').on('ifChecked', function(event){
				if($(this).val() == 'yes'){
					$('#is_us_person_yes').css({
						'width':'155px',
						'height':'25px',
						'display':'inline'
					});
					$('#is_us_person_yes_code').css('display','block');	
				}else{
					$('#is_us_person_yes').empty();
					$('#is_us_person_yes, #is_us_person_yes_code').css('display','none');
				}
			});
			
			// Set checked attribute for employement-detail section
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
			// Set checked attribute for purpose_of_banking_service section
			$('#purpose_of_banking_service .btn').click(function(){
				let type = $("input[type=radio]");
				for(i=0; i < type.length; i++){
					if($(type[i]).attr('id') == $(this).attr('id')){
						$(type[i]).attr('checked', true);
					}else{
						$(type[i]).attr('checked', false);
					}
				}
			});

			// Ajax Request province, district, commune

			function ajaxRequestObject(url, selector, parent_selector = '') {
				if($(parent_selector) == '#province_id'){
					$('#commune_id').empty();
					$('#village_id').empty();
				}else{
					if($(parent_selector) == '#district_id'){
						$('#village_id').empty();
					}else{
						if($(parent_selector)== '#employement-detail'){
							$(selector).empty();
						}
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

			function hotValidateField(value, url, message = '') {
				axios.post(url+'/'+value)
					.then(res=>{
						let return_data = res.data;
						if(return_data == false){
							Swal.fire({
								  title: 'Error!',
								  text: message,
								  type: 'error',
								  confirmButtonText: 'OK'
								});

						}
					});
			}


		});
	</script>
@endsection