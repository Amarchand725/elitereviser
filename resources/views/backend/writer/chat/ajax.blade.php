<?php 
	$total_songs = sizeof($models);	
?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $total_songs-- }}.</td>
		<td>{{ $model->song_title }}</td>
		<td>{{ $model->hasCategory->name }}</td>
		<td>
			<audio controls>
				<source src="{{ asset('public/songs/full_songs') }}/{{ $model->full_song }}" type="audio/ogg">
				Your browser does not support the audio tag.
			</audio>
		</td>
		<td>
			@if($model->is_approved==1)
				<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
			@elseif($model->is_approved==0)
				<span class="label label-warning">Not Approved</span>
			@elseif($model->is_approved==3)
				<span title="{{ $model->reasson }}" class="label label-danger">Reejcted</span>
			@endif
		</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
			@else
				<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
			@endif
		</td>
		<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
		<td>
			<a href="{{ url('/artist/edit') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="" data-original-title="Update album details"><i class="mdi mdi-border-color"></i></a> 
			<a href="{{ url('/artist/show') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="" data-original-title="Show album details"><i class="fa fa-eye"></i></a> 
			<a onclick='deleteData("{{ $model->id }}")' class="btn btn-sm btn-icon btn-danger" style="color:#fff;" data-toggle="tooltip" title="" data-original-title="Delete Song"><i class="fa fa-trash-alt"></i></a>
		</td>
	</tr>
@endforeach