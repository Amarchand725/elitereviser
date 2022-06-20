<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->percentage }}%</td>
		<td>{{ date('d, F-Y', strtotime($model->created_at)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active commission" id=""><i class="fa fa-edit"></i></button>
			<a href="{{ url('/admin/commission/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Edit commission"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete commission"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="5">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>