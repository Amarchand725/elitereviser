<div class="col-12">
	<input type="hidden" value="{{ $model->order_number }}" name="order_no">
	<div class="row  mt-3 ">
		<div class="col-3 col-md-3 mt-3">
			<h3 class="mb-0 fw-light">{{ Str::limit($model->hasOrderDetails->hasMainService->title, 15) }}</h3>
			<small class="text-muted">{{ Str::upper($model->hasOrderDetails->hasSubService->title) }}</small>
		</div>
		<div class="col-3 col-md-3 mt-3">
			@if(!empty($model->hasOrderDetails->total_words))
				<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_words }}</h3>
				<small class="text-muted">Words</small>
			@else 
				<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_pages }}</h3>
				<small class="text-muted">Pages</small>
			@endif
		</div>
		<div class="col-3 col-md-3 mt-3">
			<h3 class="mb-0 fw-light">{{ date('d/m/y', strtotime($model->order_date)) }}</h3>
			<small class="text-muted">Order Date</small>
		</div>
		<div class="col-3 col-md-3 mt-3">
			<h3 class="mb-0 fw-light">{{ Carbon\Carbon::now('UTC')->addHour(isset($order->hasOrderDetails)?$order->hasOrderDetails->trunarround_time:'')->format('d/m/y') }}</h3>
			<small class="text-muted">Delivery Date</small>
		</div>
	</div>
	<div class="row  mt-3 ">
		<div class="col-lg-8 col-xl-8">
			<h3 class="mb-0 fw-light">Client Note</h3>
			<p>{{ $model->client_note }}</p>
		</div>
		<div class="col-lg-8 col-xl-4">
			<div class="card">
				<img class="card-img-top w-100 profile-bg-height" src="https://demos.wrappixel.com/premium-admin-templates/bootstrap/materialpro-bootstrap/package/assets/images/background/profile-bg.jpg" alt="Card image cap">
				<div class="card-body little-profile text-center">
					<div class="pro-img">
						<img src="https://demos.wrappixel.com/premium-admin-templates/bootstrap/materialpro-bootstrap/package/assets/images/users/4.jpg" alt="user" class="rounded-circle shadow-sm" width="128">
					</div>
					<h3 class="mb-0">Job Document</h3>
					@if(!empty($model->document))
						<a href="{{ asset('public/assets/website/documents') }}/{{ $model->document }}" download="{{ asset('public/assets/website/documents') }}/{{ $model->document }}" class=" mt-2 waves-effect waves-dark btn btn-primary btn-md btn-roundedv">
							Download
						</a>
					@else 
						<a href="#" class=" mt-2 waves-effect waves-dark btn btn-primary btn-md btn-roundedv">
							Not any attachment
						</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>