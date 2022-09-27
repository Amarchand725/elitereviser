@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Event</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Event</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h4 class="m-t-0 text-info"></h4>
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
						<h4 class="card-title">Add New Event</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('artist/event/store') }}" enctype="multipart/form-data">
									@csrf
				
									<input type="hidden" name="artist_id" value="{{ Auth::user()->id }}">
									<input type="hidden" name="commission_percent" id="commission-percent" value="{{ $commission }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Event Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" class="form-control" placeholder="Enter event title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Venue <span style="color:red">*</span></label>
												<input type="text" name="venue" class="form-control" placeholder="Enter venue place">
												<span style="color: red">{{ $errors->first('venue') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Start Date <span style="color:red">*</span></label>
												<input type="date" name="start_date" id="start-date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" class="form-control">
												<span id="error-start-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('start_date') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">End Date <span style="color:red">*</span></label>
												<input type="date" name="end_date" id="end-date" value="" min="{{ date('Y-m-d') }}" class="form-control">
												<span id="error-end-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('end_date') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Start Time <span style="color:red">*</span></label>
												<input type="time" name="start_time" value="" class="form-control">
												<span style="color: red">{{ $errors->first('start_time') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">End Time <span style="color:red">*</span></label>
												<input type="time" name="end_time" value="" class="form-control">
												<span style="color: red">{{ $errors->first('end_time') }}</span>
											</div>
										</div>
				
										<div class="row">
											<div class="col-md-6" id="total_tickets">
												<label for="">Total Tickets</label>
												<input type="number" name="total_tickets" id="" class="form-control" placeholder="Enter event no of tickets">
											</div>
											<div class="col-md-6">
												<br />
												<div class="form-check form-check-inline">
													<input class="form-check-input" name="free" type="checkbox" id="free" value="1">
													<label class="form-check-label" for="free"> Free</label>
												  </div>												  
											</div>
										</div>
										<div class="row" id="ticket-price">
											<div class="col-md-6">
												<label for="">Per Ticket Actual Price </label>
												<input type="number" name="ticket_actual_price" id="per_ticket_actual_price" class="form-control" placeholder="Enter per ticket price">
											</div>
											<div class="col-md-6">
												<label for="">Per Ticket Retial Price with Admin {{ $commission }}% Charges </label>
												<input type="number" name="ticket_retial_price" id="per_ticket_retial_price" class="form-control" readonly>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<label for="">Description</label>
												<textarea name="description" id="" class="form-control" placeholder="describe event"></textarea>
											</div>
										</div>
									</div>
									<div class="row" id="pageLoader">
										<div class="col-md-12" style="text-align: center">
											<img width="250px"  src="{{ asset('public/images/g-loader.gif') }}" alt="">
										</div>
									</div>
									<div class="modal-footer">
										<!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
										<button type="submit" id="sbt-btn" class="btn btn-success">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
	    $(document).on('click', '#sbt-btn', function(){
			$('#pageLoader').show();
			$("#sbt-btn").hide();
		});

		$(function () {
			$('#pageLoader').hide();
			$("#sbt-btn").show()
		})
		
		$('#start-date').on('change', function(){
			var start_date = $(this).val();
			var end_date = $('#end-date').val();
			if(end_date != null && new Date(start_date) >= new Date(end_date))
			{//compare end <=, not >=
				$('#error-start-date').html('This is date can not be greater than end date.');
			}else{
				$('#error-start-date').html('');
				$('#error-end-date').html('');
			}
		});

		$('#end-date').on('change', function(){
			var end_date = $(this).val();
			var start_date = $('#start-date').val();
			if(new Date(end_date) < new Date(start_date))
			{//compare end <=, not >=
				$('#error-end-date').html('This is date can not be less than start date.');
			}else{
				$('#error-end-date').html('');
				$('#error-start-date').html('');
			}
		});


		$( "#per_ticket_actual_price" ).keyup(function() {
			var percent = parseInt($('#commission-percent').val());
			var actual_price = $(this).val();
			var admin_charges = actual_price*percent/100;
			var retail_price = parseInt(actual_price)+parseInt(admin_charges);
			if(actual_price==''){
				$('#per_ticket_retial_price').val(0);
			}else{
				$('#per_ticket_retial_price').val(retail_price);
			}
		})

		$('#discount').keyup(function(){
			var percent = parseInt($('#commission-percent').val());
			var discount = $(this).val();
			var actual_price = $('#actual-price').val();
			if(discount != ''){
				var final_actual_price = parseInt(actual_price)-parseInt(discount);
				var admin_charges = final_actual_price*percent/100;
				var retail_price = parseInt(final_actual_price)+parseInt(admin_charges);
			}else{
				var admin_charges = actual_price*percent/100;
				var retail_price = parseInt(actual_price)+parseInt(admin_charges);
			}
			
			if(actual_price==''){
				$('#retail_price').val(0);
			}else{
				$('#retail_price').val(retail_price);
			}
		});

		$('#free').click(function() {
			var checked = $(this).prop('checked');
			if(checked==true){
				$('#ticket-price').hide();
				$('#total_tickets').hide();
			}else{
				$('#ticket-price').show();
				$('#total_tickets').show();
			}
		});

		// $(document).on('change', '#search_parent_category', function(){
		// 	var cat_id = $(this).val();
		// 	$.ajax({
		// 		url: '{{ url("/get_sub_parent_categories") }}/'+cat_id,
		// 		type: 'get',
		// 		success: function(response){
		// 			var html = "";
		// 			html += '<option value="All" selected>Select sub parent category</option>';
		// 			$.each(response, function(index, val) {
		// 				if(val.id==response['sub_parent_category_id']){
		// 					html += "<option value='"+ val.id +"' selected>"+val.name +"</option>";
		// 				}else{
		// 					html += "<option value='"+ val.id +"' >"+val.name +"</option>";
		// 				}
		// 			});
		// 			$('#search_sub_parent_category').html(html);
		// 		}
		// 	});
		// });

		// //get all products
		// $(document).ready(function(){
		// 	fetchAll(null,null,null,null);
		// 	$('#searchBtn').on('click',(function(e) {
		// 		var search_product_name = $('#search_product_name').val();
		// 		var search_parent_category = $('#search_parent_category').val();
		// 		var search_sub_parent_category = $('#search_sub_parent_category').val();
		// 		var searched_by_status = $('#search_product_status').val();
		// 		fetchAll(search_product_name, search_parent_category, search_sub_parent_category, searched_by_status);
		// 	}));

		// 	function fetchAll(name, parent_category_id, sub_parent_category_id, status){
		// 		$.ajax({
		// 			url: '{{ url("/get_all_products") }}',
		// 			type: 'post',
		// 			data: {'name':name, 'parent_category_id':parent_category_id, 'sub_parent_category_id':sub_parent_category_id, 'status':status},
		// 			headers: {
		// 				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
		// 			},
		// 			success: function(response){
		// 				createRows(response);
		// 				// console.log(response);
		// 			}
		// 		});
		// 	}
		// });

		// // // Create table rows
		// function createRows(response){
		// 	var len = 0;
		// 	$('#all_record tbody').empty(); // Empty <tbody>
		// 	if(response['data'] != null){
		// 		len = response['data'].length;
		// 	}

		// 	if(len > 0){
		// 		for(var i=0; i<len; i++){
		// 			var id = response['data'][i].id;
		// 			var image = response['data'][i].image;
		// 			var parent_category = response['data'][i].has_parent_category.name;
		// 			var sub_parent_category_id = response['data'][i].has_sub_parent_category.name;
		// 			var name = response['data'][i].name;
		// 			var unit_price = response['data'][i].unit_price;
		// 			var purchase_price = response['data'][i].purchase_price;
		// 			var status = response['data'][i].status;
		// 			var path = "{{ asset('/images/product_images') }}/"+image;
		// 			var tr_str = "<tr id='tr-remove"+id+"'>" +
		// 				"<td>" + (i+1) + "</td>" +
		// 				"<td> <img src='"+path+"' width='40px' /></td>" +
		// 				"<td>" + parent_category + "</td>" +
		// 				"<td>" + sub_parent_category_id + "</td>" +
		// 				"<td>" + name + "</td>" +
		// 				"<td>" + unit_price + "</td>" +
		// 				"<td>" + purchase_price + "</td>";
		// 				if(status==1){
		// 					tr_str +="<td><span class='label label-success'>Active</span></td>";
		// 				}else{
		// 					tr_str +="<td><span class='label label-danger'>Deactive</span></td>";
		// 				}
		// 				tr_str += "<td>"+
		// 					"<a href='{{ url('/product') }}/"+id+"/edit' class='btn btn-sm btn-icon btn-warning' id='edit-btn' value='"+id+"' data-toggle='tooltip' title='Update Product'><i class='mdi mdi-border-color'></i></a>"+
		// 					"<a  onclick='deleteData("+id+")' class='btn btn-sm btn-icon btn-danger' style='color:#fff; margin-left:5px'  data-toggle='tooltip' title='Delete Category'><i class='fa fa-trash-alt'></i></a>"+
		// 				"</td>";
		// 				tr_str += "<td>  </td>" +
		// 			"</tr>";

		// 			$("#all_record tbody").append(tr_str);
		// 		}
		// 	}else{
		// 		var tr_str = "<tr>" +
		// 			"<td align='center' colspan='8'>No record found.</td>" +
		// 		"</tr>";

		// 		$("#all_record tbody").append(tr_str);
		// 	}
		// }
		// /* Categories Get With Search  */
	</script>
@endsection
