@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Upload New Video</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Upload New Video</li>
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
						<h4 class="card-title">Upload New Bonus Footage</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('artist/bonusfootage/store') }}" enctype="multipart/form-data">
									@csrf
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Product Strategy<span style="color:red">*</span></label>
												<select name="" id="" class="form-control">
													<option value=""></option>
												</select>
												<span style="color: red">{{ $errors->first('description') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<label for="">Description<span style="color:red">*</span></label>
												<textarea name="description" id="" class="form-control" placeholder="Enter description"></textarea>
												<span style="color: red">{{ $errors->first('description') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Upload Video <span style="color:red">*</span></label>
												<input type="file" name="upload_video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
												<span style="color: red">{{ $errors->first('upload_video') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Banner </label>
												<input type="file" name="image" id="image" value="" accept="image/png, image/gif, image/jpeg" class="form-control">
												<span style="color: red">{{ $errors->first('image') }}</span>
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

	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

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
