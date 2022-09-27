<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td><a href="{{ url('admin/gallery/show') }}/{{ $model->id }}">{{ $model->title }}</a></td>
		<td>{{ $model->venue }}</td>
		<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
		<td>{{ date('H:i A', strtotime($model->time)) }}</td>
		<td>{{  Str::words($model->description, 3, ' ...') }}</td>
		<td>
			@if($model->is_approved==1)
				<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
			@elseif($model->is_approved==0)
				<span title="Waiting for approval" class="label label-warning">Not Approve</span>
			@elseif($model->is_approved==3)
				<span title="{{ $model->approved_reason }}" class="label label-danger">Reejcted</span>
			@endif
		</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-warning btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Gallery"><i class="fa fa-check"></i></button>
			@if(Auth::user()->role_id==1)<!--1=Admin -->
				<button class="btn btn-primary btn-sm approve-btn ml-2" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Approve Gallery"><i class="fa fa-edit"></i></button>
				<a href="{{ url('/admin/gallery/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update gallery"><i class="mdi mdi-border-color"></i></a> 
			@else 
				<a href="{{ url('/artist/gallery/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update gallery"><i class="mdi mdi-border-color"></i></a> 
			@endif
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete gallery"><i class="fa fa-trash-alt"></i></a>	
		</td>
	</tr>
@endforeach