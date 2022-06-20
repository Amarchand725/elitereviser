<?php $counter = 0 ?>
@foreach ($models as $model)
	<tr>
		<td>{{ ++$counter }}.</td>
		<td>{{ $model->order_number }}</td>
		<td>{{ $model->hasUser->name }}</td>
		<?php 
			$commission_charges = $model->sum/100*$commission;
			$actual_amount = $model->sum-$commission_charges;
		?>
		<td>${{ number_format($actual_amount) }}.0</td>
		<td>
			@if($model->order_status=='succeeded' || $model->order_status==1)
				<span class="label label-success">Completed</span>
			@else 
				<span class="label label-danger">Failed</span>
			@endif
		</td>
		<td>{{ date('d, F-Y', strtotime($model->order_date)) }}</td>
		<td>
			<a href="{{ url('/artist/order/show') }}/{{ $model->order_id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="View order details"><i class="fa fa-eye"></i></a>
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="7">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>