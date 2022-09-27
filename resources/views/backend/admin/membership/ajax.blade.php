<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>
			@if(!empty($model->hasUser->image))
				<img src="{{asset('public/images/users')}}/{{ $model->hasUser->image }}" style="width: 50px" height="50px" alt="">
			@else 
				<img src="{{asset('public/images/dummy.png')}}" style="width: 50px" height="50px" alt="">
			@endif
		</td>
		<td>{{ $model->hasUser->name }}</td>
		<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
		<td>{{ $model->hasLastMemberSubscription->hasSubscriptionPlan->title }}</td>
		<td>{{ date('d, F-Y', strtotime($model->hasLastMemberSubscription->expire_date)) }}</td>
		<td>
			@if($model->date > date('Y-m-d'))
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Partner" id=""><i class="fa fa-edit"></i></button>
			<a href="{{ url('/admin/member_subscriptions') }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="11">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>