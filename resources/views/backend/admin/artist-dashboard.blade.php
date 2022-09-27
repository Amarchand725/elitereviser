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
			@if(Auth::user()->role_id==1) <!-- 1=Admin dashboard -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card fill-white feather-lg"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">${{ number_format($today_sale) }}.0</h3>
										<h6 class="text-muted mb-0 ml-2">Today Sale</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-warning">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fill-white feather-lg"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $today_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Totday Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag fill-white feather-lg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $today_completed_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Today Completed Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield fill-white feather-lg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $today_failed_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Today Failed Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card fill-white feather-lg"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">${{ number_format($total_sale) }}.0</h3>
										<h6 class="text-muted mb-0 ml-2">Total Sale</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-warning">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fill-white feather-lg"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $total_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Total Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag fill-white feather-lg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $total_completed_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Total Completed Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield fill-white feather-lg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $total_failed_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">Total Failed Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@elseif(Auth::user()->role_id==2) <!-- 2=Artist dashboard -->
				@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card fill-white feather-lg"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">${{ $total_recieved }}.00</h3>
										<h6 class="text-muted mb-0 ml-2">RECIEVED PAYMENT</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="withdraw-btn round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-warning" style="cursor:pointer" title="Click to withdraw request">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fill-white feather-lg"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
									</div>
									<div class="ms-2 align-self-center">
										<?php 
								// 			$commission_charges = $total_sale/100*$commission;
								// 			$actual_amount = $total_sale-$commission_charges;
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
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag fill-white feather-lg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $completed_orders->count() }}</h3>
										<h6 class="text-muted mb-0 ml-2">COMPLETED ORDERS</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield fill-white feather-lg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
									</div>
									<div class="ms-2 align-self-center">
										<h3 class="mb-0 ml-2">{{ $failed_orders }}</h3>
										<h6 class="text-muted mb-0 ml-2">FAILED ORDERS</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
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
