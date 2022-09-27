@extends('backend.admin.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Add New Account</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Add New Account</li>
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
						<h4 class="card-title">Add New Account</h4>
						@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="table-responsive">
							<div class="container">
								<form method="post" id="event-form" name="even_form" action="{{ url('artist/bank/store') }}" enctype="multipart/form-data">
									@csrf
				
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<label for="">Bank Name <span style="color:red">*</span></label>
												<input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}" class="form-control" placeholder="Enter bank name">
												<span style="color: red">{{ $errors->first('bank_name') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Account Branch Name <span style="color:red">*</span></label>
												<input type="text" name="account_branch_name" value="{{ old('account_branch_name') }}" class="form-control" placeholder="Enter account branch name">
												<span style="color: red">{{ $errors->first('account_branch_name') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Account Title <span style="color:red">*</span></label>
												<input type="text" name="account_title" value="{{ old('account_title') }}" class="form-control" placeholder="Enter account title">
												<span style="color: red">{{ $errors->first('account_title') }}</span>
											</div>
											<div class="col-md-6">
												<label for="">Account No <span style="color:red">*</span></label>
												<input type="text" name="account_no" id="account_no" value="{{ old('account_no') }}" class="form-control" placeholder="Enter account no">
												<span id="error-start-date" style="color:red"></span>
												<span style="color: red">{{ $errors->first('account_no') }}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<label for="">Status</label>
												<select name="status" id="" class="form-control">
													<option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
													<option value="0" {{ old('status')==0?'selected':'' }}>Deactive</option>
												</select>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
