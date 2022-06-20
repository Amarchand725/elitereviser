<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->name }}</td>
		<td>{{ date('d, F-Y', strtotime($model->created_at)) }}</td>
		<td class="forlinks">
			<a href="{{ url('/admin/role/show') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="" data-original-title="Show permissions"><i class="fa fa-eye"></i></a>	
			<a href="{{ url('/admin/role/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Edit role"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete role"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="4">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>