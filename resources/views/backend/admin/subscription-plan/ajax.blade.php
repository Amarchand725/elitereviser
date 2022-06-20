<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->title }}</td>
		<td>{{ $model->description }}</td>
		<td>${{ number_format($model->price) }}.0</td>
		<td>{{ $model->validity_in_days }} Days</td>
		<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Plan status" id=""><i class="fa fa-edit"></i></button>
			<a href="{{ url('/admin/subscriptionplan/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update plan details"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete partner"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="11">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>