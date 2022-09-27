	<?php $counter = 0 ?>
	@foreach ($models as $model)
		<tr>
			<td>{{  $counter  + $models->firstItem()   }}.</td>
            <td>
                    @if(!empty($model->image))
                        <img src="{{asset('public/images/customers')}}/{{ $model->image }}" style="width: 45px" height="45px" alt="">
                    @else
                        <img src="{{asset('public/assets/admin/main-assets/images/users/dummy.png')}}" style="width: 45px" height="45px" alt="">
                    @endif
			</td>
			<td>{{ $model->name }}</td>
			<td>{{ $model->email }}</td>
            <td>{{ $model->phone_number }}</td>
			<td>
				@if($model->is_approved==1)
                    <span title="Waiting for approval" class="label label-warning">Not Approve</span>
				@elseif($model->is_approved==2)
                    <span class="label label-success" title="Approved Date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Approved</span>
				@elseif($model->is_approved==3)
					<span title="{{ $model->approved_reason }}" class="label label-danger">Reejcted</span>
				@endif
			</td>
			<td>
                @if($model->status==1)
                <span class="label label-success" title="Actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Active</span>
                @elseif($model->status==3)
                <span class="label label-danger" title="Block date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">Blocked</span>
                @else
                    <span class="label label-warning" title="In-actived date: {{ date('d, M-Y', strtotime($model->updated_at)) }}">In-Active</span>
                @endif
            </td>
			<td>{{ date('d, M-Y', strtotime($model->created_at)) }}</td>
			<td>
				<button class="btn btn-primary btn-sm approve-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Approve Artist" id=""><i class="fa fa-edit"></i></button>
				<button class="btn btn-warning btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Active Artist"><i class="fa fa-check"></i></button>
			</td>
		</tr>
        <?php $counter ++ ?>
	@endforeach
	<tr>
		<td colspan="10">
			{{ $models->links('pagination::bootstrap-4') }}
		</td>
	</tr>
