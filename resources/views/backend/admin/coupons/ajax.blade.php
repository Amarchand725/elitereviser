<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->title }}</td>
		<td>{{ $model->coupon_type }}</td>
		<td>{{ $model->coupon_code }}</td>
		<td>{{ $model->discount }}</td>
		<td>{{ $model->max_purchase }}</td>
		<td>{{ date('d/m/Y', strtotime($model->start_date)) }}</td>
		<td>{{ date('d/m/Y', strtotime($model->expire_date)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Active Coupon"><i class="fa fa-edit"></i></button>
			<a href="{{ url('/admin/coupon/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update coupon details"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Coupon"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="10">
		{{ $models->links('pagination::bootstrap-4') }}
	</td>
</tr>