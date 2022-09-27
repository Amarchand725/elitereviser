@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Issue payment details</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Issue payment details</li>
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
						<h4 class="card-title">Issue payment details</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="create-form" name="create-form" action="{{ url('/admin/withdraw/store') }}" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="withdraw_request_id" value="{{ $payment_request->id }}" id="">
									<input type="hidden" name="artist_id" value="{{ $payment_request->user_id }}" id="">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Amount <span style='color:red'>*</span></label>
												<input type="text" name="dues_amount" value="{{ $payment_request->amount }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Artist <span style='color:red'>*</span></label>
												<input type="text" value="{{ $payment_request->hasArtist->name }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Account Title <span style='color:red'>*</span></label>
												<input type="text" name="account_title" value="{{ $bank_detials->account_title }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Account No. <span style='color:red'>*</span></label>
												<input type="text" name="account_no" value="{{ $bank_detials->account_no }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Bank <span style='color:red'>*</span></label>
												<input type="text" name="bank" value="{{ $bank_detials->bank_name }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Account Branch <span style='color:red'>*</span></label>
												<input type="text" name="account_branch" value="{{ $bank_detials->account_branch_name }}" readonly class="form-control" id="">
											</div>
											<div class="col-md-6">
												<label for="">Message </label>
												<textarea name="message" class="form-control" id="" rows="5" placeholder="Enter message if any"></textarea>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-success">Send Request</button>
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
	
@endsection
