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
                            <a href="{{ url('/artist/create') }}" class="btn btn-success">Add New Song</a>
							{{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
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
										<th>Title</th>
										<th>Type</th>
										<th>Music</th>
										<th>Approved</th>
										<th>Status</th>
                                        {{-- <th>Registered</th> --}}
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 0; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ ++$counter }}.</td>
											<td title="{{ date('d, M-Y', strtotime($model->created_at)) }}">{{ $model->song_title }}</td>
											<td>{{ $model->hasCategory->name }}</td>
											<td>
												<audio controls>
													<source src="{{ asset('public/songs/full_songs') }}/{{ $model->full_song }}" type="audio/ogg">
													Your browser does not support the audio tag.
												</audio>
											</td>
											<td>
												@if($model->is_approved==1)
													<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
												@elseif($model->is_approved==0)
													<span class="label label-warning">Not Approved</span>
												@elseif($model->is_approved==3)
													<span title="{{ $model->reasson }}" class="label label-danger">Reejcted</span>
												@endif
											</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											{{-- <td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td> --}}
											<td>
												<a href="{{ url('/artist/song/comments') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="" data-original-title="Show song comments"><i class="fa fa-comment"></i></a> 
												<a href="{{ url('/artist/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update song details"><i class="mdi mdi-border-color"></i></a> 
												<a href="{{ url('/artist/show') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="" data-original-title="Show song details"><i class="fa fa-eye"></i></a> 
												<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Song"><i class="fa fa-trash-alt"></i></a>
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="7">
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
	</div>

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
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
					url: '{{ url("/artist/search") }}/{{ Auth::user()->id }}',
					type: 'post',
					data: {'title':title, 'category':category, 'status':status},
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

		/* Delete Banner */
		function deleteData(id) {
			swal({title:"",
				text:"Are you sure you want to delete?",icon:"error",
				buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
					confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
			}).then(function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type:"post",
						url:"{{ url('/artist/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Album deleted successfully",icon:"success",timer:2000});
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
