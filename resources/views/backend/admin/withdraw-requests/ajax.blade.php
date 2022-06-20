<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->hasArtist->name }}</td>
		<td>{{ $model->hasArtist->email }}</td>
		<td>${{ number_format($model->payment) }}.0</td>
		<td>${{ number_format($model->requested_payment) }}.0</td>
		<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
		<td>
			@if($model->payment_status==0)
				<span class="label label-warning">Pending</span>
			@elseif($model->payment_status==1)
				<span class="label label-success">Accepted</span>
			@elseif($model->payment_status==3)
				<span class="label label-danger">Rejected</span>
			@endif
		</td>
		<td>
			@if($model->payment_status != 1)
				<button class="btn btn-warning btn-sm" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Change Status"><i class="fa fa-edit"></i></button>
			@endif
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Complaine"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="11">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>