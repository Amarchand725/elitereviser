@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Accounts</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Accounts</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Accounts</small></h6>
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
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h2>
							Bank Accounts 
							<div class="search-button" style="float:right;">
								<a href="{{ url('/artist/bank/create') }}" class="btn btn-success">Create New Account</a>
							</div>
						</h2>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<hr />
						@foreach($models as $model)
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-row">
											<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-info">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card fill-white feather-lg"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
											</div>
											<div class="ms-2 align-self-center">
												<h3 class="mb-0 ml-2">Account Title. <b>{{ Str::upper($model->account_title) }}</b></h3>
												<h6 class="text-muted mb-0 ml-2">Account NO. <b>{{ $model->account_no }}</b></h6>
												<h6 class="text-muted mb-0 ml-2">
													Status. 
													@if($model->status==1)
														<span title="Activated Date: {{ date('d, F-Y', strtotime($model->updated_at)) }}" class="badge badge-success">Active</span>
													@else 
														<span title="In-Activated Date: {{ date('d, F-Y', strtotime($model->updated_at)) }}" class="badge badge-danger">Inactive</span>
													@endif
												</h6>
												<h6 class="text-muted mb-0 ml-2">Date. {{ date('d/m/Y', strtotime($model->date)) }}</h6>
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
							<label for="">Approve or Reject Reason <span style="color:red">*</span></label>
							<textarea name="reason" class="form-control" placeholder="Enter details" required></textarea>
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
							<label for="">Active or In-active Reason <span style="color:red">*</span></label>
							<textarea name="reason" class="form-control" placeholder="Enter details" required></textarea>
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
					url: '{{ url("/artist/all_events") }}',
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
