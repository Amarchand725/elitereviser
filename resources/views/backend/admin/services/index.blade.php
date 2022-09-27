@extends('backend.admin.layout.master')
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Services</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Services</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Services</small></h6>
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
						<div class="search-field col-sm-4">
							<input id="search_by_all" class="form-control" placeholder="Serach By Service Title" style="width: 100%">
						</div>

						<div class="search-field col-sm-4">
							<select id="search_status" class="form-control" style="width: 100%">
								<option value="All" selected="selected">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="search-btn" class="btn btn-info">Search</button>
							<button type="submit" id="reset" class="btn btn-warning" style="border:none;">Reset</button>
							<a href="{{ route('service.create') }}" class="btn btn-success">Add New Service</a> 
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Services</h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Parent</th>
										<th>Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1 ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->title }}</td>
											<td>
												@if($model->hasParent)
													{{ $model->hasParent->title }}
												@endif
											</td>
											<td>{!! Str::words($model->short_description, 3, ' ...') !!}</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td class="forlinks">
												<a href="{{ route('service.edit', ['id'=>$model->id]) }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Edit service"><i class="mdi mdi-border-color"></i></a> 
												<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon" style="color:#fff; background:red" data-toggle="tooltip" title="" data-original-title="Delete service"><i class="fa fa-trash-alt"></i></a>	
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="6">
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
@endsection
@section('js')
	<script>
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
						url:"{{ url('admin/service/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if (data.errors) {
								for (var i = 0; i < data.errors.length; i++) {
									toastr.error(data.errors[i].message, {
										CloseButton: true,
										ProgressBar: true
									});
								}
							} else {
								$('#tr-remove-'+id).fadeOut(500);
								toastr.success('Service deleted successfully!', {
									CloseButton: true,
									ProgressBar: true
								});
							}
						},
						error:function (er) {
							$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
						}
					});
				}
			});
		}

		@if(Session::has('message'))
			toastr.options =
			{
				"closeButton" : true,
				"progressBar" : true
			}
			toastr.success("{{ session('message') }}");
		@endif

		$(document).ready(function(){
			$(document).on('click', '#search-btn', function(){
				var search_by_all = $('#search_by_all').val();
				var search_status = $('#search_status').val();
				var page = 1;
				fetch_data(page, search_by_all, search_status );
			});

			$(document).on('click', '#reset', function(){
				var search_by_all = "";
				var search_status = "All";
				var page = 1;
				$('#search_status option').prop('selected', function() {
					return this.defaultSelected;
				});
				fetch_data(page, search_by_all, search_status );
			});

			$(document).on('click', '.pagination a', function(event){
				event.preventDefault();
				var page = $(this).attr('href').split('page=')[1];
				var search_by_all = $('#search_by_all').val();
				var search_status = $('#search_status').val();
				fetch_data(page, search_by_all, search_status );
			});

			function fetch_data(page, search_by_all, search_status ){
				$.ajax({
					url:'{{ route("service.search") }}?page='+page+'&search_by_all='+search_by_all+'&search_status='+search_status,
					success:function(data){
						$('#body').html(data);
					}
				});
			}
		});
	</script>
@endsection