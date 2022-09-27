@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All New Jobs</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All New Jobs</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total New Jobs</small></h6>
								<h4 class="m-t-0 text-info">
									{{ count($models) }}
								</h4>
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
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-12">
					<div class="row col-md-12">
						<div class="col-md-5" style="margin-bottom: 10px;">
							<div class="search-field">
								<select name="search_title" id="search_title" class="form-control select2">
									<option value="" selected>Search by service</option>
									@foreach ($services as $service)
										<option value="{{ $service->id }}">{{ $service->title }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-5" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="date" class="form-control" name="search_date" value="" id="search_date" placeholder="Search by title">
							</div>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
					@if(Session::has('message'))
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
				</div>
				<div class="row" id="body">
					@foreach ($models as $model)
						<div class="col-lg-4 col-xl-3">
							<div class="card">
								<img class="card-img-top w-100 profile-bg-height" src="https://demos.wrappixel.com/premium-admin-templates/bootstrap/materialpro-bootstrap/package/assets/images/background/profile-bg.jpg" alt="Card image cap">
								<div class="card-body little-profile text-center">
									<div class="pro-img">
										<img src="{{ asset('public/assets/website/images/circle01.png')}}" style="background: white;" alt="user" class="rounded-circle shadow-sm" width="128">
									</div>
									<h3 class="mb-0">{{ Str::limit($model->hasOrderDetails->hasMainService->title, 10) }}</h3>
									<p>{{ Str::upper($model->hasOrderDetails->hasSubService->title) }}</p>
									<a href="javascript:void(0)" data-id="{{ $model->id }}" class="mt-2 waves-effect waves-dark btn btn-primary btn-md btn-rounded view-detail">
										View Detail
									</a>
									<div class="row text-center mt-3 justify-content-center">
										<div class="col-6 col-md-5 mt-3">
											@if(!empty($model->hasOrderDetails->total_words))
												<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_words }}</h3>
												<small class="text-muted">Words</small>
											@else 
												<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_pages }}</h3>
												<small class="text-muted">Pages</small>
											@endif
										</div>
										<div class="col-6 col-md-7 mt-3">
											<h3 class="mb-0 fw-light">{{ date('d/m/y', strtotime($model->order_date)) }}</h3>
											<small class="text-muted">Order Date</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<!-- Job Details Modal -->
	<div class="modal fade" id="job-detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Job Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" action="{{ route('editor.accept-job.store') }}">
					@csrf
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Accept</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Add approve Modal -->
@endsection
@section('js')
	<script>
		$('.view-detail').on('click', function(){
			var id = $(this).attr('data-id');
			$.ajax({
				url: '{{ route("editor.job-details") }}',
				type: 'GET',
				data: {'id':id},
				success: function(response){
					// console.log(response);
					$('.modal-body').html(response);
					$('#job-detail-modal').modal('show');
				}
			});
			
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_date = $('#search_date').val();
				var search_title = $('#search_title').val();
				fetchAll(search_date, search_title,);
			}));

			function fetchAll(date, title){
				$.ajax({
					url: '{{ url("/editor/new-jobs/search") }}',
					type: 'post',
					data: {'title':title, 'date':date},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						// console.log(response);
						$('#body').html(response);
					}
				});
			}
		});
	</script>
@endsection
