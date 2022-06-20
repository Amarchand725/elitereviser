@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All Products</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Products</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Products</small></h6>
								<h4 class="m-t-0 text-info">
									{{--  --}}
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
								<input type="text" class="form-control" name="" id="search_product_name" placeholder="Search product name">
							</div>
						</div>

						<div class="col-md-2">
							<select name="" id="search_parent_category" class="form-control">
								<option value="All" selected>Select parent category</option>
								{{-- @foreach ($parent_categories as $parent_cat)
									<option value="{{ $parent_cat->id }}">{{ $parent_cat->name }}</option>
								@endforeach --}}
							</select>
						</div>

						<div class="col-md-2">
							<select name="" id="search_sub_parent_category" class="form-control">
								<option value="All" selected>Select sub parent category</option>
								{{-- @foreach ($sub_parent_categories as $parent_cat)
									<option value="{{ $parent_cat->id }}">{{ $parent_cat->name }}</option>
								@endforeach --}}
							</select>
						</div>

						<div class="search-field col-sm-3">
							<select name="" id="search_product_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							<!-- <button type="button" id="" class="btn btn-success">Add Product</button> -->
							<a href="{{ url('/product/create') }}" class="btn btn-success">Add Product</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Products</h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>SN#</th>
										<th>Image</th>
										<th>Parent Category</th>
										<th>Sub Category</th>
										<th>Name</th>
										<th>Unit Price</th>
										<th>Purchase Price</th>
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
	{{-- <div class="modal fade" id="add-brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" id="brandForm" name="brandForm" action="javascript:void(0)" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
						<div class="row">
							<div class="col-md-12">
								<label for="">Brand Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter brand name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="">Brand URL</label>
								<input type="text" name="url" class="form-control" placeholder="Enter brand url">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="">Image</label>
								<input type="file" id='file' name="filename" onchange="previewFile(this);" class="form-control">
							</div>
						</div>
						{{-- <div class="row">
							<div class="col-md-12">
								<img id="previewImg" width="50px" src="" alt="Uploaded Image" />
							</div>
						</div> --}}
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
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div> --}}

	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
		function previewFile(input){
			var file = $("input[type=file]").get(0).files[0];

			if(file){
				var reader = new FileReader();

				reader.onload = function(){
					$("#previewImg").attr("src", reader.result);
				}

				reader.readAsDataURL(file);
			}
		}

		$(document).on('change', '#search_parent_category', function(){
			var cat_id = $(this).val();
			$.ajax({
				url: '{{ url("/get_sub_parent_categories") }}/'+cat_id,
				type: 'get',
				success: function(response){
					var html = "";
					html += '<option value="All" selected>Select sub parent category</option>';
					$.each(response, function(index, val) {
						if(val.id==response['sub_parent_category_id']){
							html += "<option value='"+ val.id +"' selected>"+val.name +"</option>";
						}else{
							html += "<option value='"+ val.id +"' >"+val.name +"</option>";
						}
					});
					$('#search_sub_parent_category').html(html);
				}
			});
		});

		//get all products
		$(document).ready(function(){
			fetchAll(null,null,null,null);
			$('#searchBtn').on('click',(function(e) {
				var search_product_name = $('#search_product_name').val();
				var search_parent_category = $('#search_parent_category').val();
				var search_sub_parent_category = $('#search_sub_parent_category').val();
				var searched_by_status = $('#search_product_status').val();
				fetchAll(search_product_name, search_parent_category, search_sub_parent_category, searched_by_status);
			}));

			function fetchAll(name, parent_category_id, sub_parent_category_id, status){
				$.ajax({
					url: '{{ url("/get_all_products") }}',
					type: 'post',
					data: {'name':name, 'parent_category_id':parent_category_id, 'sub_parent_category_id':sub_parent_category_id, 'status':status},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						createRows(response);
						// console.log(response);
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
					var image = response['data'][i].image;
					var parent_category = response['data'][i].has_parent_category.name;
					var sub_parent_category_id = response['data'][i].has_sub_parent_category.name;
					var name = response['data'][i].name;
					var unit_price = response['data'][i].unit_price;
					var purchase_price = response['data'][i].purchase_price;
					var status = response['data'][i].status;
					var path = "{{ asset('/images/product_images') }}/"+image;
					var tr_str = "<tr id='tr-remove"+id+"'>" +
						"<td>" + (i+1) + "</td>" +
						"<td> <img src='"+path+"' width='40px' /></td>" +
						"<td>" + parent_category + "</td>" +
						"<td>" + sub_parent_category_id + "</td>" +
						"<td>" + name + "</td>" +
						"<td>" + unit_price + "</td>" +
						"<td>" + purchase_price + "</td>";
						if(status==1){
							tr_str +="<td><span class='label label-success'>Active</span></td>";
						}else{
							tr_str +="<td><span class='label label-danger'>Deactive</span></td>";
						}
						tr_str += "<td>"+
							"<a href='{{ url('/product') }}/"+id+"/edit' class='btn btn-sm btn-icon btn-warning' id='edit-btn' value='"+id+"' data-toggle='tooltip' title='Update Product'><i class='mdi mdi-border-color'></i></a>"+
							"<a  onclick='deleteData("+id+")' class='btn btn-sm btn-icon btn-danger' style='color:#fff; margin-left:5px'  data-toggle='tooltip' title='Delete Category'><i class='fa fa-trash-alt'></i></a>"+
						"</td>";
						tr_str += "<td>  </td>" +
					"</tr>";

					$("#all_record tbody").append(tr_str);
				}
			}else{
				var tr_str = "<tr>" +
					"<td align='center' colspan='8'>No record found.</td>" +
				"</tr>";

				$("#all_record tbody").append(tr_str);
			}
		}
		/* Categories Get With Search  */

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
						url:"{{ url('product') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Brand deleted successfully",icon:"success",timer:2000});
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
