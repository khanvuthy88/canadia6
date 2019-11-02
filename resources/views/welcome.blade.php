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
		<div id="dialy_need_accounts" class="tab-pane slide show active account-daily-needs">
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
								<button class="btn btn-primary btn-canadia">Learn more</button>
							</div>
						</div>
					</div> 
					<div class="col-md-4 col-sm-12 mb-3">
						<div class="card">
							<img src="/../images/icons/cnb-join-current-icon.svg" class="card-img-top"> 
							<div class="card-body">
								<h1>Elite Account</h1> 
								<p>Our traditional bank account to help manage your daily financial needs. Enjoy easy payments or transfers whether in Cambodia or overseas 24/7.</p> 
								<button class="btn btn-primary btn-canadia">Learn more</button>
							</div>
						</div>
					</div> 
					<div class="col-md-4 col-sm-12 mb-3">
						<div class="card">
							<img src="/../images/icons/cnb-join-current-plus-icon.svg" class="card-img-top"> 
							<div class="card-body">
								<h1>Current Account</h1> 
								<p>Get the maximum value from your daily activity and earn 0.45% p.a. interest on top of your balance.</p> 
								<button class="btn btn-primary btn-canadia">Learn more</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div id="accounts_grouw" class="tab-pane slide acc account-fixed-deposit" aria-labelledby="accounts_grouw">
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
	                            <button class="btn btn-primary secondary-background">Learn more</button>
	                        </div>
	                    </div>
	                </div>                
	            </div>
	        </div>
		</div>		
	</div>	
</div>
</section>
@endsection
