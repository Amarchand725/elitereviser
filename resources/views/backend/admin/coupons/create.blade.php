@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Coupon</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Coupon</li>
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
						<h4 class="card-title">Add New Coupon</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('admin/coupon/store') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter coupon title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Coupon Type <span style="color:red">*</span></label>
												<select name="coupon_type" id="coupon_type" class="form-control">
													<option value="" selected>Select coupon type</option>
													<option value="fix" {{ old('coupon_type') == 'fix' ? 'selected':'' }}>Fix Discount</option>
													<option value="percent" {{ old('coupon_type')=='percent'?'selected':'' }}>Percent Discount</option>
												</select>
												<span style="color: red">{{ $errors->first('coupon_type') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Discount <span style="color:red">*</span></label>
												<input type="text" name="discount" value="{{ old('discount') }}" id="discount" class="form-control" placeholder="Enter discount">
												<span style="color: red">{{ $errors->first('discount') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Coupon Code <span style="color:red">*</span></label>
												<input type="text" name="coupon_code" value="{{ old('coupon_code') }}" id="coupon_code" class="form-control" placeholder="Auto generate coupon code" readonly>
												<span style="color: red">{{ $errors->first('coupon_code') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Start Date <span style="color:red">*</span></label>
												<input type="date" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}" id="start-date" class="form-control">
												<span id="error-start-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('start_date') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Expire Date <span style="color:red">*</span></label>
												<input type="date" name="expire_date" value="{{ old('expire_date') }}" id="end-date" min="{{ date('Y-m-d') }}" class="form-control">
												<span id="error-end-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('expire_date') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Max Purchase</label>
												<input type="number" name="max_purchase" id="" value="{{ old('max_purchase') }}" min="1" class="form-control">
												<span id="error-end-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('max_purchase') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Status</label>
												<select name="status" id="" class="form-control">
													<option value="1" selected {{ old('status') == '1' ? 'selected':'' }}>Active</option>
													<option value="0" {{ old('status') == '0' ? 'selected':'' }}>Deactive</option>
												</select>
											</div>
										</div>
										</div>
									<div class="modal-footer">
										<!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$('#discount').on('keyup', function(){
			var coupon_code = Math.random().toString(36).substr(2, 5);
			$('#coupon_code').val(coupon_code);
		});

		$('#start-date').on('change', function(){
			var start_date = $(this).val();
			var end_date = $('#end-date').val();
			if(end_date != null && new Date(start_date) >= new Date(end_date))
			{//compare end <=, not >=
				$('#error-start-date').html('This is date can not be greater than end date.');
			}else{
				$('#error-start-date').html('');
				$('#error-end-date').html('');
			}
		});

		$('#end-date').on('change', function(){
			var end_date = $(this).val();
			var start_date = $('#start-date').val();
			if(new Date(end_date) < new Date(start_date))
			{//compare end <=, not >=
				$('#error-end-date').html('This is date can not be less than start date.');
			}else{
				$('#error-end-date').html('');
				$('#error-start-date').html('');
			}
		});
	</script>
@endsection