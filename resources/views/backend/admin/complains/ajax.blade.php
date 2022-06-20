<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->name }}</td>
		<td>{{ $model->email }}</td>
		<td>{{ $model->complaine }}</td>
		<td>
			@if($model->complaine_status==0)
				<span class="label label-warning">Pending</span>
			@elseif($model->complaine_status==3)
				<span class="label label-info">Progress</span>
			@elseif($model->complaine_status==4)
				<span class="label label-success">Done</span>
			@else
				<span class="label label-danger">Cancelled</span>
			@endif
		</td>
		<td>
			<button class="btn btn-warning btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Change Status"><i class="fa fa-check"></i></button>
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Complaine"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach