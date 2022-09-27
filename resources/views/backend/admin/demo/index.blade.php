@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Demos</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Demos</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Demos</small></h6>
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
								<input type="date" class="form-control" name="search_date" value="" id="search_date" placeholder="Search by date">
							</div>
						</div>

						<div class="search-field col-sm-3">
							<select name="" id="search_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="2">Pending </option>
								<option value="1">Accepted</option>
								<option value="3">Rejected</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							<!-- <a href="{{ url('/admin/partner/create') }}" class="btn btn-success">Add Gallery</a> -->
                            {{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Demos</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Full Name</th>
										<th>Phone</th>
										<th>E-mail</th>
										<th>Voice</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1 ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->full_name }}</td>
											<td>{{ $model->phone }}</td>
											<td>{{ $model->email }}</td>
											<td>
												<div class="audioplayer">
													<audio controls>
														<source src="{{ asset('public/demos') }}/{{ $model->audio }}" type="audio/ogg">
														<source src="horse.mp3" type="audio/mpeg">
														Your browser does not support the audio element.
													</audio>
												</div>
											</td>
											<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Accepted date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Accepted</span>
												@elseif($model->status==3)
													<span class="label label-danger" title="Rejected date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Rejected</span>
												@else
													<span class="label label-warning" title="Pending date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Pending</span>
												@endif
											</td>
											<td class="forlinks">
												<button class="btn btn-primary btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Accept Demo"><i class="fa fa-edit"></i></button>
												<!-- <a href="{{ url('/admin/partner/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update partner details"><i class="mdi mdi-border-color"></i></a>  -->
												<!-- <a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete partner"><i class="fa fa-trash-alt"></i></a>	 -->
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="8">
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

				<form method="post" action="{{ url('/admin/demo/status') }}">
					@csrf
					<input type="hidden" name="id" id="status_demo_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="1">Accept</option>
								<option value="3" >Reject</option>
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
		$('.active-btn').on('click', function(){
			var id = $(this).val();
			$('#status_demo_id').val(id);
			$('#add-active-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_title = $('#search_title').val();
				var search_date = $('#search_date').val();
				var search_status = $('#search_status').val();
				fetchAll(search_title, search_date, search_status);
			}));			

			function fetchAll(title, date, status){
				$.ajax({
					url: '{{ url("/admin/demo/get_all_demos") }}',
					type: 'post',
					data: {'title':title, 'date':date, 'status':status},
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
						url:"{{ url('admin/demo/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Demo deleted successfully",icon:"success",timer:2000});
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
