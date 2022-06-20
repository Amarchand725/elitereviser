@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Show album details</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Show album details</li>
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
						<h4 class="card-title">Show album details</h4>
						<div class="table-responsive">
							<div class="container">
								<table class="table">
									<tr>
										<td>Type</td>
										<td>{{ $model->hasCategory->name }}</td>
									</tr>
									<tr>
										<td>Title</td>
										<td>{{ $model->song_title }}</td>
									</tr>
									<tr>
										<td>Sample</td>
										<td>
											<audio controls>
												<source src="{{ asset('songs/short_songs') }}/{{ $model->short_song }}" type="audio/ogg">
												Your browser does not support the audio tag.
											</audio>
										</td>
									</tr>
									<tr>
										<td>Full Song</td>
										<td>
											<audio controls>
												<source src="{{ asset('songs/short_songs') }}/{{ $model->full_song }}" type="audio/ogg">
												Your browser does not support the audio tag.
											</audio>
										</td>
									</tr>
									<tr>
										<td>Actual Price</td>
										<td>{{ $model->actual_price }}</td>
									</tr>
									<tr>
										<td>Discount</td>
										<td>{{ $model->discount }}</td>
									</tr>
									<tr>
										<td>Admin Charges {{ $commission }}%</td>
										<td>{{ $model->retail_price - $model->actual_price }}</td>
									</tr>
									<tr>
										<td>Retial Price</td>
										<td>{{ $model->retail_price }}</td>
									</tr>
									<tr>
										<td>Approved/Rejected By</td>
										<td>{{ $model->hasApprovedBy->name }}</td>
									</tr>
									<tr>
										<td>Approved/Rejected Date</td>
										<td>{{ date('d, M-Y', strtotime($model->updated_at)) }}</td>
									</tr>
									<tr>
										<td>Approved/Rejected</td>
										<td>
											@if($model->is_approved==0)
												<span class="label label-warning">Not Approved</span>
											@elseif($model->is_approved==1)
												<span class="label label-success">Approved</span>
											@else 
												<span class="label label-danger">Rejected</span>
											@endif
										</td>
									</tr>
									@if($model->is_approved==3)
										<tr>
											<td>Rejected Reason</td>
											<td>{{ $model->reason }}</td>
										</tr>
									@endif
									<tr>
										<td>Status</td>
										<td>
											@if($model->status==1)
												<span class="label label-success">Active</span>
											@else 
												<span class="label label-danger">In-active</span>
											@endif
										</td>
									</tr>
									@if($model->status==0)
										<tr>
											<td>In-Active Date</td>
											<td>{{ date('d, M-Y', strtotime($model->updated_at)) }}</td>
										</tr>
										<tr>
											<td>In-Active Reason</td>
											<td>{{ $model->status_reason }}</td>
										</tr>
									@endif
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
