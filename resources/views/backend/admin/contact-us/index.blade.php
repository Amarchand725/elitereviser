@extends('backend.admin.layout.master')
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Inbox</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Inbox</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
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
						<div class="search-field col-sm-5">
							<input id="search_by_all" class="form-control" placeholder="Serach By Email" style="width: 100%">
						</div>

						<div class="search-field col-sm-5">
							<select id="search_status" class="form-control" style="width: 100%">
								<option value="All" selected="selected">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="search-btn" class="btn btn-info">Search</button>
							<button type="submit" id="reset" class="btn btn-warning" style="border:none;">Reset</button>
							<!-- <a href="{{ url('customer/create') }}" class="btn btn-success">Add Artist</a> -->
                        </div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Inbox</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
                                        <th>Status</th>
                                        <th>Registration</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1 ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ $counter++ }}.</td>
											<td>{{ $model->name }}</td>
											<td>{{ $model->email }}</td>
                                            <td>{{ $model->phone_number }}</td>
											<td>
												@if($model->is_read==1)
                                                	<span class="label label-success">Read</span>
                                                @else
                                                    <span class="label label-warning">Unread</span>
												@endif
											</td>
                                            <td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
											<td>
												<button class="btn btn-info btn-sm status-btn" value="{{ $model->id }}" data-message="{{ $model->message }}" data-toggle="tooltip" data-original-title="Read Status"><i class="fa fa-edit"></i></button>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Status Modal -->
	<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="javascript:void(0)" id='contact-status'>
					@csrf
					<input type="hidden" name="contact_us_id" id="contact_us_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="status" class="form-control" required>
								<option value="0" selected>Unread</option>
								<option value="1" >Read</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Message </label>
							<textarea id="read-message" rows="10" class="form-control" readonly></textarea>
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
	<!-- Status Modal -->
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$( "#contact-status" ).submit(function( event ) {
			$("#contact-status").validate({
				rules: {
					status: "required",
				},
				messages: {
					required: "This field is required",
				},
				submitHandler: function(form) {
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
					});
					$('#submit').html('Sending..');
					var data = new FormData();

					//Form data
					var form_data = $('#contact-status').serializeArray();
					$.each(form_data, function (key, input) {
						data.append(input.name, input.value);
					});

					$.ajax({
						type:'POST',
						url: "{{url('admin/status/contact-us')}}",
						data:data,
						cache:false,
						contentType: false,
						processData: false,
						success:function(data){
							// console.log(data);
							if(data == 1){
								Swal.fire({
									position: 'top-end',
									icon: 'success',
									title: 'Status updated successfully',
									showConfirmButton: false,
									timer: 2000
								})
								setTimeout(function () {
									location.href = "{{ url('admin/contact-us') }}"
								}, 2000);
							}else{
								Swal.fire({
									position: 'top-end',
									icon: 'warning',
									title: 'Something went wrong!',
									showConfirmButton: false,
									timer: 2000
								})
							} 
						},
						error: function (er) {
							console.log(er);
							Swal.fire({
								position: 'top-end',
								icon: 'warning',
								title: 'Something went wrong!',
								showConfirmButton: false,
								timer: 2000
							})
						}
					});
				}
			})
		});
	
		$(document).ready(function(){
			$(document).on('click', '.status-btn', function(){
				$('#status-modal').modal('show');
				var id = $(this).val();
				var message = $(this).attr('data-message');
				$('#contact_us_id').val(id);
				$('#read-message').val(message);
			});

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
				url:'{{ url("admin/all_contact_us") }}?page='+page+'&search_by_all='+search_by_all+'&search_status='+search_status,
				success:function(data){
					$('#body').html(data);
				}
				});
			}
		});
	</script>
@endsection