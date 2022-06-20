<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
           <img src="{{ asset('public/assets/website/images/header-logo.png') }}" style="width:150px;"alt="homepage" class="light-logo img-responsive" />
        </a>
    </div>

    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
         <!-- This is  -->
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            @if(Auth::user() && Auth::user()->role_id==1) <!--1=Admin -->
                <?php
                    $songs = App\Models\ArtistAlbum::orderby('id', 'desc')->where('is_approved', 0)->get();
                    $events = App\Models\EventModel::orderby('id', 'desc')->where('is_approved', 0)->get();
                    $galleries = App\Models\Gallery::orderby('id', 'desc')->where('is_approved', 0)->get();
                    $artists =App\Models\User::orderby('id', 'desc')->where('is_approved', 0)->get();
                    $comments = App\Models\Comment::orderby('id', 'desc')->where('product_type', 'video')->where('status', 2)->get();
                ?>
                <li class="nav-item dropdown" title="New Artists Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i>
                        @if(sizeof($artists)>0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style=" @if(sizeof($artists)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($artists)>0)
                                <li>
                                    <div class="drop-title">New Artists</div>
                                </li>

                                @foreach ($artists as $artist)
                                    <li>
                                        <div class="message-center" style="height: 86px;">
                                            <a href="{{ url('/admin/new-artist') }}/{{ $artist->id }}">
                                                <div class="user-img">
                                                    @if(!empty($artist->image))
                                                        <img src="{{ asset('public/images/users') }}/{{ $artist->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @else
                                                        <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @endif
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>{{ $artist->name }}</h5><span class="time">{{ date('d-m-y h:i A', strtotime($artist->created_at)) }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No Comment</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown" title="New Songs & Events Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-music"></i>
                        @if(sizeof($songs)>0 || sizeof($events)>0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style="@if(sizeof($songs)>0 || sizeof($events)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($songs)>0 || sizeof($events)>0)
                                @if(sizeof($events)>0)
                                    <li>
                                        <div class="drop-title">New Events</div>
                                    </li>

                                    @foreach ($events as $event)
                                        <li>
                                            <div class="message-center" style="height: 86px;">
                                                <a href="{{ url('/admin/new-event') }}/{{ $event->id }}">
                                                    <div class="user-img">
                                                        @if(!empty($event->hasUser->image))
                                                            <img src="{{ asset('public/images/users') }}/{{ $event->hasUser->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                        @else
                                                            <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{ $event->hasUser->name }}</h5> <span class="mail-desc">Event Name: {{ $event->title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($event->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                @if(sizeof($songs)>0)
                                    <li>
                                        <div class="drop-title">New Songs</div>
                                    </li>

                                    @foreach ($songs as $song)
                                        <li>
                                            <div class="message-center">
                                                <a href="{{ url('/admin/new-song') }}/{{ $song->id }}">
                                                    <div class="user-img">
                                                        @if(!empty($song->hasArtist->image))
                                                            <img src="{{ asset('public/images/users') }}/{{ $song->hasArtist->image }}"  class="thumbnail img-circle" style="width:50px; height:50px" alt="User">
                                                        @else
                                                            <img src="{{ asset('public/images/dummy.png') }}"  class="thumbnail img-circle" style="width:50px; height:50px" alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{ $song->hasArtist->name }}</h5> <span class="mail-desc">Song Name: {{ $song->song_title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($song->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No any notification</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown" title="New Comments Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-comment"></i>
                        @if(sizeof($comments) > 0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style=" @if(sizeof($comments)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($comments)>0)
                                <li>
                                    <div class="drop-title">New Comments</div>
                                </li>

                                @foreach ($comments as $comment)
                                    <li>
                                        <div class="message-center" style="height: 86px;">
                                            <a href="{{ url('/admin/video/new-comment') }}/{{ $comment->id }}">
                                                <div class="user-img">
                                                    @if(!empty($comment->hasUser->image))
                                                        <img src="{{ asset('public/images/users') }}/{{ $comment->hasUser->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @else
                                                        <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @endif
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>{{ $comment->hasUser->name }}</h5><span class="mail-desc">Comment: {!! Str::words($comment->comment, 3, ' ...') !!}</span><span class="time">{{ date('d-m-y h:i A', strtotime($comment->created_at)) }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No Comment</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown" title="New Galleries Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell"></i>
                        @if(sizeof($galleries)>0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style=" @if(sizeof($galleries)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($galleries)>0)
                                <li>
                                    <div class="drop-title">New Galleries</div>
                                </li>

                                @foreach ($galleries as $gallery)
                                    <li>
                                        <div class="message-center" style="height: 86px;">
                                            <a href="{{ url('/admin/new-gallery') }}/{{ $gallery->id }}">
                                                <div class="user-img">
                                                    @if(!empty($gallery->hasUser->image))
                                                        <img src="{{ asset('public/images/users') }}/{{ $gallery->hasUser->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @else
                                                        <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @endif
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>{{ $gallery->hasUser->name }}</h5> <span class="mail-desc">Gallery Name: {{ $gallery->title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($gallery->created_at)) }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No Comment</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            @if(Auth::user() && Auth::user()->role_id==2) <!--2=Artist -->
                <?php
                    $songs = App\Models\ArtistAlbum::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_approved', 1)->where('notify_status', 0)->get();
                    $bonus_footages = App\Models\BonusFootageModel::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_approved', 1)->where('notify_status', 0)->get();
                    $events = App\Models\EventModel::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_approved', 1)->where('notify_status', 0)->get();
                    $galleries = App\Models\Gallery::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_approved', 1)->where('notify_status', 0)->get();
                ?>
                <li class="nav-item dropdown" title="New Songs & Events Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-music"></i>
                        @if(sizeof($songs)>0 || sizeof($events)>0 || sizeof($bonus_footages)>0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style="@if(sizeof($songs)>0 || sizeof($events)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($songs)>0 || sizeof($events)>0 || sizeof($bonus_footages)>0)
                                @if(sizeof($events)>0)
                                    <li>
                                        <div class="drop-title">New Events</div>
                                    </li>

                                    @foreach ($events as $event)
                                        <li>
                                            <div class="message-center" style="height: 86px;">
                                                <a href="{{ url('/artist/new-events/read') }}">
                                                    <div class="user-img">
                                                        @if(!empty($event->hasUser->image))
                                                            <img src="{{ asset('public/images/users') }}/{{ $event->hasUser->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                        @else
                                                            <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{ $event->hasUser->name }}</h5> <span class="mail-desc">Event Name: {{ $event->title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($event->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                @if(sizeof($songs)>0)
                                    <li>
                                        <div class="drop-title">New Songs</div>
                                    </li>

                                    @foreach ($songs as $song)
                                        <li>
                                            <div class="message-center">
                                                <a href="{{ url('/artist/new-songs/read') }}">
                                                    <div class="user-img">
                                                        @if(!empty($song->hasArtist->image))
                                                            <img src="{{ asset('public/images/users') }}/{{ $song->hasArtist->image }}"  class="thumbnail img-circle" style="width:50px; height:50px" alt="User">
                                                        @else
                                                            <img src="{{ asset('public/images/dummy.png') }}"  class="thumbnail img-circle" style="width:50px; height:50px" alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{ $song->hasArtist->name }}</h5> <span class="mail-desc">Song Name: {{ $song->song_title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($song->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                @if(sizeof($bonus_footages)>0)
                                    <li>
                                        <div class="drop-title">New Bonus Footage</div>
                                    </li>

                                    @foreach ($bonus_footages as $bonus)
                                        <li>
                                            <div class="message-center">
                                                <a href="{{ url('/artist/new-bonus-video/read') }}">
                                                    <div class="user-img">
                                                        @if(!empty($bonus->image))
                                                            <img src="{{ asset('public/bonus-footages') }}/{{ $bonus->image }}" style="width:50px; height:50px"  alt="">
                                                        @else
                                                            <img src="{{ asset('public/bonus-footages/video-dummy.jpg') }}" style="width:50px; height:50px" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{ $bonus->hasArtist->name }}</h5> <span class="mail-desc">Song Name: {{ $bonus->title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($bonus->created_at)) }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No any notification</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown" title="New Galleries Notifications">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell"></i>
                        @if(sizeof($galleries)>0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" style=" @if(sizeof($galleries)>0) height: 335px; @endif overflow-y: scroll;" aria-labelledby="2">
                        <ul>
                            @if(sizeof($galleries)>0)
                                <li>
                                    <div class="drop-title">New Galleries</div>
                                </li>

                                @foreach ($galleries as $gallery)
                                    <li>
                                        <div class="message-center" style="height: 86px;">
                                            <a href="{{ url('/admin/gallery') }}">
                                                <div class="user-img">
                                                    @if(!empty($gallery->hasUser->image))
                                                        <img src="{{ asset('public/images/users') }}/{{ $gallery->hasUser->image }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @else
                                                        <img src="{{ asset('public/images/dummy.png') }}" style="width:50px; height:50px"  class="thumbnail img-circle" alt="User">
                                                    @endif
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>{{ $gallery->hasUser->name }}</h5> <span class="mail-desc">Gallery Name: {{ $gallery->title }}</span> <span class="time">{{ date('d-m-y h:i A', strtotime($gallery->created_at)) }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="message-center" style="text-align: center"><div class="mail-contnet" style="padding: 20px;">No any notification</div></div>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            <li class="nav-item dropdown logout">
                <a class="nav-link dropdown-toggle logout text-muted waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

