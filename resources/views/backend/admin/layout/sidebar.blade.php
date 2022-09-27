<div class="scroll-sidebar">
    <!-- User profile -->
    @if(Auth()->user()->hasRole('admin'))
        <div class="user-profile" style="background-image: url('{{ asset('public/assets/admin/main-assets/images/background/user-info.jpg')}}')">
            <div class="profile-img">
                <img src="{{ asset('public/assets/admin/main-assets/images/users/1.jpg') }}" alt="user" />
            </div>
            <div class="profile-text" style="text-align: center; text-transform: uppercase;"><a>{{ Auth()->user()->name }}</a></div>
        </div>
    @elseif(Auth()->user()->hasRole('writer'))
        <!--<div class="user-profile">
            <div class="profile-img">
                <img src="{{ asset('public/images/audience') }}/{{ Auth()->user()->image }}" alt="user" />
            </div>
            <div class="profile-text" style="text-align: center; text-transform: uppercase;"><a>{{ Auth()->user()->name }}</a></div>
        </div>-->
    @endif
    <!-- End User profile text-->

    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
                <a class="waves-effect waves-dark" href="{{ url('/') }}" target="_blank" aria-expanded="false"><i class="fa fa-globe  mr-0"></i><span class="hide-menu">Website</span></a>
            </li>
            <li>
                @if(Auth::user()->hasRole('admin'))
                    <a class="waves-effect waves-dark active" href="{{ route('dashboard') }}" aria-expanded="true"><i class="mdi mdi-gauge  mr-0"></i><span class="hide-menu">Dashboard</span></a>
                @else 
                    <a class="waves-effect waves-dark active" href="{{ route('editor.dashboard') }}" aria-expanded="true"><i class="mdi mdi-gauge  mr-0"></i><span class="hide-menu">Dashboard</span></a>
                @endif
            </li>

            @if(Auth()->user()->hasRole('admin'))
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users  mr-0"></i><span class="hide-menu"> Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/admin/editors')}}"><span class="fa fa-user"></span> Editors <span class="badge badge-info badge-pill ml-1"></span></a></li>
                        <li><a href="{{url('/admin/customers')}}"><span class="fa fa-user"></span> Customers <span class="badge badge-soft-info badge-pill ml-1"></span></a></li>
                        <li><a href="{{ url('/admin/subscribers') }}"><i class="fa fa-link  mr-0"></i><span class="hide-menu"> Subscribers</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.services') }}" class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tag  mr-0"></i><span class="hide-menu"> Services</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/orders') }}" class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart  mr-0"></i><span class="hide-menu"> Orders</span></a>
                </li>
				<li>
                    <a href="{{ url('admin/inbox') }}"><i class="fa fa-envelope  mr-0"></i><span class="hide-menu"> Inbox</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/coupons') }}"><i class="fa fa-gift nav-icon"></i><span class="hide-menu"> Coupon</span> </a>
                </li>
                <li>
                    <a href="{{ url('/admin/set-job-limit') }}"><i class="fa fa-gift nav-icon"></i><span class="hide-menu"> Job Limitation</span> </a>
                </li>
            @elseif(Auth()->user()->hasRole('editor'))
                <li>
                    <a href="{{ route('editor.new-jobs') }}" class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart  mr-0"></i><span class="hide-menu"> New Jobs</span></a>
                </li>
                <li>
                    <a href="{{ route('editor.your-jobs') }}"><i class="fas fa-tag mr-0"></i><span class="hide-menu"> Your Jobs</span></a>
                </li>
            @endif
        </ul>
    </nav>
</div>
