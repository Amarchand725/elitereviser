@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Bonus Footages</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Bonus Footages</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Bonus Footages</small></h6>
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
						<div class="col-md-4" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="text" class="form-control" name="search_title" value="" id="search_title" placeholder="Search by title">
							</div>
						</div>

						<div class="search-field col-sm-4">
							<select name="" id="search_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							<a @if(Auth::user() && Auth::user()->role_id==1) href="{{ url('/admin/bonus_footage/create') }}" @else href="{{ url('/artist/bonus_footage/create') }}" @endif class="btn btn-success">Add Bonus Footage</a>
                            {{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Bonus Footages</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Banner</th>
										<th>Title</th>
										<th>Short Des</th>
										<th>Date</th>
										@if(Auth::user()->role_id==1)
										    <th>Uploaded By</th>
										@endif
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 0; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ ++$counter }}.</td>
											<td>
												@if(!empty($model->image))
													<img src="{{ asset('public/bonus-footages') }}/{{ $model->image }}" style="width:60px; height:60px; border-radius:50%"  alt="">
												@else 
													<img src="{{ asset('public/bonus-footages/video-dummy.jpg') }}" style="width:60px; height:60px; border-radius:50%" alt="">
												@endif
											</td>
											<td><a @if(Auth::user() && Auth::user()->role_id==1) href="{{ url('admin/bonusfootage/show') }}/{{ $model->id }}" @else href="{{ url('artist/bonusfootage/show') }}/{{ $model->id }}" @endif>{{ $model->title }}</a></td>
											<td>
												{!! Str::words($model->short_description, 5, ' ...') !!}
											</td>
											<td>{{ date('d/m/Y', strtotime($model->updated_at)) }}</td>
											@if(Auth::user()->role_id==1)
											    <td>{{ $model->hasUser->name }}</td>
											@endif
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td class="forlinks">
												<a @if(Auth::user() && Auth::user()->role_id==1) href="{{ url('/admin/video/comments') }}/{{ $model->id }}" @else href="{{ url('/artist/video/comments') }}/{{ $model->id }}" @endif class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="" data-original-title="Show All Comments" style="margin-right:5px"><i class="fa fa-comment"></i></a> 
												
												<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Product"><i class="fa fa-edit"></i></button>
												@if($model->user_id==Auth::user()->id)
												    <a @if(Auth::user() && Auth::user()->role_id==1) href="{{ url('/admin/bonusfootage/edit') }}/{{ $model->id }}" @else href="{{ url('/artist/bonusfootage/edit') }}/{{ $model->id }}" @endif class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update video details"><i class="mdi mdi-border-color"></i></a> 
												@endif
											    @if($model->user_id!=Auth::user()->id)
											        <button class="btn btn-primary btn-sm approve-btn ml-2" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Approve Video"><i class="fa fa-edit"></i></button>
											    @endif
												<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete video"><i class="fa fa-trash-alt"></i></a>	
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

				<form method="post" action="{{ url('/admin/bonusfootage/status') }}">
					@csrf
					<input type="hidden" name="bonusfootage_id" id="status_bonusfootage_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="1">Active</option>
								<option value="0" >In-Active</option>
							</select>
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
	
	<!-- Add approve Modal -->
	<div class="modal fade" id="add-approve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Approve Gallery</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" action="{{ url('admin/approve/video') }}">
					@csrf
					<input type="hidden" name="video_id" id="video_approve_id" value="">
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
							<label for="">Approve or Reject Reason</label>
							<textarea name="reason" class="form-control" placeholder="Enter details"></textarea>
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

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
	     $('.approve-btn').on('click', function(){
			var id = $(this).val();
			$('#video_approve_id').val(id);
			$('#add-approve-modal').modal('show');
		});
		$('.active-btn').on('click', function(){
			var id = $(this).val();
			$('#status_bonusfootage_id').val(id);
			$('#add-active-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_title = $('#search_title').val();
				var search_status = $('#search_status').val();
				fetchAll(search_title, search_status);
			}));			

			function fetchAll(title, status){
				$.ajax({
					url: '{{ url("/admin/bonusfootage/search") }}',
					type: 'post',
					data: {'title':title, 'status':status},
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
						url:"{{ url('admin/bonusfootage/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Video deleted successfully",icon:"success",timer:2000});
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
