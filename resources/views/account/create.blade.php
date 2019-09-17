@extends('layouts.app')
@section('custom-style')
	<style type="text/css">
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
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none; 
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		/* Mark the active step: */
		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}
		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
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
			<div class="tab">
				<div class="headline_block">
					<h1>Your information</h1>
					<h3>Tell us about your self</h3>
				</div>
				<div class="container">					
					<div class="row">
						<div class="col-md-12">
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('gender', NULL, []) !!}
									{!! Form::select('gender', ['m'=>'Male','f'=>'Female'], 'm', ['class'=>'form-control']) !!}
								</div>
								<div class="col-md-6 form-group">
									{!! Form::label('married_status', NULL, []) !!}
									{!! Form::text('married_status', NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									{!! Form::label('first_name', NULL, []) !!}
									{!! Form::text('first_name', NULL, ['class'=>'form-control']) !!}
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
									{!! Form::label('nationality', NULL, []) !!}
									{!! Form::select('nationality', $countryArray, NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									{!! Form::label('country_of_birth', NULL, []) !!}
									{!! Form::select('country_of_birth', $countryArray, NULL, ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="button_block">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-canadia text-white" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
							<button type="button" class="btn btn-canadia text-white" id="nextBtn" onclick="nextPrev(1)">Next</button>
						</div>
						<div class="col-md-12">
							<div style="text-align:center;margin-top:40px;">
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

		{!! Form::close() !!}
	</section>
@endsection

@section('script')
	<script type="text/javascript">
		var currentTab = 0;
		showTab(currentTab);
		function showTab(n) {
		  var x = document.getElementsByClassName("tab");
		  x[n].style.display = "block";
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
		  fixStepIndicator(n)
		}

		function nextPrev(n) {
		  var x = document.getElementsByClassName("tab");
		  if (n == 1 && !validateForm()) return false;
		  x[currentTab].style.display = "none";
		  currentTab = currentTab + n;
		  if (currentTab >= x.length) {
		    document.getElementById("regForm").submit();
		    return false;
		  }
		  showTab(currentTab);
		}

		function validateForm() {
		  var x, y, i, valid = true;
		  x = document.getElementsByClassName("tab");
		  y = x[currentTab].getElementsByTagName("input");
		  for (i = 0; i < y.length; i++) {
		    if (y[i].value == "") {
		      y[i].className += " invalid";
		      valid = false;
		    }
		  }

		  if (valid) {
		    document.getElementsByClassName("step")[currentTab].className += " finish";
		  }
		  return valid;
		}

		function fixStepIndicator(n) {
		  var i, x = document.getElementsByClassName("step");
		  for (i = 0; i < x.length; i++) {
		    x[i].className = x[i].className.replace(" active", "");
		  }
		  x[n].className += " active";
		}
		$(document).ready(function(){
			console.log('Yes laoded');
		});
	</script>
@endsection