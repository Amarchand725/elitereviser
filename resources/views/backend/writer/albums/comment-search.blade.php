<?php $counter = 0; ?>
@foreach ($models as $model)
	<tr>
		<td>{{ ++$counter }}.</td>
		<td>{{ $model->hasUser->name }}</td>
		<td>{{ $model->comment }}</td>
		<td>{{ date('d, F-Y | h:i A', strtotime($model->created_at)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
	</tr>
@endforeach