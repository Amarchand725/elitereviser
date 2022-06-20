@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Your Jobs</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Your Jobs</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Your Jobs</small></h6>
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
								<input type="text" class="form-control" name="search_title" value="" id="search_title" placeholder="Search by title">
							</div>
						</div>
						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="date" class="form-control" name="search_date" value="" id="search_date" placeholder="Search by title">
							</div>
						</div>

						<div class="search-field col-sm-3">
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
						<h4 class="card-title">All Your Jobs</h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Job Title</th>
										<th>Service</th>
										<th>Order Date</th>
										<th>Accepted Date</th>
										<th>Delivery Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									@php $counter = 1; @endphp 
									@foreach ($models as $model)
										<tr>
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->hasOrderDetails->hasMainService->title }}</td>
											<td>{{ $model->hasOrderDetails->hasSubService->title }}</td>
											<td>{{ date('d, M-Y', strtotime($model->order_date)) }}</td>
											<td>{{ date('d, M-Y', strtotime($model->hasAccepted->accepted_date)) }}</td>
											<td>{{ Carbon\Carbon::now('UTC')->addHour(isset($order->hasOrderDetails)?$order->hasOrderDetails->trunarround_time:'')->format('d, M-Y') }}</td>
											<td>
												@if($model->hasAccepted->status==0)
													<span class="label label-warning">Pending</span>
												@elseif($model->hasAccepted->status==1)
													<span class="label label-info">Process</span>
												@elseif($model->hasAccepted->status==2)
													<span class="label label-danger">Rejected</span>
												@elseif($model->hasAccepted->status==3)
													<span class="label label-success">Completed</span>
												@endif 
											</td>
											<td>
												<a href="{{ route('editor.chat', ['id'=>$model->order_number]) }}" class="btn btn-info btn-sm chat" data-original-title="Chat"><i class="fa fa-comment"></i></a>
												<button class="btn btn-warning btn-sm detail-btn" data-id="{{ $model->id }}" data-original-title="Show details"><i class="fa fa-eye"></i></button>
												<button class="btn btn-info btn-sm edit-btn" data-job-id="{{ $model->id }}" data-toggle="tooltip" data-original-title="Manage Status"><i class="fa fa-edit"></i></button>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Modal -->
	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Attachment Document file for customer</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" action="{{ route('editor.accept-job.status') }}">
					@csrf
					<input type="hidden" name="job_id" id="job-id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="0" >Pending</option>
								<option value="1">Process</option>
								<option value="2" >Rejected</option>
								<option value="3" >Completed</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Attachment </label>
							<input type="file" class="form-control" name="attachment" id="attachment">
						</div>
						<div class="form-group">
							<label for="">Editor Note</label>
							<textarea name="editor_note" class="form-control" placeholder="Enter details" ></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Send file</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Activee Modal -->

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
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Add approve Modal -->

@endsection
@section('js')
	<script>
		$(document).on('click', '.detail-btn', function(){
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
		@if(Session::has('message'))
			toastr.options =
			{
				"closeButton" : true,
				"progressBar" : true
			}
			toastr.success("{{ session('message') }}");
		@endif
	</script>

	<script>
		$(document).on('click','.edit-btn', function(){
			var job_id = $(this).attr('data-job-id');
			$('#job-id').val(job_id);
			$('#edit-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_date = $('#search_date').val();
				var search_title = $('#search_title').val();
				var search_status = $('#search_status').val();
				fetchAll(search_date, search_title, search_status);
			}));

			function fetchAll(date, title, status){
				$.ajax({
					url: '{{ url("/admin/gallery/search") }}',
					type: 'post',
					data: {'title':title, 'artist':date, 'status':status},
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
