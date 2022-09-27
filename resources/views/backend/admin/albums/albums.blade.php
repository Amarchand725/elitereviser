@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Songs</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Songs</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Songs</small></h6>
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
								<input type="text" class="form-control" name="" id="search_title" placeholder="Search song title">
							</div>
						</div>

						<div class="search-field col-sm-3">
							<select name="song_type" id="search_category" class="select2" style="width: 100%">
								<option value="All" selected>Select category</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
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
                            <!--<a href="{{ url('/artist/create') }}" class="btn btn-success">Add Album</a>-->
							{{-- <button type="submit" id="" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Songs</h4>
                        @if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Image</th>
										<th>Artist Name</th>
										<th>Title</th>
										<th>Sample</th>
										<th>Type</th>
										<th>Is Approve</th>
										<th>Status</th>
                                        <th>Registered</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id='body'>
									<?php $counter = 1 ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ $counter++ }}.</td>
											<td>
												@if($model->hasArtist->image)
													<img src="{{asset('public/images/users')}}/{{ $model->hasArtist->image }}" style="width: 50px" height="50px" alt="">
												@else
													<img src="{{asset('public/images/dummy.png')}}" style="width: 50px" height="50px" alt="">
												@endif
											</td>
											<td>{{ $model->hasArtist->name }}</td>
											<td>{{ $model->song_title }}</td>
											<td>
												<audio controls>
													<source src="{{ asset('public/songs/full_songs') }}/{{ $model->short_song }}" type="audio/ogg">
													Your browser does not support the audio tag.
												</audio>
											</td>
											<td>{{ $model->hasCategory->name }}</td>
											<td>
												@if($model->is_approved==1)
													<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
												@elseif($model->is_approved==0)
													<span class="label label-warning">Not Approve</span>
												@elseif($model->is_approved==3)
													<span title="{{ $model->reasson }}" class="label label-danger">Rejcted</span>
												@endif
											</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
											<td>
											    <a href="{{ url('/admin/audio/comments') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info mb-2" data-toggle="tooltip" title="" data-original-title="Show All Comments" style="margin-right:5px"><i class="fa fa-comment"></i></a> 
												<button class="btn btn-primary btn-sm" value="{{ $model->id }}"  data-toggle="tooltip" data-original-title="Approve Product" id="approve-btn"><i class="fa fa-edit"></i></button>
												<button class="btn btn-warning btn-sm mt-2" value="{{ $model->id }}" title="Active Product" id="active-btn"><i class="fa fa-check"></i></button>
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="10">
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

		<!-- Add approve Modal -->
		<div class="modal fade" id="add-approve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Approve Album</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="post" action="{{ url('/admin/approve') }}">
						@csrf
						<input type="hidden" name="album_id" id="album_id" value="">
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

					<form method="post" action="{{ url('/admin/status') }}">
						@csrf
						<input type="hidden" name="album_id" id="active_album_id" value="">
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
								<label for="">Active or In-active Reason</label>
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
		<!-- Activee Modal -->

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
		$('#approve-btn').on('click', function(){
			var album_id = $(this).val();
			$('#album_id').val(album_id);
			$('#add-approve-modal').modal('show');
		});

		$('#active-btn').on('click', function(){
			var album_id = $(this).val();
			$('#active_album_id').val(album_id);
			$('#add-active-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_title = $('#search_title').val();
				var search_category = $('#search_category').val();
				var searched_status = $('#search_status').val();
				fetchAll(search_title, search_category, searched_status);
			}));

			function fetchAll(title, category, status){
				$.ajax({
					url: '{{ url("/admin/all_albums") }}',
					type: 'post',
					data: {'title':title, 'category':category, 'status':status},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						$('#body').html(response);
					}
				});
			}
		});
	</script>
@endsection
