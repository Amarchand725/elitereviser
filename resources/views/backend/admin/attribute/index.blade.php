@extends('admin.layout.master')
@section('content')
	
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Attribute</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Attribute</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Attribute</small></h6>
								<h4 class="m-t-0 text-info">
									<?php if(!empty($user_sales_leads)){ 
										echo str_pad(count($user_sales_leads),4,0,STR_PAD_LEFT);?>
									<?php }?>
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
							<input type="text" class="form-control" name="attribute_name" id="search_name" placeholder="Search brand name">
							</div>
						</div>

						<div class="col-md-4" style="margin-bottom: 10px;" >
							<div class="search-field">
								<select name="searchData" id="search_status" class="select2" style="width: 100%">
									<option value="All">All Status </option>
									<option value="1">Active </option>
									<option value="2">Inactive</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="search-button" style="float:right;">
								<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
								<button type="button" id="add-attribute" class="btn btn-success">Add Attribute</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Attributes</h4> 
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
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

	<!-- Add brand Modal -->
	<div class="modal fade" id="add-attribute-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Attribute</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" id="attributeForm" name="attributeForm" action="javascript:void(0)" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
						<div class="row">
							<div class="col-md-12">
								<label for="">Brand Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter brand name">
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
						<button type="submit" id="send_form" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Add Brand Modal -->

	<!-- Edit Modal -->
	<div class="modal fade" id="edit-attribute-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> Edit Attribute</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="editAttributeForm" class="btn-submit" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
						<input type="hidden" id="id" name="id" value="">
						<div class="row">
							<div class="col-md-12">
								<label for="">Attribute Name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter brand name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="">Status</label>
								<select name="status" id="brand_status" class="form-control">
									<option value="1" selected>Active</option>
									<option value="0" >Deactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" id="edit" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Category Modal -->
	
	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	
	<script>

		//insert
		if ($("#attributeForm").length > 0) {
			$("#attributeForm").validate({
				rules: {
					name: "required",
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
					$('#send_form').html('Sending..');
					var data = new FormData();

					//Form data
					var form_data = $('#attributeForm').serializeArray();
					$.each(form_data, function (key, input) {
						data.append(input.name, input.value);
					});

					$.ajax({
						type:'POST',
						url: "{{url('/attribute')}}",
						data:data,
						cache:false,
						contentType: false,
						processData: false,
						success:function(data){
							console.log(data);
							swal({title:"Successfully!",text:"Attribute added successfully",icon:"success",timer:2000});
							setTimeout(function () {
								location.href = "{{ url('/attribute') }}"
							}, 2000);
						},
						error: function (er) {
							console.log(er);
							$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
						}
					});
				}
			})
		}

		//update
		if ($("#editAttributeForm").length > 0) {
			$("#editAttributeForm").validate({
				rules: {
					name: "required",
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
					$('#edit').html('Sending..');
					var data = new FormData();

					//Form data
					var form_data = $('#editAttributeForm').serializeArray();
					$.each(form_data, function (key, input) {
						data.append(input.name, input.value);
					});

					$.ajax({
						type:'POST',
						url: "{{url('/update_attribute')}}",
						data:data,
						cache:false,
						contentType: false,
						processData: false,
						success:function(data){
							// console.log(data);
							swal({title:"Successfully!",text:"Attribute added successfully",icon:"success",timer:2000});
							setTimeout(function () {
								location.href = "{{ url('/attribute') }}"
							}, 2000);
						},
						error: function (er) {
							console.log(er);
							$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
						}
					});
				}
			})
		}

 	</script>
	<script >
		//Add brand Modal
		$(document).on('click', '#add-attribute', function(){
			$('#add-attribute-modal').modal('show');
		});

		//get all brand
		$(document).ready(function(){
			fetchAll(null,null);
			$('#searchBtn').on('click',(function(e) {
				var searched_by_name = $('#search_name').val();
				var searched_by_status = $('#search_status').val();
				fetchAll(searched_by_name, searched_by_status);
			}));			

			function fetchAll(name, status){
				$.ajax({
					url: '{{ url("/get_all_attributes") }}',
					type: 'post',
					data: {'name':name, 'status':status},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						createRows(response);
						console.log(response);
					}
				});
			}
		});

		// // Create table rows
		function createRows(response){
			var len = 0;
			$('#all_record tbody').empty(); // Empty <tbody>
			if(response['data'] != null){
				len = response['data'].length;
			}

			if(len > 0){
				for(var i=0; i<len; i++){
					var id = response['data'][i].id;
					var name = response['data'][i].name;
					var status = response['data'][i].status;
					var tr_str = "<tr id='tr-remove"+id+"'>" +
						"<td>" + (i+1) + "</td>" +
						"<td>" + name + "</td>";
						if(status==1){
							tr_str +="<td><span class='label label-success'>Active</span></td>";
						}else{
							tr_str +="<td><span class='label label-danger'>Deactive</span></td>";
						}
						tr_str += "<td>"+
							"<button class='btn btn-sm btn-icon btn-warning' id='edit-btn' value='"+id+"' data-toggle='tooltip' title='Update Category'><i class='mdi mdi-border-color'></i></button>"+
							"<a  onclick='deleteData("+id+")' class='btn btn-sm btn-icon btn-danger' style='color:#fff; margin-left:5px'  data-toggle='tooltip' title='Delete Category'><i class='fa fa-trash-alt'></i></a>"+
						"</td>";
						tr_str += "<td>  </td>" +
					"</tr>";

					$("#all_record tbody").append(tr_str);
				}
			}else{
				var tr_str = "<tr>" +
					"<td align='center' colspan='4'>No record found.</td>" +
				"</tr>";

				$("#all_record tbody").append(tr_str);
			}
		} 
		/* Categories Get With Search  */ 

		/* Edit Brand modal */
		$(document).on('click', '#edit-btn', function(e){
			var id = $(this).val();
			$.ajax({
				url: '{{ url("/attribute/") }}/'+id+'/edit',
				type: 'get',
				success: function(response){
					$('#id').val(id);
					$('#name').val(response['name']);
					$('#status').val(response['status']);
					$('#edit-attribute-modal').modal('show');
				}
			});
		});
		/* Edit Brand */
		
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
						url:"{{ url('attribute') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Attribute deleted successfully",icon:"success",timer:2000});
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




