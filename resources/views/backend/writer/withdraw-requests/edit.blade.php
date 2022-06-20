@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Update Song Details</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Update Song Details</li>
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
						<h4 class="card-title">Update Song Details</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="create-form" name="create-form" action="{{ url('/artist/update') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="commission_percent" id="commission-percent" value="{{ $commission }}">
									<input type="hidden" name="album_id" value="{{ $model->id }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style='color:red'>*</span></label>
												<input type="text" name="song_title" id="song_title" value="{{ $model->song_title }}" class="form-control" placeholder="Enter song title">
												<span style="color:red">{{ $errors->first('song_title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Type of Song <span style='color:red'>*</span></label>
												<select name="song_type" id="song_type" class="form-control select2">
													<option value="" selected>Select Song Type</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" {{ $model->song_type==$category->id?'selected':'' }}>{{ $category->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Price</label>
												<input type="number" value="{{ $model->actual_price }}" name="actual_price" id="actual-price" class="form-control" placeholder="Enter song price">
											</div>
											<div class="col-md-6">
												<br />
												<div class="form-check form-check-inline">
													@if($model->free==1)
														<input class="form-check-input" checked name="free_for_all" type="checkbox" id="free" value="1">
													@else
														<input class="form-check-input" name="free_for_all" type="checkbox" id="free" value="1">
													@endif
													<label class="form-check-label " for="free"> Free for all</label>
												  </div>												  
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Discount</label>
												<input type="text" name="discount" value="{{ $model->discount }}" id="discount" class="form-control" placeholder="Enter discount">
											</div>
											<div class="col-md-6">
												<label for="">Price <small>with {{ $commission }}% admin service charges</small></label>
												<input type="text" name="retail_price" id="retail_price" value='{{ $model->retail_price }}' class="form-control" readonly>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Sample music <small>Keep empty if don't want to change</small></label>
												<input type="file" id='short_song' name="short_song" onchange="previewFile(this);" class="form-control">
												<span style="color:red">{{ $errors->first('short_song') }}</span>
												<br /><br />
												<audio controls>
													<source src="{{ asset('public/songs/short_songs') }}/{{ $model->short_song }}" type="audio/ogg">
													Your browser does not support the audio tag.
												</audio>
											</div>
											<div class="col-md-6">
												<label for="">Music <small>Keep empty if don't want to change</small></label>
												<input type="file" id='full_song' name="full_song" onchange="previewFile(this);" class="form-control">
												<span style="color:red">{{ $errors->first('full_song') }}</span>
												<br /><br />
												<audio controls>
													<source src="{{ asset('public/songs/full_songs') }}/{{ $model->full_song }}" type="audio/ogg">
													Your browser does not support the audio tag.
												</audio>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
