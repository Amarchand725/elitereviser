<?php $counter = 1; ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		@if(Auth::user()->role_id==1) <!--1=Admin -->
			<td><a href="{{ url('/artist-profile') }}/{{ $model->user_id }}">{{ $model->hasUser->name }}</a></td>
		@endif
		<td>{{ $model->title }}</td>
		<td>{{ date('d/m/Y', strtotime($model->start_date)) }} to {{ date('d/m/Y', strtotime($model->end_date)) }}</td>
		<td>{{ date('H:i A', strtotime($model->start_time)) }} to {{ date('H:i A', strtotime($model->end_time)) }}</td>
		<td>{{ $model->venue }}</td>
		<td>{{ $model->total_tickets }}</td>
		<td>200</td>
		<td>
			@if($model->is_approved==1)
				<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
			@elseif($model->is_approved==0)
				<span class="label label-warning" title="Waiting for approval">Not Approved</span>
			@elseif($model->is_approved==3)
				{{ $model->hasApprovedBy->name }}-<span title="{{ $model->approve_reason }}" class="label label-danger">Reejcted</span>
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
			@if(Auth::user()->role_id==1) <!--1=Admin -->
				<button class="btn btn-primary btn-sm approve-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Approve Product"><i class="fa fa-edit"></i></button>
				<button class="btn btn-warning btn-sm ml-2 active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Active Product"><i class="fa fa-check"></i></button>
			@else 
				<a href="{{ url('/artist/event/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update event details"><i class="mdi mdi-border-color"></i></a> 
				<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Event"><i class="fa fa-trash-alt"></i></a>	
			@endif
		</td>
	</tr>
@endforeach