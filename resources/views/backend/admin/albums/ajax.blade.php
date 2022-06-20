<?php $total_models = sizeof($models) ?>
@foreach ($models as $model)
	<tr>
		<td>{{ $total_models-- }}.</td>
		<td>
			@if($model->hasArtist->image)
				<img src="{{asset('public/images/users')}}/{{ $model->hasArtist->image }}" style="width: 50px" height="50px" alt="">
			@else 
				<img src="{{asset('public/images/dummy.png')}}" style="width: 50px" height="50px" alt="">
			@endif
		</td>
		<td>{{ $model->hasArtist->name }}</td>
		<td>{{ $model->song_title }}</td>
		<td>
			<audio controls>
				<source src="{{ asset('public/songs/full_songs') }}/{{ $model->short_song }}" type="audio/ogg">
				Your browser does not support the audio tag.
			</audio>
		</td>
		<td>{{ $model->hasCategory->name }}</td>
		<td>
			@if($model->is_approved==1)
				<span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
			@elseif($model->is_approved==0)
				<span class="label label-warning">Not Approve</span>
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
		    <a href="{{ url('/admin/audio/comments') }}/{{ $model->id }}" class="btn btn-sm btn-icon btn-info mb-2" data-toggle="tooltip" title="" data-original-title="Show All Comments" style="margin-right:5px"><i class="fa fa-comment"></i></a> 
			<button class="btn btn-primary btn-sm" value="{{ $model->id }}"  data-toggle="tooltip" data-original-title="Approve Product" id="approve-btn"><i class="fa fa-edit"></i></button>
			<button class="btn btn-warning btn-sm mt-2" value="{{ $model->id }}" title="Active Product" id="active-btn"><i class="fa fa-check"></i></button>
		</td>
	</tr>
@endforeach