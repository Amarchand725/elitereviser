@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Role Permissions </h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Role Permissions</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Role Permissions</small></h6>
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
						<div class="search-field col-sm-8">
							<select name="song_type" id="search_name" class="select2" style="width: 100%">
								<option value="All" selected>Select by permission title</option>
								@foreach ($models as $model)
									<option value="{{ $model->hasPermissionName->id }}">{{ $model->hasPermissionName->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
                            <a href="{{ url('/admin/role/edit') }}/{{ $role->id }}" class="btn btn-warning">Edit Role Permission</a>
							{{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Role Permissions of <b>{{ Str::upper($role->name) }}</b></h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Group</th>
										<th>Permission Name</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->hasPermissionName->permission_group_name }}</td>
											<td>{{ $model->hasPermissionName->name }}</td>
											<td>
												@if($model->hasPermissionName->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="4">
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
				var search_name = $('#search_name').val();
				fetchAll(search_name);
			}));			

			function fetchAll(search_name){
				$.ajax({
					url: '{{ url("/admin/show_permission/search") }}',
					type: 'post',
					data: {'search_name':search_name, 'role_id':{{ $role->id }}},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
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
						url:"{{ url('admin/gallery/image') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Gallery image deleted successfully",icon:"success",timer:2000});
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
