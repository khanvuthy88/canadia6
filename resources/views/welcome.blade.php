@extends('layouts.app')

@section('content')
<section id="intro">
    {{-- <intro-component></intro-component> --}}
    <div class="intro">	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="wrapper">
						<h1 class="text-center text-white">Accounts for Daily Needs</h1> 
						<p class="text-center text-white">
							Find out more about our range of current and savings accounts for your daily needs.
						</p> 
						<button class="btn btn-canadia text-center text-white">
							<a id="create-account" @click.prevent="gotoSection('#accounts')">Choose account type</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="account-types">
			<div class="type clearfix">
				<div class="background-image-1"></div>
				<div class="content type-1">
					<div class="wrapper">
						<h2 class="mb-4">Accounts for Daily Needs</h2> 
						<p class="mb-4">Find out more about our range of current and savings accounts for your daily needs.</p> 
						<button data-toggle="tab" class="btn-canadia btn text-white" id="button_dialy_need_account" data-link="home-tab">
							discover
						</button>
					</div>
				</div>
			</div>
			<div class="type clearfix">
				<div class="background-image-2"></div>
				<div class="content type-2">
					<div class="wrapper">
						<h2 class="mb-4">Accounts to Grow Your Money</h2> 
						<p class="mb-4">Find out more about our range of current and savings accounts for your daily needs.</p> 
						<button data-toggle="tab" class="btn-canadia btn text-white" id="button_account_grouw" data-link="accounts_grouw_tab">
							discover
						</button>
					</div>
				</div>
			</div>
		</div>
<section id="accounts">
    {{-- <account-type-component></account-type-component> --}}
    <ul class="nav nav-tabs" id="account-types" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" onclick="to_elementby_id('home-tab')" id="home-tab" data-toggle="tab" href="#dialy_need_accounts" role="tab" aria-controls="home" aria-selected="true">Accounts for Daily Needs</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="accounts_grouw_tab" onclick="to_elementby_id('accounts_grouw_tab')" data-toggle="tab" href="#accounts_grouw" role="tab" aria-controls="profile" aria-selected="false">Accounts to Grow Your Money</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
    <div class="tab-content accounts tab-pane fade show active" id="myTabContent" role="tabpanel" aria-labelledby="home-tab">
		<div id="dialy_need_accounts" class="tab-pane fade show active account-daily-needs">
			<div class="container">
				<div class="row">
	                <div class="col-md-12">
	                    <h1 class="text-center mt-3 mb-5 text-white">Accounts for Daily Needs</h1>
	                </div>
	            </div>
				<div class="row">
					<div class="col-md-4 col-sm-12 mb-3">
						<div class="card">
							<img src="/../images/icons/cnb-join-saving-icon.svg" class="card-img-top"> 
							<div class="card-body">
								<h1>Savings Account</h1> 
								<p>Our most popular bank account that helps you reach saving goal with 0.45% p.a. interest rate when you regularly save each month.</p> 
								<button class="btn btn-primary btn-canadia" data-toggle="modal" data-target="#saving_account_modal">Learn more</button>
							</div>
						</div>
					</div> 
					<div class="col-md-4 col-sm-12 mb-3">
						<div class="card">
							<img src="/../images/icons/cnb-join-current-icon.svg" class="card-img-top"> 
							<div class="card-body">
								<h1>Elite Account</h1> 
								<p>Our traditional bank account to help manage your daily financial needs. Enjoy easy payments or transfers whether in Cambodia or overseas 24/7.</p> 
								<button class="btn btn-primary btn-canadia" data-toggle="modal" data-target="#elite_account_modal">Learn more</button>
							</div>
						</div>
					</div> 
					<div class="col-md-4 col-sm-12 mb-3">
						<div class="card">
							<img src="/../images/icons/cnb-join-current-plus-icon.svg" class="card-img-top"> 
							<div class="card-body">
								<h1>Current Account</h1> 
								<p>Get the maximum value from your daily activity and earn 0.45% p.a. interest on top of your balance.</p> 
								<button class="btn btn-primary btn-canadia" data-toggle="modal" data-target="#current_account_modal">Learn more</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div id="accounts_grouw" class="tab-pane fade acc account-fixed-deposit" aria-labelledby="accounts_grouw">
			<div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <h1 class="text-center mt-3 mb-5 text-white">Accounts to Grow Your Money</h1>
	                </div>
	            </div>
	            <div class="row">	                
	                <div class="col-md-6 col-sm-12 mt15">
	                    <div class="card">
	                        <img class="card-img-top" src="/../images/icons/cnb-join-fixed-deposit.svg">
	                        <div class="card-body">
	                            <h1>Fixed Deposit</h1>
	                            <p>Make your money work hard for you and get high return of up to 4.75% p.a. on your savings. You can choose the term of the deposit between 1 month and 2 years.</p>
	                            <button class="btn btn-primary secondary-background" data-toggle="modal" data-target="#fixed_deposit_account_modal">Learn more</button>
	                        </div>
	                    </div>
	                </div>                
	            </div>
	        </div>
		</div>		
	</div>	
</div>

{{-- Bootstrap Modal for each account --}}

<div class="modal fade" id="saving_account_modal" tabindex="-1" role="dialog" aria-labelledby="Saving Account" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			{!! Form::open([
					'route'=>['frontend-account-create','saving-account'],
					'id'=>'account_form_model'
				]) 
			!!}				
				<div class="modal-body">
					<ul class="nav nav-tabs shadow-sm">
						<li><a class="active" data-toggle="tab" href="#current_plus_feature">Main Features</a></li>
						<li><a data-toggle="tab" href="#current_plus_condition">Conditions</a></li>
						<li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
					</ul>

					<div class="tab-content">
						<div id="current_plus_feature" class="tab-pane fade show in active">
		                    <table class="table account-feature">
		                        <tbody>
		                            <tr>
		                                <td><img src="/../images/icons/1.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >No monthly service fee</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/2.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >0.45% p.a. of interest</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/5.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Deposit and withdrawal anytime</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/4.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Free iBanking & Mobile App</td>
		                            </tr>
		                        </tbody>
		                    </table>		                   
						</div>
						<div id="current_plus_condition" class="tab-pane fade">
		                    <table class="table account-condition">
		                        <tbody>
		                            <tr>
		                                <td>Account eligibility</td>
		                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
		                            </tr>
		                            <tr>
		                                <td>Currency</td>
		                                <td>USD, KHR</td>
		                            </tr>
		                            <tr>
		                                <td>Minimum opening and ongoing balance</td>
		                                <td>USD 10*</td>
		                            </tr>
		                            <tr>
		                                <td>Interest rate</td>
		                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
		                            </tr>
		                            <tr>
		                                <td>Interest payment</td>
		                                <td>Semi-annually or upon account closure</td>
		                            </tr>
		                            <tr>
		                                <td>Monthly account service</td>
		                                <td>Free</td>
		                            </tr>
		                            <tr>
		                                <td>Access to account</td>
		                                <td>
		                                    <ul>
		                                        <li>Canadia Bank branches</li>
		                                        <li>Cash-In kiosks</li>
		                                        <li>ATM</li>
		                                        <li>Internet Banking</li>
		                                        <li>Mobile Banking</li>
		                                        <li>UnionPay Card / MasterCard / Visa Card</li>
		                                    </ul>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
		                            </tr>
		                        </tbody>
		                    </table>
		               	</div>
	               	</div>
				</div>
					<div class="modal-footer">												
						<label>
							{!! Form::radio('agree_condition', 'saving_account_modal', false, ['required'=>true]) !!}
							I agree to ABA Bank's&nbsp;<a href="https://www.ababank.com/fileadmin/user_upload/FA_General_Term_and_Conditions_final_English.pdf" title="Opens external link in new window" target="_blank" class="external-link-new-window">Terms and Conditions</a>
						</label>						
					{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}					
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="modal fade" id="elite_account_modal" tabindex="-1" role="dialog" aria-labelledby="Elite Account" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			{!! Form::open([
					'route'=>['frontend-account-create','elite-account'],
					'id'=>'account_form_model'
				]) 
			!!}				
				<div class="modal-body">
					<ul class="nav nav-tabs shadow-sm">
						<li><a class="active" data-toggle="tab" href="#elite_plus_feature">Main Features</a></li>
						<li><a data-toggle="tab" href="#elite_plus_condition">Conditions</a></li>
						<li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
					</ul>

					<div class="tab-content">
						<div id="elite_plus_feature" class="tab-pane fade show in active">
		                    <table class="table account-feature">
		                        <tbody>
		                            <tr>
		                                <td><img src="/../images/icons/1.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >No monthly service fee</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/2.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >0.45% p.a. of interest</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/5.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Deposit and withdrawal anytime</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/4.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Free iBanking & Mobile App</td>
		                            </tr>
		                        </tbody>
		                    </table>		                   
						</div>
						<div id="elite_plus_condition" class="tab-pane fade">
		                    <table class="table account-condition">
		                        <tbody>
		                            <tr>
		                                <td>Account eligibility</td>
		                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
		                            </tr>
		                            <tr>
		                                <td>Currency</td>
		                                <td>USD, KHR</td>
		                            </tr>
		                            <tr>
		                                <td>Minimum opening and ongoing balance</td>
		                                <td>USD 10*</td>
		                            </tr>
		                            <tr>
		                                <td>Interest rate</td>
		                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
		                            </tr>
		                            <tr>
		                                <td>Interest payment</td>
		                                <td>Semi-annually or upon account closure</td>
		                            </tr>
		                            <tr>
		                                <td>Monthly account service</td>
		                                <td>Free</td>
		                            </tr>
		                            <tr>
		                                <td>Access to account</td>
		                                <td>
		                                    <ul>
		                                        <li>Canadia Bank branches</li>
		                                        <li>Cash-In kiosks</li>
		                                        <li>ATM</li>
		                                        <li>Internet Banking</li>
		                                        <li>Mobile Banking</li>
		                                        <li>UnionPay Card / MasterCard / Visa Card</li>
		                                    </ul>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
		                            </tr>
		                        </tbody>
		                    </table>
		               	</div>
	               	</div>
				</div>
					<div class="modal-footer">												
						<label>
							{!! Form::radio('agree_condition', 'saving_account_modal', false, ['required'=>true]) !!}
							I agree to ABA Bank's&nbsp;<a href="https://www.ababank.com/fileadmin/user_upload/FA_General_Term_and_Conditions_final_English.pdf" title="Opens external link in new window" target="_blank" class="external-link-new-window">Terms and Conditions</a>
						</label>						
					{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}					
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="modal fade" id="current_account_modal" tabindex="-1" role="dialog" aria-labelledby="Current Account" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			{!! Form::open([
					'route'=>['frontend-account-create','current-account'],
					'id'=>'account_form_model'
				]) 
			!!}				
				<div class="modal-body">
					<ul class="nav nav-tabs shadow-sm">
						<li><a class="active" data-toggle="tab" href="#current__plus_feature">Main Features</a></li>
						<li><a data-toggle="tab" href="#current__plus_condition">Conditions</a></li>
						<li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
					</ul>

					<div class="tab-content">
						<div id="current__plus_feature" class="tab-pane fade show in active">
		                    <table class="table account-feature">
		                        <tbody>
		                            <tr>
		                                <td><img src="/../images/icons/1.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >No monthly service fee</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/2.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >0.45% p.a. of interest</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/5.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Deposit and withdrawal anytime</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/4.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Free iBanking & Mobile App</td>
		                            </tr>
		                        </tbody>
		                    </table>		                   
						</div>
						<div id="current__plus_condition" class="tab-pane fade">
		                    <table class="table account-condition">
		                        <tbody>
		                            <tr>
		                                <td>Account eligibility</td>
		                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
		                            </tr>
		                            <tr>
		                                <td>Currency</td>
		                                <td>USD, KHR</td>
		                            </tr>
		                            <tr>
		                                <td>Minimum opening and ongoing balance</td>
		                                <td>USD 10*</td>
		                            </tr>
		                            <tr>
		                                <td>Interest rate</td>
		                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
		                            </tr>
		                            <tr>
		                                <td>Interest payment</td>
		                                <td>Semi-annually or upon account closure</td>
		                            </tr>
		                            <tr>
		                                <td>Monthly account service</td>
		                                <td>Free</td>
		                            </tr>
		                            <tr>
		                                <td>Access to account</td>
		                                <td>
		                                    <ul>
		                                        <li>Canadia Bank branches</li>
		                                        <li>Cash-In kiosks</li>
		                                        <li>ATM</li>
		                                        <li>Internet Banking</li>
		                                        <li>Mobile Banking</li>
		                                        <li>UnionPay Card / MasterCard / Visa Card</li>
		                                    </ul>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
		                            </tr>
		                        </tbody>
		                    </table>
		               	</div>
	               	</div>
				</div>
					<div class="modal-footer">												
						<label>
							{!! Form::radio('agree_condition', 'saving_account_modal', false, ['required'=>true]) !!}
							I agree to ABA Bank's&nbsp;<a href="https://www.ababank.com/fileadmin/user_upload/FA_General_Term_and_Conditions_final_English.pdf" title="Opens external link in new window" target="_blank" class="external-link-new-window">Terms and Conditions</a>
						</label>						
					{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}					
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="modal fade" id="fixed_deposit_account_modal" tabindex="-1" role="dialog" aria-labelledby="Fixed Deposit" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			{!! Form::open([
					'route'=>['frontend-account-create','fixed-deposit'],
					'id'=>'account_form_model'
				]) 
			!!}				
				<div class="modal-body">
					<ul class="nav nav-tabs shadow-sm">
						<li><a class="active" data-toggle="tab" href="#fixed_deposit_plus_feature">Main Features</a></li>
						<li><a data-toggle="tab" href="#fixed_deposit_plus_condition">Conditions</a></li>
						<li style="position: absolute;right: 0px;"><button type="button" class="close" data-dismiss="modal">&times;</button></li>
					</ul>

					<div class="tab-content">
						<div id="fixed_deposit_plus_feature" class="tab-pane fade show in active">
		                    <table class="table account-feature">
		                        <tbody>
		                            <tr>
		                                <td><img src="/../images/icons/1.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >No monthly service fee</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/2.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >0.45% p.a. of interest</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/5.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Deposit and withdrawal anytime</td>
		                            </tr>
		                            <tr>
		                                <td><img src="/../images/icons/4.png" style="max-width: 38px; margin: 0px; padding: 0px;"></td>
		                                <td >Free iBanking & Mobile App</td>
		                            </tr>
		                        </tbody>
		                    </table>		                   
						</div>
						<div id="fixed_deposit_plus_condition" class="tab-pane fade">
		                    <table class="table account-condition">
		                        <tbody>
		                            <tr>
		                                <td>Account eligibility</td>
		                                <td>Be at least 15 years old for Cambodian citizen and 18 years old for foreigner</td>
		                            </tr>
		                            <tr>
		                                <td>Currency</td>
		                                <td>USD, KHR</td>
		                            </tr>
		                            <tr>
		                                <td>Minimum opening and ongoing balance</td>
		                                <td>USD 10*</td>
		                            </tr>
		                            <tr>
		                                <td>Interest rate</td>
		                                <td>USD 0.45% p.a., KHR 1.00% p.a.</td>
		                            </tr>
		                            <tr>
		                                <td>Interest payment</td>
		                                <td>Semi-annually or upon account closure</td>
		                            </tr>
		                            <tr>
		                                <td>Monthly account service</td>
		                                <td>Free</td>
		                            </tr>
		                            <tr>
		                                <td>Access to account</td>
		                                <td>
		                                    <ul>
		                                        <li>Canadia Bank branches</li>
		                                        <li>Cash-In kiosks</li>
		                                        <li>ATM</li>
		                                        <li>Internet Banking</li>
		                                        <li>Mobile Banking</li>
		                                        <li>UnionPay Card / MasterCard / Visa Card</li>
		                                    </ul>
		                                </td>
		                            </tr>
		                            <tr>
		                                <td colspan="2">*Minimum opening balance of USD 50 for non-resident customer</td>
		                            </tr>
		                        </tbody>
		                    </table>
		               	</div>
	               	</div>
				</div>
					<div class="modal-footer">												
						<label>
							{!! Form::radio('agree_condition', 'saving_account_modal', false, ['required'=>true]) !!}
							I agree to ABA Bank's&nbsp;<a href="https://www.ababank.com/fileadmin/user_upload/FA_General_Term_and_Conditions_final_English.pdf" title="Opens external link in new window" target="_blank" class="external-link-new-window">Terms and Conditions</a>
						</label>						
					{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}					
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

</section>
@endsection

@section('script')
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('#saving_account_modal, #elite_account_modal, #current_account_modal, #fixed_deposit_account_modal').on('hidden.bs.modal', function (e) {
			  $('ul li a').attr('class','');
			})
			$('#saving_account_modal, #elite_account_modal, #current_account_modal, #fixed_deposit_account_modal').on('show.bs.modal', function(e){
				$('ul li:first-child a').addClass("active");
				$('#current_plus_feature').addClass(' active show');
				console.log(e.target.id);
			});
		});
	</script>
@endsection
