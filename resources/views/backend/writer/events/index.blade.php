@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Events</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Events</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Events</small></h6>
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
						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="text" class="form-control" name="" id="search_event_title" placeholder="Search by event title">
							</div>
						</div>

						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="date" class="form-control" name="search_start_date" value="" id="search_start_date" placeholder="Search by date">
							</div>
						</div>

						<div class="search-field col-sm-3">
							<select name="" id="search_event_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							@if(Auth::user()->role_id==2)
							    <a href="{{ url('/artist/event/create') }}" class="btn btn-success">Add New Event</a>
							@endif
                            {{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Events</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										@if(Auth::user()->role_id==1) <!--1=Admin -->
											<th>Artist</th>
										@endif
										<th>Title</th>
										<th>From To Date</th>
										<th>From To Time</th>
										<th>Venue</th>
                                        <th>Total Tickets</th>
                                        <th>Available Tickets</th>
										<th>Is approve</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											@if(Auth::user()->role_id==1) <!--1=Admin -->
												<td><a href="{{ url('/artist-profile') }}/{{ $model->user_id }}">{{ $model->hasUser->name }}</a></td>
											@endif
											<td>{{ $model->title }}</td>
											<td>{{ date('d/m/Y', strtotime($model->start_date)) }} to {{ date('d/m/Y', strtotime($model->end_date)) }}</td>
											<td>{{ date('H:i A', strtotime($model->start_time)) }} to {{ date('H:i A', strtotime($model->end_time)) }}</td>
											<td>{{ $model->venue }}</td>
											<td>@if($model->free) Free @else {{ $model->total_tickets }} @endif</td>
											<td>@if($model->free) Free @else {{ $model->total_tickets - $model->hasEventUsages->sum('quantity') }} @endif</td>
											<td>
												@if($model->is_approved==1)
													<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
												@elseif($model->is_approved==0)
													<span class="label label-warning" title="Waiting for approval">Not Approved</span>
												@elseif($model->is_approved==3)
													<span title="{{ $model->approve_reason }}" class="label label-danger">Reejcted</span>
												@endif
											</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td class="forlinks">
												@if(Auth::user()->role_id==1) <!--1=Admin -->
													<button class="btn btn-primary btn-sm approve-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Approve Product"><i class="fa fa-edit"></i></button>
													<button class="btn btn-warning btn-sm ml-2 active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Product"><i class="fa fa-check"></i></button>
												@else
													<a href="{{ url('/artist/event/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update event details"><i class="mdi mdi-border-color"></i></a>
													<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Event"><i class="fa fa-trash-alt"></i></a>
												@endif
											</td>
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

		<!-- Add approve Modal -->
		<div class="modal fade" id="add-approve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Approve Artist</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" action="{{ url('/admin/approve/event') }}">
					@csrf
					<input type="hidden" name="event_id" id="event_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Approve <span style="color:red">*</span></label>
							<select name="approve_status" id="" class="form-control" required>
								<option value="" selected>Select approve status</option>
								<option value="1">Approve</option>
								<option value="3" >Reject</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Approve or Reject Reason </label>
							<textarea name="reason" class="form-control" placeholder="Enter details" ></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Add approve Modal -->

	<!-- Active Modal -->
	<div class="modal fade" id="add-active-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" action="{{ url('/admin/status/event') }}">
					@csrf
					<input type="hidden" name="event_id" id="status_event_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="1">Active</option>
								<option value="0" >In-Active</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Active or In-active Reason </label>
							<textarea name="reason" class="form-control" placeholder="Enter details" ></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Activee Modal -->

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		$('.approve-btn').on('click', function(){
			var id = $(this).val();
			$('#event_id').val(id);
			$('#add-approve-modal').modal('show');
		});

		$('.active-btn').on('click', function(){
			var id = $(this).val();
			$('#status_event_id').val(id);
			$('#add-active-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_title = $('#search_event_title').val();
				var search_start_date = $('#search_start_date').val();
				var searched_status = $('#search_event_status').val();
				fetchAll(search_title, search_start_date, searched_status);
			}));

			function fetchAll(title, start_date, status){
				$.ajax({
					url: '{{ url("/artist/events/search") }}',
					type: 'post',
					data: {'title':title, 'start_date':start_date, 'status':status},
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

		// /* Delete Banner */
		function deleteData(id) {
			swal({title:"",
				text:"Are you sure you want to delete?",icon:"error",
				buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
					confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
			}).then(function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type:"post",
						url:"{{ url('artist/event/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Event deleted successfully",icon:"success",timer:2000});
							}
						},
						error:function (er) {
							$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
						}
					});
				}
			});
		}
	</script>
@endsection
