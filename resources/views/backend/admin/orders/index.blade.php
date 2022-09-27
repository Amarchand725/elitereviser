@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Orders</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Orders</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Orders</small></h6>
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
								<input type="text" class="form-control" name="" id="search_order_no" placeholder="Search Order No">
							</div>
						</div>
						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="date" class="form-control" name="" id="search_date" placeholder="Search Order No">
							</div>
						</div>

						<div class="search-field col-sm-3">
							<select name="" id="search_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="0">Pending </option>
								<option value="1">Process</option>
								<option value="2">Rejected</option>
								<option value="3">Completed</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							{{-- <button href="#" class="btn btn-success" data-toggle="modal" data-target="#add-artist">Add Artist</button> --}}
                            {{-- <button type="submit" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button> --}}
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Orders</h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Order No#</th>
                                        <th>User Name</th>
                                        <th>Total Amount</th>
                                        <th>Discount</th>
                                        <th>Net Amount</th>
										<th>Order Status</th>
										<th>Job Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter =1; ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->order_number }}</td>
											<td>{{ $model->hasUser->name }}</td>
											<td>${{ number_format($model->total_amount, 2) }}</td>
											<td>${{ number_format($model->discount_amount, 2) }}</td>
											<td>${{ number_format($model->net_amount, 2) }}</td>
											<td>
												@if($model->acceptance==0)
													<span class="label label-warning">Pending</span>
												@elseif($model->acceptance==1)
													<span class="label label-info">Process</span>
												@elseif($model->acceptance==2)
													<span class="label label-danger">Rejected</span>
												@elseif($model->acceptance==3)
													<span class="label label-success">Completed</span>
												@endif 
											</td>
											<td>
												@if(isset($model->hasAccepted) && $model->hasAccepted->status==0)
													<span class="label label-warning">Pending</span>
												@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==1)
													<span class="label label-info">Process</span>
												@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==2)
													<span class="label label-danger">Rejected</span>
												@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==3)
													<span class="label label-success mb-2">Completed</span>
													@if($model->acceptance!=3)
														<strong class="label label-info">Waiting for approval</strong>
													@endif
												@else 
													<span class="label label-warning">Pending</span>
												@endif 
											</td>
											<td>{{ date('d, M-Y', strtotime($model->order_date)) }}</td>
											<td>
												@if(!empty($model->hasAccepted->document))
													<a class="btn btn-warning btn-sm download-btn" href="{{ asset('public/assets/editor/job-documents') }}/{{ $model->document }}" download="{{ asset('public/assets/editor/job-documents') }}/{{ $model->document }}">
														<i class="fa fa-download "></i>
													</a>
												@endif

												<button class="btn btn-info btn-sm detail-btn" data-id="{{ $model->id }}" data-original-title="Show details"><i class="fa fa-eye"></i></button>
												<a href="{{ route('admin.chat', ['id'=>$model->order_number]) }}" class="btn btn-warning btn-sm mt-1" title="Chat With Customer"><i class="fa fa-comment" ></i></a>
												@if(!empty($model->hasAccepted))
												    <a href="{{ route('admin.chat.editor', ['id'=>$model->order_number]) }}" class="btn btn-info btn-sm mt-1" title="Chat with Editor"><i class="fa fa-comment" ></i></a>
											    @endif
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="9">
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

	<!-- Add brand Modal -->
	<div class="modal fade" id="add-artist" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Artist</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" id="brandForm" name="brandForm" action="javascript:void(0)" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="created_by" value="">
						<div class="row">
							<div class="col-md-12">
								<label for="">Artist Full Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter Artist Full Name">
							</div>
						</div>
                        <div class="row">
							<div class="col-md-12">
								<label for="">EmailL</label>
								<input type="email" name="email" class="form-control" placeholder="Enter Artist Email">
							</div>
						</div>
                        <div class="row">
							<div class="col-md-12">
								<label for="">Phone</label>
								<input type="tel" name="phone" class="form-control" placeholder="Enter Artist Number">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="">Image</label>
								<input type="file" id='file' name="filename" onchange="previewFile(this);" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<img id="previewImg" width="50px" src="" alt="Uploaded Image" />
							</div>
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<option value="1" selected>Active</option>
								<option value="0" >Deactive</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

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
				url: '{{ route("admin.job-details") }}',
				type: 'GET',
				data: {'id':id},
				success: function(response){
					$('.modal-body').html(response);
					$('#job-detail-modal').modal('show');
				}
			});
		});
		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_order_no = $('#search_order_no').val();
				var search_date = $('#search_date').val();
				var search_status = $('#search_status').val();
				fetchAll(search_order_no, search_date, search_status);
			}));			

			function fetchAll(order_no, date , status){
				$.ajax({
					url: '{{ url("/admin/order/search") }}',
					type: 'post',
					data: {'order_no':order_no, 'date':date, 'status':status},
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
		// function deleteData(id) {
		// 	swal({title:"",
		// 		text:"Are you sure you want to delete?",icon:"error",
		// 		buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
		// 			confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
		// 	}).then(function(isConfirm) {
		// 		if (isConfirm) {
		// 			$.ajax({
		// 				type:"delete",
		// 				url:"{{ url('product') }}/"+id,
		// 				headers: {
		// 					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
		// 				},
		// 				success:function(data){
		// 					if(data==true){
		// 						$('#tr-remove'+id).fadeOut(500);
		// 						swal({title:"Successfully!",text:"Brand deleted successfully",icon:"success",timer:2000});
		// 					}
		// 				},
		// 				error:function (er) {
		// 					$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
		// 				}
		// 			});
		// 		}
		// 	});
		// }
	</script>
@endsection
