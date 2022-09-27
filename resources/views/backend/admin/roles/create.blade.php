@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Role</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Role</li>
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
						<h4 class="card-title">Add New Role</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('/admin/role/store') }}" enctype="multipart/form-data">
									@csrf
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Role <span style="color:red">*</span></label>
												<input type="text" name="name" id="title" value="{{ old('name') }}" class="form-control" placeholder="Enter role name">
												<span style="color: red">{{ $errors->first('name') }}</span>
											</div>
										</div>
										<br />
										<h2>Allow Permissions</h2>
										<div class="form-check form-check-inline">
											<input class="form-check-input checkAll" type="checkbox" id="all">
											<label class="form-check-label" for="all"> Check All</label>
										</div>
										<div class="row">
											<?php $outer = 1; $counter = 1; ?>
											@foreach ($models as $key=>$model)
												<div class="card col-sm-4">
													<ul class="list-group list-group-flush temp">
														<li class="list-group-item" style="text-align:center; font-weight:bold">{{ $model->permission_group_name }}</li>
														<?php $outer++; ?>
														<li class="list-group-item">
															<div class="form-check form-check-inline">
																<input class="form-check-input check-group" type="checkbox" id="outer-{{ $outer }}">
																<label class="form-check-label" for="outer-{{ $outer }}"> Check All</label>
															</div>
														</li>
														@foreach($model->hasGroupPermissions as $permission)
															<?php $counter++ ?>
															<li class="list-group-item">
																<div class="form-check form-check-inline">
																	<input class="form-check-input" name="permissions[]" type="checkbox" id="perm-{{ $counter }}" value="{{ $permission->id }}">
																	<label class="form-check-label" for="perm-{{ $counter }}"> {{ $permission->name }}</label>
																</div>
															</li>
														@endforeach
													</ul>
												</div>
											@endforeach
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
	<script>
		$(document).on('click','.check-group:checkbox',function(){
			$(this).parents(':eq(3)').find(':checkbox').prop('checked', this.checked);
		});

		$("#all").click(function () {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
	</script>
@endsection
