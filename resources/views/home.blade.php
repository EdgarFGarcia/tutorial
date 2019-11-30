@extends('welcome')

@section('title', 'Home Page')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<label>Customer List</label>
				<div id="listscustomer"></div>
			</div>
			<div class="col-md-3">
				<label>Adding Customer</label>
				<div class="col-md-6">
					<label for="fullname">Fullname</label>
					<input type="text" class="form-control" id="fullname"/>
				</div>
				<div class="col-md-6">
					<label for="email">Email Address</label>
					<input type="email" class="form-control" id="email"/>
				</div>
				<br/>
				<button class="btn btn-primary" id="addCustomer">Add Customer</button>
			</div>
			<div class="col-md-3">
				<label>Editing Customer</label>

			</div>
			<div class="col-md-3">
				<label>Deleting Customer</label>

			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){

			getCustomerLists();

			$(document).on('click', '#addCustomer', function(){

				var fullname = $('#fullname').val();
				var email = $('#email').val();

				$.ajax({
					// Javascript object notation
					dataType: "json",
					url: "{{ url('api/addCustomer') }}",
					type: "post",
					data: {
						fullnameKey: fullname,
						emailKey: email
					}
				}).done(function(output){
					if(output.response){
						alert(output.message);
						$('#fullname').val('');
						$('#email').val('');
						getCustomerLists();
					}
				});
				
			});
		});

		function getCustomerLists(){
			$.ajax({
				type: "get",
				url: "{{ url('api/getCustomersList') }}",
				dataType: "json"
			}).done(function(output){
				$('#listscustomer').empty();
				$('#listscustomer').append(output.content);
			});
		}

	</script>
@endsection