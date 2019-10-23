@extends('adminlte::page')

@section('title', 'Accounts')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-admin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/toastr/build/toastr.min.css') }}">
@endsection

@section('content_header')
	<div class="clearfix"></div>
    <h1 class="title">Account</h1>
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
											<button type="button" class="btn btn-secondary">
												<a href="{{ route('admin-account-edit',$account) }}">Edit</a></button>
											<button data-id="{{ $account->id }}"  type="button" class="btn btn-primary show_account_info " data-toggle="modal">Show</button>
											<button type="button" data-url="{{ route('admin-ajax-account-destroy',$account) }}" class="btn btn-danger destroy">Delete</button>
										</div>
					    			</td>
					    	@endforeach						        
					    </tbody>
					</table>
				</div>
    		</div>
    	</div>
    </div>

	<!-- Modal -->
	<div class="modal fade" id="show_account_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="account-name">Modal title</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table id="test_info" class="table table-responsive">
								<tr>
									<th>Gender</th>
									<td id="gender">Sample gender</td>
									<th>Married Status</th>
									<td id="married_status">Single</td>
								</tr>
								<tr>
									<th>First name</th>
									<td id="first_name"></td>
									<th>Family name</th>
									<td id="family_name"></td>
								</tr>
								<tr>
									<th>Date of birth</th>
									<td id="dob"></td>
									<th>Nationality</th>
									<td id="nationality"></td>
								</tr>
								<tr>
									<th>Type Legal</th>
									<td id="type_legal"></td>
									<th>Issuring Country</th>
									<td id="issuring_country"></td>
								</tr>
								<tr>
									<th>ID Number</th>
									<td id="id_number"></td>
									<th>Issued Date</th>
									<td id="issued_date"></td>
								</tr>
								<tr>
									<th>Expiry Date</th>
									<td id="expiry_date"></td>
									<th>House Number(Optional)</th>
									<td id="house_number"></td>
								</tr>
								<tr>
									<th>Street(Optional)</th>
									<td id="street"></td>
									<th>Province</th>
									<td id="province_id"></td>
								</tr>
								<tr>
									<th>District</th>
									<td id="district_id"></td>
									<th>Commune</th>
									<td id="commune_id"></td>
								</tr>
								<tr>
									<th>Village</th>
									<td id="village_id"></td>
									<th>Group(Optional)</th>
									<td id="group"></td>
								</tr>
								<tr>
									<th>Email(Optional)</th>
									<td id="email"></td>
									<th>Phone</th>
									<td id="phone"></td>
								</tr>
								<tr>
									<th>Professional situation</th>
									<td id="professional_situation"></td>
									<th>Institute name</th>
									<td id="institute_name"></td>
								</tr>
								<tr>
									<th>Occupation</th>
									<td id="position"></td>
									<th>Institute name</th>
									<td id="institute_name"></td>
								</tr>
								<tr>
									<th>Insitution Address</th>
									<td id="company_addresss"></td>
									<th>Type Of Bussiness</th>
									<td id="business_type"></td>
								</tr>
								<tr>
									<th>Source of income</th>
									<td id="source_of_income"></td>
									<th>Monthly income</th>
									<td id="monthly_income"></td>
								</tr>
								<tr>
									<th>Why open account ?</th>
									<td id="why_open_account"></td>
									<th>United States (US) citizen</th>
									<td id="is_us_person"></td>
								</tr>
								<tr>
									<th>Account currency</th>
									<td id="acc_currency"></td>
									<th>Account type</th>
									<td id="acc_type"></td>
								</tr>
								<tr>
									<th>Primary Banking Services Request</th>
									<td id="primary_bank_service_request"></td>
								</tr>
							</table>
						</div>
					</div>		
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}"> --}}
@stop

@section('js')
	<script src="{{ asset('vendors/axios/dist/axios.min.js') }}"></script>
	<script src="{{ asset('vendors/toastr/build/toastr.min.js') }}"></script>
	<script>
		$(function(){
			$('#table_id').DataTable({
				'paging'      : true,
				'lengthChange': true,
				'searching'   : true,
				'ordering'    : true,
			});

			$('.show_account_info').click(function(){
				let url = 'http://'+window.location.hostname+'/admin/account/ajax-admin/account-info/'+$(this).data('id');
				let selector = "#show_account_info";
				getAccountInfo(url, selector);
			});

			$('.destroy').click(function(){
				let url = $(this).data('url');
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
					showLoaderOnConfirm: true,
					preConfirm: function(result){
						return new Promise(function(resolve, reject){
							if(result){
								axios.post(url)
		                        .then(function(response){
		                            toastr.success('Succes');
		                            resolve();
		                        })
		                        .catch(function(error){
		                            toastr.error('Error ');
		                            console.log(error);
		                            reject();
		                        });
							}
						});
					},
					allowOutsideClick: () => !this.$swal.isLoading()
				}).then((result) => {
				  if (result.value) {
				    Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					)
				  }
				});
			});
		            

			function getAccountInfo(url, selector) {
				$('body > div').removeClass('pace-inactive');
				$('body > div').addClass('pace-active');
				axios.get(url)
					.then(res=>{
						if(res.status === 200){
							$('#account-name').text(res.data.full_name);
							$('#gender').text(res.data.gender);
							$('#married_status').text(res.data.married_status);
							$('#first_name').text(res.data.first_name);
							$('#family_name').text(res.data.family_name);
							$('#dob').text(res.data.dob);
							$('#nationality').text(res.data.nationality);
							$('#type_legal').text(res.data.type_legal);
							$('#issuring_country').text(res.data.issuring_country);
							$('#id_number').text(res.data.id_number);
							$('#issued_date').text(res.data.issued_date);
							$('#expiry_date').text(res.data.expiry_date);
							$('#house_number').text(res.data.house_number);
							$('#street').text(res.data.street);
							$('#province_id').text(res.data.province_id);
							$('#commune_id').text(res.data.commune_id);
							$('#district_id').text(res.data.district_id);
							$('#village_id').text(res.data.village_id);
							$('#email').text(res.data.email);
							$('#phone').text(res.data.phone);
							$('#professional_situation').text(res.data.professional_situation);
							$('#institute_name').text(res.data.company_name);
							$('#position').text(res.data.position);
							$('#source_of_income').text(res.data.source_of_income);
							$('#monthly_income').text(res.data.monthly_income);
							$('#business_type').text(res.data.business_type);
							$('#why_open_account').text(res.data.why_open_account);
							$('#is_us_person').text(res.data.is_us_person);
							$('#acc_currency').text(res.data.acc_currency);
							$('#acc_type').text(res.data.acc_type);
							$('#primary_bank_service_request').text(res.data.primary_bank_service_request);
							$('body > div').addClass('pace-inactive');
							$(selector).modal('show');
							console.log(res.data);
						}
					});
			}

		});
	</script>
@stop