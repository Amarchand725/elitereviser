@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Service</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Service</li>
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
						<h4 class="card-title">Add New Service</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="service-form" name="service_form" enctype="multipart/form-data">
									@csrf
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Parent Service </label>
												<select name="parent_id" id="" class="form-control">
													<option value="">Select parent service</option>
													@foreach ($services as $service)
														<option value="{{ $service->id }}">{{ $service->title }}</option>
													@endforeach
												</select>
												<span style="color: red">{{ $errors->first('date') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-12">
												<label for="">Description</label>
												<textarea name="description" rows="5" id="" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
												<span style="color: red">{{ $errors->first('description') }}</span>
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
@endsection
@section('js')
	<script>
		$('#service-form').submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.post({
				url: "{{ route('service.store') }}",
				data: formData,
				contentType: false,
				processData: false,
				success: function (data) {
					if (data.errors) {
						for (var i = 0; i < data.errors.length; i++) {
							toastr.error(data.errors[i].message, {
								CloseButton: true,
								ProgressBar: true
							});
						}
					} else {
						toastr.success('Service added successfully!', {
							CloseButton: true,
							ProgressBar: true
						});
						setInterval(function () {
							location.href = '{{route("admin.services")}}';
						}, 2000);
					}
				}
			});
		});
	</script>
@endsection
