<?php $counter = 0; ?>
@foreach ($models as $model)
	<tr>
		<td>{{ ++$counter }}.</td>
		<td>{{ $model->hasUser->name }}</td>
		<td>
			@php $rating = $model->ratings; @endphp  

			@foreach(range(1,5) as $i)
				<span class="fa-stack" style="width:1em">
					<i class="far fa-star fa-stack-1x"></i>

					@if($rating >0)
					@if($rating >0.5)
						<i class="fas fa-star fa-stack-1x" style="color:orange"></i>
					@else
						<i class="fas fa-star-half fa-stack-1x" style="color:orange"></i>
					@endif
					@endif
					@php $rating--; @endphp
				</span>
			@endforeach
		</td>
		<td>{{ $model->comment }}</td>
		<td>{{ date('d, F-Y | h:i A', strtotime($model->created_at)) }}</td>
		<td>
			@if($model->status==1)
				<span class="label label-success" title="Approved date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
			@elseif($model->status==2)
				<span class="label label-warning" title="Pending date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Pending</span>
			@elseif($model->status==0)
				<span class="label label-danger" title="Rejected date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Rejected</span>
			@endif
		</td>
		<td>
			<button class="btn btn-primary btn-sm approve-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Approve Video Comment" id=""><i class="fa fa-edit"></i></button>
		</td>
	</tr>
@endforeach