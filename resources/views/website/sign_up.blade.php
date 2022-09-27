@extends('website.layouts.master')
@section('metatitle')
    <title>Sign Up </title>
@endsection
<!-- Banner -->
@section('content')
<style>
    section.inner-banner .carousel-item {
        height: 0px;
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
    <section class="inner-banner my-sign">
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
    <section class="editing signup">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                 <h3 class="sec-heading">New to Elite Reviser? Sign up for free</h3>
          </div>

            <div class="col-md-6" style="margin:0 auto;">
            <!-- Validation Errors -->

            <span style="color:Red;"> <x-auth-validation-errors class="mb-4" :errors="$errors" /></span>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">First Name</label>
                    <input type="text" name="name" :value="old('name')" required autofocus class="form-control" id="inputEmail4" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">Last Name</label>
                    <input type="text" name="last_name" :value="old('last_name')" required autofocus class="form-control" id="inputEmail4" placeholder="Last Name">
                  </div>
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" :value="old('email')" required class="form-control" id="inputEmail4" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">Phone Number</label>
                    <input type="tel" name="phone_number" class="form-control" required id="" placeholder="Phone Number">
                  </div>
                  
                  
                  <div class="form-group col-md-12 text-left">
                    <label for="inputEmail4">Name of Organization/Affiliation</label>
                    <!-- <input type="text" name="organization" :value="old('organization')" required autofocus class="form-control" id="" placeholder="Organization/Affiliation"> -->
                    <input type="text" name="organization" :value="old('organization')"  class="form-control" id="" placeholder="Organization/Affiliation">
                  </div>
                  
                  <div class="form-group col-md-12 text-left">
                    <label for="inputEmail4">Address</label>
                    <!-- <input type="text" name="address" :value="old('address')" required autofocus class="form-control" id="" placeholder="Address"> -->
                    <input type="text" name="address" :value="old('address')"  class="form-control" id="" placeholder="Address">
                  </div>
                  <div class="form-group col-md-12 text-left">
                    <label for="inputEmail4">Country</label>
                    <input type="text" name="country" :value="old('country')" required autofocus class="form-control" id="" placeholder="Country">
                  </div>
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">State/Province</label>
                    <input type="text" name="state" :value="old('state')" required autofocus class="form-control" id="" placeholder="State">
                  </div>
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">Zip Code</label>
                    <!-- <input type="text" name="zip_code" :value="old('zip_code')" required autofocus class="form-control" id="" placeholder="Zip Code"> -->
                    <input type="text" name="zip_code" :value="old('zip_code')"  class="form-control" id="" placeholder="Zip Code">
                    
                  </div>
                  
                  
                  
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4">Password</label>
                    <input type="password" name="password"  required autocomplete="new-password" class="form-control" id="inputEmail4" placeholder="********">
                  </div>      
                  <div class="form-group col-md-6 text-left">
                    <label for="inputEmail4" for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                    <input type="password"  name="password_confirmation" required  class="form-control" id="inputEmail4" placeholder="********">
                  </div>

                  <div class="form-group col-md-12 text-right">
                     <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
                  </div>
                  <div class="form-group col-md-12 text-right">
                    <a href="{{ route('login')}}" class="btn business ripple-surface" style="width: 100%; background:#fcc002; color: #fff;"> already have an account sign in?</a>
                  </div>
                </div>
              </form>
          </div>
          <!--<div class="col-md-6">
            <h3>Login In And Check Your Orders</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',
            </p>
          </div>-->
        </div>
      </div>
    </section>

    <!--NEW-FORM SECTION-->
@endsection
