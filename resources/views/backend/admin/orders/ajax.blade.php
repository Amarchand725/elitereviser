<?php $counter =1; ?>
@foreach ($models as $model)
	<tr>
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->order_number }}</td>
		<td>{{ $model->hasUser->name }}</td>
		<td>${{ number_format($model->total_amount, 2) }}</td>
		<td>${{ number_format($model->discount_amount, 2) }}</td>
		<td>${{ number_format($model->net_amount, 2) }}</td>
		<td>
			@if($model->acceptance==0)
				<span class="label label-warning">Pending</span>
			@elseif($model->acceptance==1)
				<span class="label label-info">Process</span>
			@elseif($model->acceptance==2)
				<span class="label label-danger">Rejected</span>
			@elseif($model->acceptance==3)
				<span class="label label-success">Completed</span>
			@endif 
		</td>
		<td>
			@if(isset($model->hasAccepted) && $model->hasAccepted->status==0)
				<span class="label label-warning">Pending</span>
			@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==1)
				<span class="label label-info">Process</span>
			@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==2)
				<span class="label label-danger">Rejected</span>
			@elseif(isset($model->hasAccepted) && $model->hasAccepted->status==3)
				<span class="label label-success">Completed</span><br />
				@if($model->acceptance!=3)
					<strong class="label label-info">Waiting for approval</strong>
				@endif
			@else 
				<span class="label label-warning">Pending</span>
			@endif 
		</td>
		<td>{{ date('d, F-Y', strtotime($model->order_date)) }}</td>
		<td>
			@if(!empty($model->hasAccepted->document))
				<a class="btn btn-warning btn-sm download-btn" href="{{ asset('public/assets/editor/job-documents') }}/{{ $model->document }}" download="{{ asset('public/assets/editor/job-documents') }}/{{ $model->document }}">
					<i class="fa fa-download "></i>
				</a>
			@endif
			<button class="btn btn-info btn-sm detail-btn" data-id="{{ $model->id }}" data-original-title="Show details"><i class="fa fa-eye"></i></button>
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="9">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>