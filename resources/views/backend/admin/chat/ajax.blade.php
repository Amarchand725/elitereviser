@foreach ($models as $model)
  @if($model->reciever_id == Auth::user()->id)
  <div class="media media-chat media-chat-reverse-customer">
    <div class="media-body">
      <h3>{{ Str::upper($model->hasSender->name) }}</h3>
      <p>{{ $model->message }}</p>
      <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
    </div>
  </div>
  @elseif($model->sender_id==Auth::user()->id)
    <div class="media media-chat-admin"> 
      <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
      <div class="media-body">
        <h3>{{ Str::upper(Auth::user()->name) }}</h3>
        <p>{{ $model->message }}</p>
        <p class="meta"><time datetime="2018">{{ date('d,M-Y H:i:s A', strtotime($model->created_at)) }}</time></p>
      </div>
    </div>
  @endif
@endforeach