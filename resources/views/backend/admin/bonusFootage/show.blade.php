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
						<div class="table-responsive">
							<div class="container">
								<video style="width:100%" controls>
									<source src="{{ asset('public/bonus-footages') }}/{{ $model->video }}" type="video/mp4">
									<source src="movie.ogg" type="video/ogg">
									Your browser does not support the video tag.
								</video>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
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
