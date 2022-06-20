<?php $total_records = sizeof($models) ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $total_records-- }}.</td>
		<td>
			@if(!empty($model->image))
				<img src="{{ asset('public/bonus-footages') }}/{{ $model->image }}" style="width:100px; height:80px"  alt="">
			@else 
				<img src="{{ asset('public/bonus-footages/video-dummy.jpg') }}" style="width:60px; height:60px; border-radius:50%" alt="">
			@endif
		</td>
		<td><a href="{{ url('admin/bonusfootage/show') }}/{{ $model->id }}">{{ $model->title }}</a></td>
		<td>{{ $model->short_description }}</td>
		<td>{{ date('d/m/Y', strtotime($model->updated_at)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Product"><i class="fa fa-edit"></i></button>
			<a href="{{ url('/admin/bonusfootage/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update video details"><i class="mdi mdi-border-color"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete video"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach