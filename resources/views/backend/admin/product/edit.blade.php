@extends('admin.layout.master')
@section('content')
	<style>
		.error{ color:red; } 
	</style>
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0"> Edit Product</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All Products</li>
					</ol>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"> Edit Product</h3>
					<hr /> 
					<form method="post" id="create-form" name="create-form" action="javascript:void(0)" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{ $details->id }}">
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Brand</label>
									<select name="brand_id" id="brand_id" class="form-control">
										<option value="" selected>Select brand</option>
										@foreach($brands as $brand)
											<option value="{{ $brand->id }}" {{ $details->brand_id==$brand->id?'selected':'' }}>{{ $brand->name }}</option>
										@endforeach
									</select>
									<span class="text-danger">{{ $errors->first('brand_id') }}</span>
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Parent Category</label>
									<select name="parent_category_id" id="parent_category_id" class="form-control">
										<option value="" selected>Select parent category</option>
										@foreach($parent_categories as $parent_category)
											<option value="{{ $parent_category->id }}" {{ $details->parent_category_id==$parent_category->id?'selected':'' }}>{{ $parent_category->name }}</option>
										@endforeach
									</select>
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Sub Parent Category</label>
									<select name="sub_parent_category_id" id="sub_parent_category_id" class="form-control">
										<option value="" selected>Select sub parent category</option>
										@foreach($sub_categories as $sub_category)
											<option value="{{ $sub_category->id }}" {{ $details->sub_parent_category_id==$sub_category->id?'selected':'' }}>{{ $sub_category->name }}</option>
										@endforeach
									</select>
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Category</label>
									<select name="category_id" id="category_id" class="form-control">
										<option value="" selected>Select category</option>
										@foreach($sub_sub_categories as $sub_sub_category)
											<option value="{{ $sub_sub_category->id }}" {{ $details->category_id==$sub_sub_category->id?'selected':'' }}>{{ $sub_sub_category->name }}</option>
										@endforeach
									</select>
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Name</label>
									<input type="text" name="name" value="{{ $details->name }}" class="form-control" placeholder="Enter product name">
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Unit</label>
									<input type="text" name="unit" value="{{ $details->unit }}" class="form-control" placeholder="Enter unit">
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Unit Price</label>
									<input type="number" name="unit_price" value="{{ $details->unit_price }}" class="form-control" placeholder="Enter unit price">
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Purchase Price</label>
									<input type="number" name="purchase_price" value="{{ $details->purchase_price }}" class="form-control" placeholder="Enter purchase price">
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Tax</label>
									<select name="tax" id="" class="form-control">
										<option value="yes" {{ $details->tax=='yes'?'selected':'' }}>Yes</option>
										<option value="no" {{ $details->tax=='no'?'selected':'' }}>No</option>
									</select>
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Tax Rate</label>
									<input type="number" name="tax_rate" value="{{ $details->tax_rate }}" class="form-control" placeholder="Enter tax rate">
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Discount Type</label>
									<select name="discount_type" id="" class="form-control">
										<option value="" selected>Select discount type</option>
									</select>
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Discount</label>
									<input type="number" name="discount" value="{{ $details->discount }}" class="form-control" placeholder="Enter discount">
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Quantity</label>
									<input type="number" name="quantity" value="{{ $details->quantity }}" class="form-control" placeholder="Enter quantity">
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Status</label>
									<select name="status" id="" class="form-control">
										<option value="1" {{ $details->status==1?'selected':'' }}>Active</option>
										<option value="2" {{ $details->status==0?'selected':'' }}>Deactive</option>
									</select>
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<label for="">Description</label>
									<textarea name="description" id="" class="form-control" placeholder="Enter description">{{ $details->details }}</textarea>
								</div>	
							</div>
							<div class="col-sm-6">
								<div class="group">
									<label for="">Image</label>
									<input type="file" name="filename" class="form-control">
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<div class="group">
									<img src="{{ asset('/images/product_images') }}/{{ $details->image }}" alt="Product Image" width="50px">
								</div>	
							</div>
						</div>
						<br /><br /><hr />
						<div class="row">
							<div class="col-sm-6">
								<div class="group">
									<button type="submit" id="send_form" class="btn btn-info"> Update</button>
									<!-- <button class="btn btn-warning">Reset</button> -->
								</div>	
							</div>
						</div>
						<br /><br />
					</form>
				</div>
			</div>
		</div>
	</div>  

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
		
		if ($("#create-form").length > 0) {
			$("#create-form").validate({
				rules: {
					brand_id: "required",
					sub_parent_category_id: "required",
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
					
					if(file_data.length==1){
						data.append("filename", file_data[0]);
					}else{
						data.append("filename", []);
					}
					// for (var i = 0; i < file_data.length; i++) {
					// 	data.append("filename[]", file_data[i]);
					// }

					$.ajax({
						type:'Post',
						url: "{{url('/update_product')}}",
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
					console.log(response);
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