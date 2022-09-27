@extends('website.layouts.master')
@section('metatitle')
    <title>Login </title>
@endsection
<!-- Banner -->
@section('content')
<style>
    section.inner-banner .carousel-item {
        height: 0px;
    }
    section.inner-banner{
      height:0px;
    }
    body{
        background: linear-gradient(45deg, #070470, #0354d2a6);
    }
    .sec-heading {
        color: #fff;
        font-size: 27px;
        margin-top: 0px !important;
    }
    footer.lastsec{
        margin-top: 0px !important;
    }
</style>
 <!-- Banner -->
    <section class="inner-banner my-login">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- Carousel wrapper -->
            <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"
              >

              </div>
              <!-- Inner -->
              <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                  <!--<img src="{{ asset('public/assets/website')}}/images/banner1.png" class="d-block w-100" alt="..."/>
                  <div class="carousel-caption d-none d-md-block">
                    <h5><strong>Accounts</strong></h5> <br/>
                    <h2>Create Account To Show Yourself </h2>
                  </div>-->
                </div>


              <!-- Inner -->
            </div>
            <!-- Carousel wrapper -->
          </div>
        </div>
      </div>
    </section>
    <!-- Banner -->
    <Editing Section>
    <section class="editing loginpage">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                 <h3 class="sec-heading" style="margin-bottom: 10px;">Login And Check Your Orders</h3>
          </div>
            <div class="col-md-6" style="margin:0 auto;">
                <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <span style="color:Red;"> 
              <x-auth-validation-errors class="mb-4" :errors="$errors" /></span>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-row">
                  <div class="form-group col-md-12 text-left">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                  </div>
                  <div class="form-group col-md-12 text-left">
                    <label for="inputEmail4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="********">
                  </div>
                  <div class="form-group col-md-12 text-right">
                     <label style="float: left;">
                      <span class="psw"><a href="#" style="color: #fff;">Forgot password?</a></span>
                    </label>
                     <button type="submit" class="btn btn-primary">Sign in</button>
                  </div>
                  <div class="form-group col-md-12 text-right">
                    <a href="{{ route('register')}}" class="btn business ripple-surface" style="width: 100%; background:#fcc002; color: #fff;margin-top: 0px;"> Create Your Account  </a>
                  </div>
                </div>
              </form>
          </div>
          <!--<div class="col-md-6">
            <img src="{{ asset('public/assets/website/images/login-page.png')}}">
          </div>-->
        </div>
      </div>
    </section>
  <!--NEW-FORM SECTION-->
@endsection
