@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Commissions</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Commissions</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Commissions</small></h6>
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
								<input type="text" pattern="\d*" maxlength="2" class="form-control" name="search_percent" value="" id="search_percent" placeholder="Search by percent">
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
							<a href="{{ url('/admin/commission/create') }}" class="btn btn-success">Add New Commission</a>
                            {{-- <button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Commissions</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Commission %</th>
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
											<td>{{ $model->percentage }}%</td>
											<td>{{ date('d, F-Y', strtotime($model->created_at)) }}</td>
											<td>
												@if($model->status==1)
													<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
												@else
													<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td class="forlinks">
												<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active commission" id=""><i class="fa fa-edit"></i></button>
												<a href="{{ url('/admin/commission/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Edit commission"><i class="mdi mdi-border-color"></i></a> 
												<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete commission"><i class="fa fa-trash-alt"></i></a>	
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="5">
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

				<form method="post" action="{{ url('/admin/commission/status') }}">
					@csrf
					<input type="hidden" name="id" id="id" value="">
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

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		$('.active-btn').on('click', function(){
			var id = $(this).val();
			$('#id').val(id);
			$('#add-active-modal').modal('show');
		});

		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_percent = $('#search_percent').val();
				var search_status = $('#search_status').val();
				fetchAll(search_percent, search_status);
			}));			

			function fetchAll(search_percent, status){
				$.ajax({
					url: '{{ url("/admin/commission/search") }}',
					type: 'post',
					data: {'search_percent':search_percent, 'status':status},
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
						url:"{{ url('/admin/commission/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Commission percent deleted successfully",icon:"success",timer:2000});
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
