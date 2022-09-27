@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Abodoned</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Abodoned</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Abodoned</small></h6>
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
								<select name="item_search" id="search_item" class="form-control select2">
									<option value="All" selected>Search by item title</option>
									@foreach ($models as $model)
										@if($model->type=="item")
											<option value="{{ $model->product_id }}">{{ $model->hasAlbum->song_title }}</option>
										@else 
											<option value="{{ $model->product_id }}">{{ $model->hasEvent->title }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>

						<div class="search-field col-sm-3">
							<div class="search-field">
								<select name="" id="search_type" class="form-control select2">
									<option value="All">Search by type</option>
									<option value="item">Song</option>
									<option value="event">Event</option>
								</select>
							</div>
						</div>

						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="text" class="form-control" name="search_ip" value="" id="search_ip" placeholder="Search by ip address">
							</div>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
                            <!--<button type="submit" id="searchBtn" class="btn btn-primary" style="background: #f2024c; border:none;">Reset</button>-->
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Abodoned</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>#</th>
										<th>Item</th>
										<th>Type</th>
										<th>IP Address</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1; ?>
									@foreach ($models as $model)
										<tr id="tr-remove-{{ $model->id }}">
											<td>{{ $counter++ }}.</td>
											@if($model->type=='item')
												<td>{{ $model->hasAlbum->song_title }}</td>
											@else 
												<td>{{ $model->hasEvent->title }}</td>
											@endif
											<td>{{ $model->type }}</td>
											<td>{{ $model->ip_address }}</td>
											<td>{{ date('d/m/Y', strtotime($model->date)) }}</td>
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

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script>
		//get all products
		$(document).ready(function(){
			$('#searchBtn').on('click',(function(e) {
				var search_item = $('#search_item').val();
				var search_ip = $('#search_ip').val();
				var search_type = $('#search_type').val();
				fetchAll(search_item, search_ip, search_type);
			}));			

			function fetchAll(item, ip, type){
				$.ajax({
					url: '{{ url("/admin/abodoned/get-all-abodoned") }}',
					type: 'post',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					data: {'item':item, 'ip':ip, 'type':type},
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
						url:"{{ url('admin/coupon/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Coupon deleted successfully",icon:"success",timer:2000});
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
