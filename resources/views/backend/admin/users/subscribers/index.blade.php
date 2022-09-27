@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Subscribers</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Subscribers</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<!--<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Customers</small></h6>
								<h4 class="m-t-0 text-info">
                                    {{ count($models)}}
                                </h4>
							</div>-->
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
							<input id="search_by_all" class="form-control" placeholder="Serach By Email" style="width: 100%">
						</div>

						<div class="search-field col-sm-2">
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
						<h4 class="card-title">All Subscribers</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										{{-- <th>Image</th>
										<th>Name</th> --}}
										<th>Email</th>
										<th>Status</th>
                                        <th>Registration</th>
                                        {{-- <th>Phone</th>


										<th>Action</th> --}}
									</tr>
								</thead>
								<tbody id="body">
									<?php $counter = 1 ?>
									@foreach ($models as $model)
										<tr>
											<td>{{ $counter++ }}.</td>
											{{-- <td>
												@if(!empty($model->image))
													<img src="{{asset('public/images/customers')}}/{{ $model->image }}" style="width: 45px" height="45px" alt="">
												@else
													<img src="{{asset('public/assets/admin/main-assets/images/users/dummy.png')}}" style="width: 45px" height="45px" alt="">
												@endif
											</td>
											<td>{{ $model->name }}</td> --}}
											<td>{{ $model->email }}</td>
											<td>
												@if($model->status==1)
                                                <span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
                                                @elseif($model->status==3)
												<span class="label label-danger" title="Block date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Blocked</span>
                                                @else
                                                    <span class="label label-warning" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
                                            {{--  <td>{{ $model->phone_number }}</td> --}}

											<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
											{{-- <td>
												<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Active Audience"><i class="fa fa-edit"></i></button>
											</td> --}}
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

				<form method="post" action="{{ url('/admin/status/customer') }}">
					@csrf
					<input type="hidden" name="customer_id" id="status_customer_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="1">Active</option>
								<option value="2" >In-Active</option>
                                <option value="3" >Block</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Active or In-active Reason </label>
							<textarea name="reason" class="form-control" placeholder="Enter details" ></textarea>
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
@endsection
@section('js')

<script>
 $(document).ready(function(){


    $(document).on('click', '.active-btn', function(){
        $('#add-active-modal').modal('show');
        var id = $(this).val();
        $('#status_customer_id').val(id);
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
          url:'{{ url("admin/all_subscribers") }}?page='+page+'&search_by_all='+search_by_all+'&search_status='+search_status,
          success:function(data){
            $('#body').html(data);
          }
        });
      }
    });
</script>
@endsection
