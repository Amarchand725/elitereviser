<?php $counter = 0 ?>
@foreach ($models as $model)
<tr>
    <td>{{ $counter++ }}.</td>
    {{-- <td>
        @if(!empty($model->image))
            <img src="{{asset('public/images/customers')}}/{{ $model->image }}" style="width: 45px" height="45px" alt="">
        @else
            <img src="{{asset('public/assets/admin/main-assets/images/users/dummy.png')}}" style="width: 45px" height="45px" alt="">
        @endif
    </td>--}}
    <td>{{ $model->name }}</td>
    <td>{{ $model->email }}</td>
    <td>{{ $model->phone_number }}</td>
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
        <button class="btn btn-info btn-sm active-btn" value="{{ $model->id }}" data-toggle="tooltip" data-original-title="Active Audience"><i class="fa fa-edit"></i></button>
    </td>
</tr>
    <?php $counter ++ ?>
@endforeach
<tr>
	<td colspan="10">{{ $models->links('pagination::bootstrap-4') }}</td>
</tr>

