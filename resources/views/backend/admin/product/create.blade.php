@extends('backend.admin.layout.master')
@section('content')
	<style>
		.error{ color:red; }
	</style>
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

	<div class="page-wrapper">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Product</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Products</li>
					</ol>
				</div>
			</div>
			<div class="content container-fluid">
				<div class="d-sm-flex align-items-center justify-content-between mb-2">
					<h1 class="h3 mb-0 text-black-50">Product</h1>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form method="post" id="create-form" name="create-form" action="javascript:void(0)" enctype="multipart/form-data">
							@csrf
							<div class="card">
								<div class="card-header">
									<h4>General Info</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="group">
												<label for="">Product Name</label>
												<input type="text" name="name" class="form-control" placeholder="Enter product name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="group">
												<label for="">Parent Category</label>
												<select name="parent_category_id" id="parent_category_id" class="form-control">
													<option value="" selected>Select parent category</option>
													{{-- @foreach($parent_categories as $parent_category)
														<option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
													@endforeach --}}
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="group">
												<label for="">Sub Parent Category</label>
												<select name="sub_parent_category_id" id="sub_parent_category_id" class="form-control">
													<option value="" selected>Select sub parent category</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="group">
												<label for="">Category</label>
												<select name="category_id" id="category_id" class="form-control">
													<option value="" selected>Select category</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="group">
												<label for="">Brand</label>
												<select name="brand_id" id="brand_id" class="form-control">
													<option value="" selected>Select brand</option>
													{{-- @foreach($brands as $brand)
														<option value="{{ $brand->id }}">{{ $brand->name }}</option>
													@endforeach --}}
												</select>
												<span class="text-danger">{{ $errors->first('brand_id') }}</span>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="group">
												<label for="">Unit</label>
												<select name="unit" id="unit" class="form-control">
													<option value="" selected>Select unit</option>
													{{-- @foreach($brands as $brand)
														<option value="{{ $brand->id }}">{{ $brand->name }}</option>
													@endforeach --}}
												</select>
												{{-- <span class="text-danger">{{ $errors->first('brand_id') }}</span> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-2">
								<div class="card-header">
									<h4>Variations</h4>
								</div>
								<div class="card-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="">Color :</label>
												<input type="checkbox" value="1" name="color-status" id="color-status" data-toggle="toggle" data-size="sm">
												<br /><br />
												<select name="color" disabled id="color" class="form-control">
													<option value="" selected>Select color</option>
													<option value="black">Black</option>
													<option value="white">White</option>
													<option value="red">Red</option>
													<option value="brown">Brown</option>
													<option value="yellow">Yellow</option>
													<option value="orange">Orange</option>
													<option value="blue">Blue</option>
												</select>
											</div>
											<div class="col-md-5">
												<br />
												<label for="">Attributes :</label>
												<select style="margin-top:10px" multiple name="attribute[]" id="attribute" class="form-control select2">
													{{-- @foreach ($attributes as $attribute)
														<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
													@endforeach --}}
												</select>
											</div>
										</div>
										<span id='more-variants'></span>
									</div>
								</div>
							</div>
							<div class="card mt-2">
								<div class="card-header">
									<h4>Product price & stock</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="group">
												<label for="">Unit Price</label>
												<input type="number" name="unit_price" class="form-control" placeholder="Enter unit price">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="group">
												<label for="">Purchase Price</label>
												<input type="number" name="purchase_price" class="form-control" placeholder="Enter purchase price">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="group">
												<label for="">Tax <span class="label label-success">Percent ( % )</span></label>
												<input type="number" name="tax_rate" class="form-control" placeholder="Enter tax rate">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="group">
												<label for="">Discount</label>
												<input type="text" name="discount" class="form-control" placeholder="Enter discount">
											</div>
										</div>
										<div class="col-sm-2">
											<div class="group">
												<label for=""></label>
												<select name="discount_type" id="" class="form-control selecte2">
													<option value="Flat" selected>Flat</option>
													<option value="percent">Percent</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="group">
												<label for="">Total Quantity</label>
												<input type="text" name="quantity" value="0" class="form-control" placeholder="Enter quantity">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-2">
								<div class="card-header">
									<h4>Product Details</h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<textarea name="description" id="" class="texteditor"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-2">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<label for="">Upload product images* ( ratio 1:1 )</label>
											<input type="file" name="filename" class="form-control">
										</div>
										<div class="col-sm-6">
											<label for="">Upload thumbnail* ( ratio 1:1 )</label>
											<input type="file" name="filename" class="form-control">
										</div>
									</div>
									<br />
									<div class="row">
										<div class="col-sm-6">
											<button type="submit" id="send_form" class="btn btn-success">Save</button>
											<button class="btn btn-warning">Reset</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		{{-- </div> --}}
	</div>

	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

	<script>
		$(document).on('change', '#attribute', function(event) {
			alert('sowring');
		});

		$(document).on('change', '#color-status', function(){
			if ($('#color-status').is(":checked"))
			{
				$("#color").prop('disabled', false);
			}else{
				$("#color").prop('disabled', true);
			}
		});

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

		if ($("#create-form").length > 0) {
			$("#create-form").validate({
				rules: {
					brand_id: "required",
					sub_parent_category_id: "required",
					filename: {
						required:true,
						// accept:"jpg,png,jpeg",
					},
					parent_category_id: "required",
					name: "required",
					unit: "required",
					unit_price: "required",
					purchase_price: "required",
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
					var form_data = $('#create-form').serializeArray();
					$.each(form_data, function (key, input) {
						data.append(input.name, input.value);
					});

					//File data
					var file_data = $('input[name="filename"]')[0].files;
					data.append("filename", file_data[0]);
					// for (var i = 0; i < file_data.length; i++) {
					// 	data.append("filename[]", file_data[i]);
					// }

					$.ajax({
						type:'POST',
						url: "{{url('/product')}}",
						data:data,
						cache:false,
						contentType: false,
						processData: false,
						success:function(data){
							// console.log(data);
							swal({title:"Successfully!",text:"Product added successfully",icon:"success",timer:2000});
							setTimeout(function () {
								location.href = "{{ url('/product') }}"
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

		//get sub parent categories
		$(document).on('change', '#parent_category_id', function(){
			var parent_cat_id = $(this).val();
			$.ajax({
				url: '{{ url("/get_sub_parent_categories") }}/'+parent_cat_id,
				type: 'get',
				success: function(response){
					// console.log(response);
					var html = "";
					html += '<option selected>Select sub parent category</option>';
					$.each(response, function(index, val) {
						html += "<option value='"+ val.id +"'>"+val.name +"</option>";
					});
					$('#sub_parent_category_id').html(html);
				}
			});
		});

		//get sub sub categories
		$(document).on('change', '#sub_parent_category_id', function(){
			var sub_parent_cat_id = $(this).val();
			$.ajax({
				url: '{{ url("/get_sub_sub_categories") }}/'+sub_parent_cat_id,
				type: 'get',
				success: function(response){
					console.log(response);
					var html = "";
					html += '<option selected>Select category</option>';
					$.each(response, function(index, val) {
						html += "<option value='"+ val.id +"'>"+val.name +"</option>";
					});
					$('#category_id').html(html);
				}
			});
		});
	</script>
@endsection
