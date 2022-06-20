<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->hasSubscriptionPlan->title }}</td>
		<td>${{ number_format($model->hasSubscriptionPlan->price) }}.0</td>
		<td>{{ date('d, F-Y', strtotime($model->hasSubscriptionPlan->active_date)) }}</td>
		<td>{{ date('d, F-Y', strtotime($model->hasSubscriptionPlan->expire_date)) }}</td>
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