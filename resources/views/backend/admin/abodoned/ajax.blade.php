<?php $counter = 1 ?>
@foreach ($models as $model)
	<tr id="tr-remove-{{ $model->id }}">
		<td>{{ $counter++ }}.</td>
		@if($model->type=='item')
			<td>{{ $model->hasAlbum->song_title }}</td>
		@else 
			<td>{{ $model->hasEvent->title }}</td>
		@endif
		<td>{{ $model->type }}</td>
		<td>{{ $model->ip_address }}</td>
		<td>{{ date('d/m/Y', strtotime($model->date)) }}</td>
	</tr>
@endforeach