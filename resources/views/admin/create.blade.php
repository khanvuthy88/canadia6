@extends('adminlte::page')

@section('title', 'Accounts')

@section('content_header')
	<div class="clearfix"></div>
    <h1>Account</h1>
    <button class="btn btn-primary">
    	<a href="{{ route('dashbaord-account-create') }}">Add New account</a>
    </button>
@stop

@section('content')
    <div class="row">
    	<div class="col-xs-12">
    		<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Accounts</h3>					
				</div>
				<div class="box-body">

					<table id="table_id" class="display table table-bordered table-striped dataTable">
					    <thead>
					        <tr class="row">
					            <th class="text-center">First name</th>
					            <th class="text-center">Family name</th>
					            <th class="text-center">Phone</th>
					            <th class="text-center">Account PIN</th>
					            <th class="text-center">Actions</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($accounts as $account)
					    		<tr class="row">
					    			<td>{{ $account->first_name }}</td>
					    			<td>{{ $account->family_name }}</td>
					    			<td>{{ $account->phone }}</td>
					    			<td>{{ $account->acc_pin_number }}</td>
					    			<td>
					    				<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-secondary">Edit</button>
											<button type="button" class="btn btn-primary">Show</button>
											<button type="button" class="btn btn-danger">Delete</button>
										</div>
					    			</td>
					    	@endforeach						        
					    </tbody>
					</table>

				</div>
    		</div>
    	</div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}"> --}}
@stop

@section('js')
	<script>
		$(function(){
			$('#table_id').DataTable({
				'paging'      : true,
				'lengthChange': true,
				'searching'   : true,
				'ordering'    : true,
			});

		});
	</script>
    {{-- <script> console.log('Hi!'); </script> --}}
@stop