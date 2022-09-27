<?php $counter = 1; ?>
	@foreach ($models as $model)
		<tr id="tr-remove-{{ $model->id }}">
			<td>{{ $counter++ }}.</td>
			<td>
				@if(!empty($model->hasArtist->image))
					<img src="{{asset('public/images/users')}}/{{ $model->hasArtist->image }}" class="img-circle" style="width: 50px" height="50px" alt="">
				@else 
					<img src="{{asset('public/images/dummy.png')}}" style="width: 50px" height="50px" alt="">
				@endif
			</td>
			<td>{{ App\Models\User::where('id', $model->artist_id)->first()->name }}</td>
			<td>{{ $model->total }}</td>
			<td>{{ date('d, M-Y', strtotime(App\Models\User::where('id', $model->artist_id)->first()->created_at)) }}</td>
			<td>
				@if(App\Models\User::where('id', $model->artist_id)->first()->status)
					<span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime(App\Models\User::where('id', $model->artist_id)->first()->updated_at)) }}">Active</span>
				@else
					<span class="label label-danger" title="In-actived date: {{ date('d, M-Y', strtotime(App\Models\User::where('id', $model->artist_id)->first()->updated_at)) }}">In-Active</span>
				@endif
			</td>
			<td class="forlinks">
				<a href="{{ url('/admin/artist_subscribers') }}/{{ $model->artist_id }}" title="Subscribers List" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="11">
			{{ $models->links('pagination::bootstrap-4') }}
		</td>
	</tr>