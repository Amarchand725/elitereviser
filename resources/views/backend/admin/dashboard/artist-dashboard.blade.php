@extends('backend.admin.layout.master')
@section('content')
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		
			@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<div class="row">
				<div class="col-lg-3 col-md-6">
				    <a href="{{ url('artist/orders') }}">
					    <div class="card">
						<div class="card-body">
							<div class="d-flex flex-row">
								<div class="withdraw-btn round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger" style="cursor:pointer" title="Click to withdraw request">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<div class="ms-2 align-self-center">
									<?php 
							        $total_amount = 0;
									?>
									@foreach($total_sale as $model)
									    <?php 
									        $total_amount += $model->hasProduct->actual_price-$model->hasProduct->discount;
									    ?>    
									@endforeach
									<h3 class="mb-0 ml-2">${{ number_format($total_amount-$total_recieved) }}.00</h3>
									<h6 class="text-muted mb-0 ml-2">TOTAL NEW SALE</h6>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/orders') }}">
						    <div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
									<i class="fab fa-first-order"></i>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0 ml-2">{{ $completed_orders->count() }}</h3>
									<h6 class="text-muted mb-0 ml-2">COMPLETED ORDERS</h6>
								</div>
							</div>
						</div>
					    </a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/withdraw-requstes') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-credit-card" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">${{ $total_recieved }}.00</h3>
    									<h6 class="text-muted mb-0 ml-2">RECIEVED PAYMENT</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/withdraw-requstes') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
    									<i class="fa fa-paper-plane" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">{{ $failed_orders }}</h3>
    									<h6 class="text-muted mb-0 ml-2">WITH DRAW REQUESTS</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/albums') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="withdraw-btn round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger" style="cursor:pointer" title="Click to withdraw request">
    									<i class="fa fa-music" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">{{ App\Models\ArtistAlbum::where('user_id', Auth::user()->id)->count() }}</h3>
    									<h6 class="text-muted mb-0 ml-2">TOTAL SONGS</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/event-calender') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fa fa-calendar" aria-hidden="true"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">{{ App\Models\EventModel::where('user_id', Auth::user()->id)->count() }}</h3>
    									<h6 class="text-muted mb-0 ml-2">TOTAL EVENTS</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/bonus-footages') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-danger">
    									<i class="fas fa-video"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">{{ App\Models\BonusFootageModel::where('user_id', Auth::user()->id)->count() }}</h3>
    									<h6 class="text-muted mb-0 ml-2">TOTAL VIDEOS</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="card">
					    <a href="{{ url('artist/gallery') }}">
    						<div class="card-body">
    							<div class="d-flex flex-row">
    								<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
    									<i class="fas fa-image"></i>
    								</div>
    								<div class="ms-2 align-self-center">
    									<h3 class="mb-0 ml-2">{{ App\Models\Gallery::where('user_id', Auth::user()->id)->count() }}</h3>
    									<h6 class="text-muted mb-0 ml-2">TOTAL GALLERIES</h6>
    								</div>
    							</div>
    						</div>
    					</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Send request for withdraw payment Modal -->
	<div class="modal fade" id="add-withdraw-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-top" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Withdraw Payment</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
	
					<form method="post" action="{{ url('/artist/withdraw/store') }}">
						@csrf
						<input type="hidden" name="payment" @if(Auth::user()->role_id==2) value="{{ $total_sale }}" @endif>
						<div class="modal-body">
							<div class="form-group">
								<label for="">Enter Payment</label>
								<input type="text" name="requested_payment" @if(Auth::user()->role_id==2) value="{{ $total_sale }}" @endif class="form-control" placeholder="Enter payment">
							</div>
							<div class="form-group">
								<label for="">Message</label>
								<textarea name="message" id="" class="form-control" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Add approve Modal -->

	<script src="{{ url('public/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script>
		$(document).on('click', '.withdraw-btn', function(){
			$('#add-withdraw-modal').modal('show');
		});
	</script>
@endsection
