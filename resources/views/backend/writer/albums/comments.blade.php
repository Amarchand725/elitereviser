@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Comments</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Comments</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Comments</small></h6>
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
						<div class="col-md-4" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="date" class="form-control" name="" id="search_date">
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
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Comments </h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th class="col-sm-2">Commented By</th>
										<th class="col-sm-5">Comments</th>
										<th>Date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 0; ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ ++$counter }}.</td>
											<td>{{ $model->hasUser->name }}</td>
											<td>{{ $model->comment }}</td>
											<td>{{ date('d, F-Y | h:i A', strtotime($model->created_at)) }}</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
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
	</div>

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_date = $('#search_date').val();
				var searched_status = $('#search_status').val();
				fetchAll(search_date, searched_status);
			}));			

			function fetchAll(date, status){
				$.ajax({
					url: '{{ url("/artist/song/search") }}/{{ $song_id }}',
					type: 'post',
					data: {'date':date, 'status':status},
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
						type:"delete",
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
