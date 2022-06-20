@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Update Gallery</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Update Gallery</li>
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
						<h4 class="card-title">Update Gallery</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('admin/gallery/update') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="gallery_id" value="{{ $details->id }}">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Title <span style="color:red">*</span></label>
												<input type="text" name="title" id="title" value="{{ $details->title }}" class="form-control" placeholder="Enter title">
												<span style="color: red">{{ $errors->first('title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Date <span style="color:red">*</span></label>
												<input type="date" name="date" id="date" value="{{ $details->date }}" class="form-control">
												<span style="color: red">{{ $errors->first('date') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Time <span style="color:red">*</span></label>
												<input type="time" name="time" id="venue" value="{{ $details->time }}" class="form-control">
												<span style="color: red">{{ $errors->first('time') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Venue <span style="color:red">*</span></label>
												<input type="text" name="venue" id="venue" value="{{ $details->venue }}" class="form-control" placeholder="Enter Venue">
												<span style="color: red">{{ $errors->first('venue') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Description</label>
												<textarea name="description" id="" class="form-control" placeholder="Enter description">{{ $details->description }}</textarea>
												<span style="color: red">{{ $errors->first('description') }}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="">Upload Gallery Images <small>You can upload multiple images also</small> <span style="color:red">*</span></label>
												<input type="file" name="images[]" accept="image/*" multiple class="form-control">
												<span style="color: red">{{ $errors->first('images') }}</span>
											</div>
											
										</div>
										<div class="row">
											@foreach ($details->hasAllImages as $item)
												<div class="col-md-2" id="ri-{{ $item->id }}">
													<div>
														<span onclick='deleteData("{{ $item->id }}")' title="Delete Image" style="color:red; margin-left:140px; cursor:pointer">
															<i class="fa fa-times"></i>
														</span>
														<img width="150" height="130" src="{{ asset('public/images/gallery') }}/{{ $item->image }}" alt="">
													</div>
												</div>
											@endforeach
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
			$("#sbt-btn").hide(); //disable 
		});

		$(function () {
			$('#pageLoader').hide();
			$("#sbt-btn").show()
		})
		/* Delete image */
		function deleteData(id) {
			swal({title:"",
				text:"Are you sure you want to delete?",icon:"error",
				buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
					confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
			}).then(function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type:"post",
						url:"{{ url('admin/gallery/delete-image') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#ri-'+id).fadeOut(500);
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
