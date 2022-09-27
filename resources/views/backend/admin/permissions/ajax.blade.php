<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->permission_group_name }}</td>
		<td>{{ $model->name }}</td>
		<td>{{ $model->url }}</td>
		<td>{{ date('d, F-Y', strtotime($model->created_at)) }}</td>
		<td class="forlinks">
			<a href="{{ url('/admin/permission/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Edit permission name"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete permission"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="4">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>