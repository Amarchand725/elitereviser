@foreach ($models as $model)
  @if($model->reciever_id == Auth::user()->id)
    <div class="media media-chat"> 
      <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
      <div class="media-body">
        {!! $model->message !!}
        @if($model->attachment)
          <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $model->attachment }}" href="{{ asset('public/assets/files') }}/{{ $model->attachment }}" title="ImageName">													
            <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
          </a>								   								
        @endif	
        <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
      </div>
    </div>
  @elseif($model->sender_id==Auth::user()->id)
    <div class="media media-chat media-chat-reverse">
      <div class="media-body">
        <p>{!! $model->message !!}</p>
        @if($model->attachment)
          <a title="Download attachment" download="{{ asset('public/assets/files') }}/{{ $model->attachment }}" href="{{ asset('public/assets/files') }}/{{ $model->attachment }}" title="ImageName">													
            <i class="fa fa-download" aria-hidden="true" style="float: left;font-size: 23px; margin-top: 10px; margin-right: 10px; color: #e84a3b; animation: heartbeat 2s infinite;"></i>			
          </a>								   								
        @endif	
        <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
      </div>
    </div>
  @endif
@endforeach