@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Order Details </h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Order Details</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Order details</small></h6>
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
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Order Details of Order No# <b>@if(sizeof($models)) {{ $models[0]->order_number }} @endif</b></h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Product</th>
										<th>Product Type</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Sub Total</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 0 ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ ++$counter }}.</td>
											@if($model->product_type=='item')
												<td>{{ $model->hasProduct->song_title }}</td>
												<td>
													<span class="label label-success">SONG</span>
												</td>
											@else 
												<td>{{ $model->hasEvent??'--' }}</td>
												<td><span class="label label-primary">EVENT</span></td>
											@endif
											<?php 
												$actual_price = $model->hasProduct->actual_price-$model->hasProduct->discount;
											?>
											<td>${{ number_format($actual_price) }}.00</td>
											<td><span class="badge badge-primary">{{ $model->quantity }}</span></td>
											<td>${{ number_format($actual_price) }}.00</td>
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

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_artist = $('#search_artist').val();
				var search_title = $('#search_title').val();
				var search_status = $('#search_status').val();
				fetchAll(search_artist, search_title, search_status);
			}));			

			function fetchAll(artist, title, status){
				$.ajax({
					url: '{{ url("/admin/bonusfootage/get_all_bonus_footages") }}',
					type: 'post',
					data: {'title':title, 'artist':artist, 'status':status},
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
