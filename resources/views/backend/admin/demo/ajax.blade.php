<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		<td>{{ $model->full_name }}</td>
		<td>{{ $model->phone }}</td>
		<td>{{ $model->email }}</td>
		<td>
			<div class="audioplayer">
				<audio controls>
					<source src="{{ asset('public/demos') }}/{{ $model->audio }}" type="audio/ogg">
					<source src="horse.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
				</audio>
			</div>
		</td>
		<td>{{ date('d, F-Y', strtotime($model->date)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Accepted date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Accepted</span>
			@elseif($model->status==3)
				<span class="label label-danger" title="Rejected date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Rejected</span>
			@else
				<span class="label label-warning" title="Pending date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Pending</span>
			@endif
		</td>
		<td class="forlinks">
			<button class="btn btn-primary btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" title="" data-original-title="Accept Demo"><i class="fa fa-edit"></i></button>
			<!-- <a href="{{ url('/admin/partner/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update partner details"><i class="mdi mdi-border-color"></i></a>  -->
			<!-- <a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete partner"><i class="fa fa-trash-alt"></i></a>	 -->
		</td>
	</tr>
@endforeach