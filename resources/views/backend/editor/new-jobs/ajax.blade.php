@foreach ($models as $model)
	<div class="col-lg-4 col-xl-3">
		<div class="card">
			<img class="card-img-top w-100 profile-bg-height" src="https://demos.wrappixel.com/premium-admin-templates/bootstrap/materialpro-bootstrap/package/assets/images/background/profile-bg.jpg" alt="Card image cap">
			<div class="card-body little-profile text-center">
				<div class="pro-img">
					<img src="{{ asset('public/assets/website/images/circle01.png')}}" style="background: white;" alt="user" class="rounded-circle shadow-sm" width="128">
				</div>
				<h3 class="mb-0">{{ Str::limit($model->hasOrderDetails->hasMainService->title, 10) }}</h3>
				<p>{{ Str::upper($model->hasOrderDetails->hasSubService->title) }}</p>
				<a href="javascript:void(0)" data-id="{{ $model->id }}" class="mt-2 waves-effect waves-dark btn btn-primary btn-md btn-rounded view-detail">
					View Detail
				</a>
				<div class="row text-center mt-3 justify-content-center">
					<div class="col-6 col-md-5 mt-3">
						@if(!empty($model->hasOrderDetails->total_words))
							<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_words }}</h3>
							<small class="text-muted">Words</small>
						@else 
							<h3 class="mb-0 fw-light">{{ $model->hasOrderDetails->total_pages }}</h3>
							<small class="text-muted">Pages</small>
						@endif
					</div>
					<div class="col-6 col-md-7 mt-3">
					<h3 class="mb-0 fw-light">{{ date('d/m/y', strtotime($model->order_date)) }}</h3>
					<small class="text-muted">Order Date</small>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach