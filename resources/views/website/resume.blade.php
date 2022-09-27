@extends('website.layouts.master')
@section('metatitle')
    <title>Professional | Service </title>
@endsection
<!-- Banner -->
@section('content')
    <section class="inner-banner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- Carousel wrapper -->
            <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
              <!-- Inner -->
              <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                  <img
                  src="{{ asset('public/assets/website')}}/images/box4.png" class="d-block w-100" alt="..."/>

                  <div class="carousel-caption d-none d-md-block">
                    <h5> <strong>Cv</strong>Resume</h5><br/><h6><strong>CV, Resume, Cover letter and Interview letter</strong> </h6>
                    <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p><br/>
                  </div>
                </div>
             <!-- Inner -->
            </div>
            <!-- Carousel wrapper -->
          </div>
        </div>
      </div>
    </section>
    <!-- Banner -->
    <section class="editing">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="sec-heading">Cv/Resume</h3>
            <div class="sec-text"><p>We take great interest in your career progress, and because of this, we exercise great thoroughness in editing and proofreading your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references, if available, will also be formatted to the requirements specified to us. </p>
             </div>
          </div>
        </div>
      </div>
    </section>

 <!-- Form Section -->
   <div class="container my-form" style="margin-bottom: 200px; max-width:960px">
              <form >
                <div class="form-row">
                   <!--<div class="form-group col-md-6">
                    <label for="inputEmail4">Your Name</label>
                    <input type="text" class="form-control" id="colFormLabel" placeholder="enter your name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Your Email</label>
                    <input type="text" class="form-control" id="colFormLabel" placeholder="enter your email address">
                  </div>-->
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Select Service</label>
                    <select class=" custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>Service</option>
                        <option value="1">CV</option>
                        <option value="2">RESUME</option>
                        {{-- <option value="3">COVER LATTER</option>
                        <option value="4">INTERVIEW LATTER</option> --}}
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Number of pages <span style="font-weight:bold; font-size:12px;"> (1 page coust is $50)<span></label>
                    <input type="number" class="form-control" max="40" value="1" id="colFormLabel" placeholder="1">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Select Currency</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option value="1">US Dollar</option>
                    </select>
                </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Upload file</label>
                    <div class="file-input">
                        <input type="file" name="file-input" id="file-input" class="file-input__input"/>
                        <label class="file-input__label" id="labelms" for="file-input">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"
                            role="img" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512">
                            <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                        </svg>
                        <span>Upload file</span></label>
                    </div>
                  </div>

                    <div class="form-group col-md-6">
                  <label for="inputAddress">Expenditive Service:</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>12 Hours</option>
                        <option value="1">18 Hours</option>
                        <option value="1">24 Hours</option>
                        <option value="1">36 Hours</option>
                        <option value="1">48 Hours</option>
                        <option value="1">54 Hours</option>
                        <option value="1">72 Hours</option>
                        <option value="1">108 Hours</option>
                        <option value="1">144 Hours</option>
                        <option value="1">216 Hours</option>
                        <option value="1">288 Hours</option>
                        <option value="1">324 Hours</option>
                        <option value="1">432 Hours</option>
                    </select>
                </div>


                 <div class="form-group col-md-6">
                    <label for="inputEmail4">Total Amount</label>
                    <input type="text" class="form-control" disabled="disabled" id="colFormLabel" value="$50" placeholder="Total Amount">
                  </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Client Note</label>
                    <textarea  class="form-control" rows="5" placeholder="Client Note..."></textarea>
                  </div>
                <a href="{{ route('order')}}" class="btn btn-warning ripple-surface my-btn" id="btnms"><i class="fas fa-calculator"></i>&nbsp;&nbsp;&nbsp;Order Now</a>
              </form>
        </div>
    </div>
    <!--Form Section-->

@endsection
