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
							<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10">
							    <i class="ti-settings text-white"></i>
							</button>
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
								<option value="succeeded">Completed </option>
								<option value="failed">Failed</option>
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
                                        <th>Net Amount</th>
										<th>Order Status</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 0 ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ ++$counter }}.</td>
											<td>{{ $model->order_number }}</td>
											<td>{{ $model->hasUser->name }}</td>
											<?php 
												// $commission_charges = $model->sum/100*$commission;
												// $actual_amount = $model->sum-$commission_charges;
												
												$actual_amount = $model->hasProduct->actual_price-$model->hasProduct->discount;
											?>
											<td>${{ number_format($actual_amount) }}.0</td>
											<td>
												@if($model->order_status=='succeeded' || $model->order_status==1)
													<span class="label label-success">Completed</span>
												@else 
													<span class="label label-danger">Failed</span>
												@endif
											</td>
											<td>{{ date('d, F-Y', strtotime($model->order_date)) }}</td>
											<td>
												<a href="{{ url('/artist/order/show') }}/{{ $model->order_id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="View order details">
												    <i class="fa fa-eye"></i>
												</a>
												<a class="btn btn-info btn-sm" href="{{ url('artist/order/invoice') }}/{{ $model->order_number }}" target="_blank" title="Order Invoice">
												    <i class="fa fa-print"></i>
												</a>
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

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
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
					url: '{{ url("/artist/order/search") }}',
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
