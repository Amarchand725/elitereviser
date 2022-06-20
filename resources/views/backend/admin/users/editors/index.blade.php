@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Editors</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Editors</li>
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
							<input id="search_by_all" class="form-control" placeholder="Serach By Name | Email | Phone Number" style="width: 100%">
						</div>
                        <div class="search-field col-sm-3">
							<select id="approve_status" class="form-control" style="width: 100%">
								<option value="All">Approve Status </option>
								<option value="1">Not Approve </option>
								<option value="2">Approved</option>
                                <option value="3">Rejected</option>
							</select>
						</div>
						<div class="search-field col-sm-2">
							<select id="search_status" class="form-control" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
                                <option value="3">Blocked</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="search-btn" class="btn btn-info">Search</button>
							<button type="submit" class="btn btn-warning" id="reset" style="border:none;">Reset</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Editors</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Image</th>
										<th>Editor Name</th>
										<th>Email</th>
                                        <th>Phone Number</th>
										<th>Is Approve</th>
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
											<td>
												@if(!empty($model->image))
													<img src="{{asset('public/images/customers')}}/{{ $model->image }}" style="width: 45px" height="45px" alt="">
												@else
													<img src="{{asset('public/assets/admin/main-assets/images/users/dummy.png')}}" style="width: 45px" height="45px" alt="">
												@endif
											</td>
											<td>{{ $model->name }}</td>
											<td>{{ $model->email }}</td>
											<td>{{ $model->phone_number }}</td>
											<td>
                                                @if($model->is_approved==1)
                                                    <span title="Waiting for approval" class="label label-warning">Not Approve</span>
                                                @elseif($model->is_approved==2)
                                                    <span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
                                                @elseif($model->is_approved==3)
                                                    <span title="{{ $model->approved_reason }}" class="label label-danger">Reejcted</span>
                                                @endif
                                            </td>
											<td>
												@if($model->status==1)
                                                <span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
                                                @elseif($model->status==3)
												<span class="label label-danger" title="Block date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Blocked</span>
                                                @else
                                                    <span class="label label-warning" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
												@endif
											</td>
											<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
											<td>
												<button class="btn btn-primary btn-sm approve-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Approve Editor" id=""><i class="fa fa-edit"></i></button>
												<button class="btn btn-warning btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Active Editor"><i class="fa fa-check"></i></button>
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="10">
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

	<!-- Add approve Modal -->
	<div class="modal fade" id="add-approve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Approve Editor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" action="{{ url('admin/approve/editor') }}">
					@csrf
					<input type="hidden" name="editor_id" id="editor_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Approve <span style="color:red">*</span></label>
							<select name="approve_status" id="" class="form-control" required>
								<option value="" selected>Select approve status</option>
								<option value="2">Approve</option>
								<option value="3" >Reject</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Approve or Reject Reason </label>
							<textarea name="reason" class="form-control" placeholder="Enter details"></textarea>
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
	<!-- Add approve Modal -->

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

				<form method="post" action="{{ url('admin/status/editor') }}">
					@csrf
					<input type="hidden" name="editor_id" id="status_editor_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Status <span style="color:red">*</span></label>
							<select name="status" id="" class="form-control" required>
								<option value="" selected>Select status</option>
								<option value="1">Active</option>
								<option value="2">In-Active</option>
								<option value="3">Block</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Active or In-active Reason </label>
							<textarea name="reason" class="form-control" placeholder="Enter details"></textarea>
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
	<!-- Active Modal -->
@endsection
@section('js')

<script>
 $(document).ready(function(){

    $(document).on('click', '.approve-btn', function(){
        $('#add-approve-modal').modal('show');
        var approve_id = $(this).val();
		$('#editor_id').val(approve_id);
    });

    $(document).on('click', '.active-btn', function(){
        $('#add-active-modal').modal('show');
        var id = $(this).val();
        $('#status_editor_id').val(id);
    });

      $(document).on('click', '#search-btn', function(){
        var search_by_all = $('#search_by_all').val();
        var approve_status = $('#approve_status').val();
        var search_status = $('#search_status').val();
        var page = 1;
        fetch_data(page, search_by_all, approve_status, search_status );
      });

      $(document).on('click', '#reset', function(){
		  alert('working');
        var search_by_all = "";
        var approve_status = "All";
        var search_status = "All";
        var page = 1;
        $('#search_status option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#approve_status option').prop('selected', function() {
            return this.defaultSelected;
        });
        fetch_data(page, search_by_all,approve_status, search_status );
      });


      $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search_by_all = $('#search_by_all').val();
        var approve_status = $('#approve_status').val();
        var search_status = $('#search_status').val();
        fetch_data(page, search_by_all, approve_status, search_status );
      });

      function fetch_data(page, search_by_all, approve_status, search_status ){
        $.ajax({
          url:'{{ url("admin/all_editors") }}?page='+page+'&search_by_all='+search_by_all+'&approve_status='+approve_status+'&search_status='+search_status,
          success:function(data){
            $('#body').html(data);
          }
        });
      }
    });
</script>
@endsection
