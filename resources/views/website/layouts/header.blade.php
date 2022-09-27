<!-- 
 Header -->
<header id="head"> 
  <!-- <div class="container"> -->
    <!-- <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-6">
        <ul class="mob">
          <li class="list-inline-item top-address"><a href="mailto:contact@elitereviser.com" style="color:#fff;text-decoration: none;"><div class="media"><i class="fas fa-envelope"></i><div class="media-body"><p>contact@elitereviser.com</p></div></div></a></li>
          <li class="list-inline-item top-address"><a href="tel:+14693051828" style="color:#fff;text-decoration: none;"><div class="media"><i class="fas fa-phone-alt"></i><div class="media-body"><p> +1 (469) 305 1828</p></div></div></a></li>
          <li class="list-inline-item top-address"><div class="media"><i class="fas fa-map-marker-alt"></i><div class="media-body"><p>9550 Forest Lane Ste 135, Dallas, TX 75243</p></div></div></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 dis-flex-end">
        <ul class="social float-right">
          <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
      </div>
    </div> -->
  <!-- </div> -->
   <div class="menu-area">
    <div class="container">
      <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-0">
              <a class="navbar-brand" href="{{ route('index')}}"><img src="{{ asset('public/assets/website')}}/images/header-logo.png" class="img-fluid my-logo" alt=""></a>
              <button class="navbar-toggler" id="mytoggle"  type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <!--<li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ route('index')}}">Home</a>
                  </li>-->
                  <li class="nav-item" >
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('index')}}">Home</a>
                 
                  </li>
               
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about-us')) ? 'active' : '' }}" href="{{ route('about-us') }}">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('career')) ? 'active' : '' }}" href="{{ route('career') }}">Career</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('services')) ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link {{ (request()->is('contact-us')) ? 'active' : '' }}"  href="{{ route('contact_us')}}">Contact</a>
                  </li>
                 <!--  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('career')) ? 'active' : '' }}" aria-current="page" href="{{ route('career')}}">Career</a>
                  </li>-->
                
                  <li class="nav-item" id="dropdown">
                    <a class="nav-link " id="dropbtn" href="#">My Account</a>
                    <div class="dropdown-content">
                      @if(Auth::user())
                        <a href="{{ route('my_orders')}}">My Orders</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      @else
                          <a href="{{ route('login')}}">Log In</a>
                          <a href="{{ route('register')}}">Sign Up</a>
                      @endif
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div> 
</header> 

<!-- Header -->
