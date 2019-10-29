@extends('layouts.app')
@section('custom-style')
	<style type="text/css">
		.account-created-success{
			margin: 50px auto;
		}
		.account-created-success img{
			text-align: center;
		    max-width: 50px;
		    display: block;
		    margin: 10px auto;
		}
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="account-created-success">
					<h1 class="text-center">Thank You</h1>
					<img src="{{ asset('images/icons/check.svg') }}">
					<h4 class="text-center">Application Completed </h4>
					<p class="text-center">Your application number</p>
					<h1 class="text-center text-danger font-weight-bold">{{ $account_code }}</h1>
					<p class="text-center">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euiquam erat volutpat
						{{ $primary_banking_request }}
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection