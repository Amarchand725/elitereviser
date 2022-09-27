@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Edit Bonus Footage details</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Bonus Footage details</li>
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
						<h4 class="card-title">Bonus Footage details</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('admin/bonusfootage/update') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="video_id" value="{{ $details->id }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" value="{{ $details->title }}" class="form-control" placeholder="Enter title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Product Strategy<span style="color:red">*</span></label>
												<select name="strategy" id="" class="form-control" required>
													<option value="1" {{ $details->strategy==1?'selected':'' }}>Free</option>
													<option value="2" {{ $details->strategy==2?'selected':'' }}>Premium</option>
												</select>
												<span style="color: red">{{ $errors->first('description') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Description<span style="color:red">*</span></label>
												<textarea name="description" id="" class="form-control" placeholder="Enter description">{{ $details->short_description }}</textarea>
												<span style="color: red">{{ $errors->first('description') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Status</label>
												<select name="status" id="" class="form-control">
													<option value="1" {{ $details->status==1?'selected':'' }}>Active</option>
													<option value="0" {{ $details->status==0?'selected':'' }}>In-Active</option>
												</select>
											</div>
											<div class="col-md-6">
												<label for="">Upload Video <span style="color:red">*</span></label>
												<input type="file" name="upload_video" class="form-control">
												<span style="color: red">{{ $errors->first('upload_video') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Banner <span style="color:red">*</span></label>
												<input type="file" name="image" id="image" value="" class="form-control">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												@if(!empty($details->image))
													<img src="{{ asset('public/bonus-footages') }}/{{ $details->image }}" style="width:80px; height:80px; border-radius:50%" alt="">
												@endif
												<br />
												<div><a href="{{ url('admin/bonusfootage/show') }}/{{ $details->id }}">Go to video</a></div>
											</div>
										</div>
									</div>
									<div class="row" id="pageLoader">
										<div class="col-md-12" style="text-align: center">
											<img width="250px"  src="{{ asset('public/images/g-loader.gif') }}" alt="">
										</div>
									</div>
									<div class="modal-footer">
										<!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
										<button type="submit" id="sbt-btn" class="btn btn-success">Submit</button>
									</div>
								</form>
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
	    $(document).on('click', '#sbt-btn', function(){
			$('#pageLoader').show();
			$("#sbt-btn").hide(); //disable 
		});

		$(function () {
			$('#pageLoader').hide();
			$("#sbt-btn").show()
		})
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
