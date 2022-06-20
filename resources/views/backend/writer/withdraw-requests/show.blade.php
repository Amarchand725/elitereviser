@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Payment issued details</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Payment issued details</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h4 class="m-t-0 text-info"></h4>
							</div>
							<div class="spark-chart">
								<div id="monthchart"></div>
							</div>
						</div>
						<div class="">
							<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Payment issued details</h4>
						<div class="table-responsive">
							<div class="container">
								<table class="table">
									<tr>
										<td>Amount</td>
										<td>${{ number_format($model->amount) }}.0</td>
									</tr>
									<tr>
										<td>Account Title</td>
										<td>{{ $model->account_title }}</td>
									</tr>
									<tr>
										<td>Account No</td>
										<td>{{ $model->account_no }}</td>
									</tr>
									<tr>
										<td>Bank</td>
										<td>{{ $model->bank }}</td>
									</tr>
									<tr>
										<td>Bank Branch</td>
										<td>{{ $model->account_branch }}</td>
									</tr>
									<tr>
										<td>Issue Date</td>
										<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>Sent Successfully</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
		$( "#actual-price" ).keyup(function() {
			var percent = parseInt($('#commission-percent').val());
			var actual_price = $(this).val();
			var admin_charges = actual_price*percent/100;
			var retail_price = parseInt(actual_price)+parseInt(admin_charges);
			if(actual_price==''){
				$('#retail_price').val(0);
			}else{
				$('#retail_price').val(retail_price);
			}
		})

		$('#discount').keyup(function(){
			var percent = parseInt($('#commission-percent').val());
			var discount = $(this).val();
			var actual_price = $('#actual-price').val();
			if(discount != ''){
				var final_actual_price = parseInt(actual_price)-parseInt(discount);
				var admin_charges = final_actual_price*percent/100;
				var retail_price = parseInt(final_actual_price)+parseInt(admin_charges);
			}else{
				var admin_charges = actual_price*percent/100;
				var retail_price = parseInt(actual_price)+parseInt(admin_charges);
			}
			
			if(actual_price==''){
				$('#retail_price').val(0);
			}else{
				$('#retail_price').val(retail_price);
			}
		});

		$('#free').click(function() {
			var checked = $(this).prop('checked');
			if(checked==true){
				$('#actual-price').val(0);
				$('#retail_price').val(0);
				$('#discount').val(0);
			}
		});
	</script>
@endsection
