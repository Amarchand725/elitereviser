@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="content">
							<h2 style="margin-bottom: 10px; ">Profile Setting</h2>
							@if(Session::has('message'))
								<p style="text-align: center" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
							@endif
							@if(Session::has('old-msg'))
								<p style="text-align: center" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('old-msg') }}</p>
							@endif
							<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
							  <li class="nav-item active">
								<a href="#profile" class="nav-link active signbtn" data-toggle="tab">PROFILE</a>
							  </li>
							  <li class="nav-item">
								<a href="#password" class="nav-link signbtn" data-toggle="tab">RESET PASSWORD</a>
							  </li>
							  <li class="nav-item">
								<a href="#social-links" class="nav-link signbtn" data-toggle="tab">Social Links</a>
							  </li>
							</ul>
							<br />
							<div id="my-tab-content" class="tab-content">
							  <div class="tab-pane active" id="profile">
								<form action="{{ url('/user/profile/update') }}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row">             
									  <div class="col-sm-2">
										<label for="">Full Name</label>
									  </div>
									  <div class="col-sm-10">
										<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
									  </div>
									</div>
									<br />
									<div class="row">             
									  <div class="col-sm-2">
										<label for="">Phone Number</label>
									  </div>
									  <div class="col-sm-10">
										<input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
									  </div>
									</div>
									<br />
									<div class="row">             
									  <div class="col-sm-2">
										<label for="">Email Address</label>
									  </div>
									  <div class="col-sm-10">
										<input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
									  </div>
									</div>
									<br />
									<div class="row">             
									  <div class="col-sm-2">
										<label for="">Profile Image</label>
									  </div>
									  <div class="col-sm-10">
										<input type="file" name="image" class="form-control">
									  </div>
									</div>
									<br />
									<div class="row float-right">            
									  <div class="col-sm-12">
										<button type="submit" class="btn btn-info" style="background: #ff4358; border:none;" >Update</button>
									  </div>
									</div>
								</form>
							  </div>
							  <div class="tab-pane" id="password">
								<form method="POST" action="{{ url('user/password/update') }}">
									@csrf
						
									<div class="form-group row">
										<label for="old-Password" class="col-md-2 col-form-label">{{ __('Old Password') }}</label>
						
										<div class="col-md-10">
											<input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old_password" value="{{ old('old_password') }}" placeholder="Enter old password" required autofocus>
						
											@error('old-password')
												<span class="invalid-feedback" role="alert">
													<strong> {{ $message }} </strong>
												</span>
											@enderror
											<span style="color:red">
												@if(Session::has('old-msg'))
													{{ Session::get('old-msg') }}
												@endif
											</span>
										</div>
									</div>
						
									<div class="form-group row">
										<label for="password" class="col-md-2 col-form-label">{{ __('New Password') }}</label>
						
										<div class="col-md-10">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password" required autocomplete="new-password">
						
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
						
									<div class="form-group row">
										<label for="password-confirm" class="col-md-2 col-form-label">{{ __('Confirm Password') }}</label>
						
										<div class="col-md-10">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required autocomplete="new-password">
											<span style="color:red">
												@if(Session::has('confirm-msg'))
													{{ Session::get('confirm-msg') }}
												@endif
											</span>
										</div>
									</div>
						
									<div class="form-group row mb-0 float-right">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary" style="background: #ff4358; border:none;">
												{{ __('Reset Password') }}
											</button>
										</div>
									</div>
								</form> 
							  </div>
							  <div class="tab-pane" id="social-links">
								<form method="POST" action="{{ url('user/social/update') }}">
									@csrf
						
									<div class="form-group row">
										<label for="facebook" class="col-md-2 col-form-label">Facebook Link</label>
										<div class="col-md-10">
											<input id="facebook" type="text" class="form-control" name="facebook_link" value="{{ Auth::user()->facebook_link }}" placeholder="Enter facebook link">
										</div>
									</div>
									<div class="form-group row">
										<label for="linked_in_link" class="col-md-2 col-form-label">LinkedIn Link</label>
										<div class="col-md-10">
											<input id="linked_in_link" type="text" class="form-control" name="linked_in_link" value="{{ Auth::user()->linked_in_link }}" placeholder="Enter linkedIn link">
										</div>
									</div>
									<div class="form-group row">
										<label for="instagram_link" class="col-md-2 col-form-label">Instagram Link</label>
										<div class="col-md-10">
											<input id="instagram_link" type="text" class="form-control" name="instagram_link" value="{{ Auth::user()->instagram_link }}" placeholder="Enter instagram link">
										</div>
									</div>
									<div class="form-group row">
										<label for="twitter_link" class="col-md-2 col-form-label">Twitter Link</label>
										<div class="col-md-10">
											<input id="twitter_link" type="text" class="form-control" name="twitter_link" value="{{ Auth::user()->twitter_link }}" placeholder="Enter twitter link">
										</div>
									</div>
									<div class="form-group row">
										<label for="youtube_link" class="col-md-2 col-form-label">Youtube Link</label>
										<div class="col-md-10">
											<input id="youtube_link" type="text" class="form-control" name="youtube_link" value="{{ Auth::user()->youtube_link }}" placeholder="Enter youtube link">
										</div>
									</div>
									<div class="form-group row mb-0 float-right">
										<div class="col-md-12">
											<button type="submit" class="btn btn-info" style="background: #ff4358; border:none;">
												Update
											</button>
										</div>
									</div>
								</form> 
							  </div>
							</div>
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
				var search_title = $('#search_title').val();
				var search_category = $('#search_category').val();
				var searched_status = $('#search_status').val();
				fetchAll(search_title, search_category, searched_status);
			}));			

			function fetchAll(title, category, status){
				$.ajax({
					url: '{{ url("/artist/all_albums") }}/{{ Auth::user()->id }}',
					type: 'post',
					data: {'title':title, 'category':category, 'status':status},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
					},
					success: function(response){
						$('#body').html(response);
						console.log(response);
					}
				});
			}
		});

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
						url:"{{ url('/artist/delete') }}/"+id,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
						},
						success:function(data){
							if(data==true){
								$('#tr-remove-'+id).fadeOut(500);
								swal({title:"Successfully!",text:"Album deleted successfully",icon:"success",timer:2000});
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
