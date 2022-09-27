<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->hasPermissionName->permission_group_name }}</td>
		<td>{{ $model->hasPermissionName->name }}</td>
		<td>
			@if($model->hasPermissionName->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="4">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>