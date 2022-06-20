@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Subscribers</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Subscribers</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Subscribers</small></h6>
								<h4 class="m-t-0 text-info">
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
						<div class="search-field col-sm-5">
							<select name="" id="search_subscriber" class="select2" style="width: 100%">
								<option value="All">All subscribers </option>
								@foreach ($models as $model)
								    <option value="{{ $model->hasUser->id }}">{{ $model->hasUser->name }} </option>
								@endforeach
							</select>
						</div>
						<div class="search-field col-sm-5">
							<select name="" id="search_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Subscribers of Mr.{{ $artist_name->name }} - {{ sizeof($models) }}</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Name</th>
										<th>Subscribed Date</th>
										<th>Status</th>
										<!--<th>Action</th>-->
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											<td>
												@if(!empty($model->hasUser->image))
													<img src="{{asset('public/images/users')}}/{{ $model->hasUser->image }}" class="img-circle" style="width: 50px" height="50px" alt="">
												@else 
													<img src="{{asset('public/images/dummy.png')}}" style="width: 50px" height="50px" alt="">
												@endif
											</td>
											<td>{{ $model->hasUser->name }}</td>
											<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
											<td>
												@if($model->is_subscriber)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->created_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->created_at)) }}">In-Active</span>
												@endif
											</td>
											<!--<td class="forlinks">-->
											<!--	<a href="{{ url('/admin/artist_subscribers') }}/{{ $model->artist_id }}" title="Subscribers List" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>-->
											<!--</td>-->
										</tr>
									@endforeach
									<tr>
										<td colspan="11">
											{{ $models->links('pagination::bootstrap-4') }}
										</td>
									</tr>
								</tbody>
							</table>
							<div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var subscriber_id = $('#search_subscriber').val();
				var search_status = $('#search_status').val();
				fetchAll(subscriber_id, search_status);
			}));			

			function fetchAll(subscriber_id, status){
				$.ajax({
					url: '{{ url("/admin/search_subscribers") }}/{{ $artist_name->id }}',
					type: 'post',
					data: {'subscriber_id':subscriber_id, 'status':status},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						$('#body').html(response);
						console.log(response);
					}
				});
			}
		});
	</script>
@endsection
