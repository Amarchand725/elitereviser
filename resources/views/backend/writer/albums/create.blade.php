@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Song</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Song</li>
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
						<h4 class="card-title">Add New Song</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="create-form" name="create-form" action="{{ url('/artist/store') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="commission_percent" id="commission-percent" value="{{ $commission }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style='color:red'>*</span></label>
												<input type="text" name="song_title" id="song_title" value="{{ old('song_title') }}" class="form-control" placeholder="Enter song title">
												<span style="color:red">{{ $errors->first('song_title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Type of Song <span style='color:red'>*</span></label>
												<select name="song_type" id="song_type" class="form-control select2">
													<option value="" selected>Select Song Type</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" {{ old('song_type')==$category->id?'selected':'' }}>{{ $category->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Price</label>
												<input type="number" value="{{ old('actual_price') }}" name="actual_price" id="actual-price" class="form-control" placeholder="Enter song price">
												<span style="color:red">{{ $errors->first('actual_price') }}</span>
											</div>
											<div class="col-md-6">
												<br />
												<div class="form-check form-check-inline">
													<input class="form-check-input" name="free_for_all" type="checkbox" id="free" value="1">
													<label class="form-check-label" for="free"> Free for all</label>
												  </div>												  
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Discount</label>
												<input type="text" name="discount" value="{{ old('discount') }}" id="discount" class="form-control" placeholder="Enter discount">
											</div>
											<div class="col-md-6">
												<label for="">Price <small>with {{ $commission }}% admin service charges</small></label>
												<input type="text" name="retail_price" value="{{ old('retail_price') }}" id="retail_price" value='0' class="form-control" readonly>
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-md-6">
												<label for="">Sample music <span style='color:red'>*</span></label>
												<input type="file" id='short_song' name="short_song" onchange="previewFile(this);" accept=".mp3,audio/*" class="form-control">
												<span style="color:red">{{ $errors->first('short_song') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Music <span style='color:red'>*</span></label>
												<input type="file" id='full_song' name="full_song" onchange="previewFile(this);" accept=".mp3,audio/*" class="form-control">
												<span style="color:red">{{ $errors->first('full_song') }}</span>
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
			$("#sbt-btn").hide();
		});

		$(function () {
			$('#pageLoader').hide();
			$("#sbt-btn").show()
		})
		
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
