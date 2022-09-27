@extends('website.layouts.master')
@section('metatitle')
  <title>Academic | Service </title>
@endsection
<!-- Banner -->
@section('content')
  <section class="inner-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img  src="{{ asset('public/assets/website')}}/images/box1.png" class="d-block w-100" alt="..."/>
                <div class="carousel-caption d-none d-md-block">
                  <h5> Academic</h5><br/><h6><strong>Journal Artical, Research Proposal, Presentation, Abstract, and Research Paper</strong> </h6>
                  <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p><br/>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->
  {{-- <Editing Section> --}}
  <section class="editing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="sec-heading">Academic</h3>
          <div class="sec-text"><p>We take great interest in your scholastic work, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references will also be formatted to the requirements specified by your intended journal for publication.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Section -->
  <div class="container" style="margin-bottom: 200px; max-width:960px">
    <form method="post" action="{{ route('customer.confirm-order') }}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Select Product</label>
          <select class="custom-select my-1 mr-sm-2" name="sub_service" id="inlineFormCustomSelectPref">
            <option selected>Service</option>
            @foreach ($sub_services as $sub_service)
              <option value="{{ $sub_service->id }}">{{ $sub_service->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">English Version</label>
            <select class=" custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="1">American</option>
                <option value="2">British</option>
                <option value="3">Canadian</option>
            </select>
          </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Upload file</label>
          <div class="file-input">
            <input type="file" name="file-input" id="file-input" class="file-input__input" />
            <label class="file-input__label" id="labelms" for="file-input">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"
                role="img" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512">
                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
            </svg>
            <span>Upload file</span></label>
          </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Total words count</label>
            <input type="text" class="form-control" disabled="disabled"  name="total_words" id="colFormLabel" placeholder="00">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Speed</label>
            <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">
                <option value="Normal Service" selected>Normal Service</option>
                <option value="Expedited Service" selected>Expedited Service</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Turnaround Time:</label>
            <select class="custom-select my-1 mr-sm-2" name="expenditive_service" id="inlineFormCustomSelectPref">
              <option selected>12 Hours</option>
              <option value="18">18 Hours</option>
              <option value="24">24 Hours</option>
              <option value="36">36 Hours</option>
              <option value="48">48 Hours</option>
              <option value="54">54 Hours</option>
              <option value="72">72 Hours</option>
              <option value="108">108 Hours</option>
              <option value="144">144 Hours</option>
              <option value="216">216 Hours</option>
              <option value="288">288 Hours</option>
              <option value="324">324 Hours</option>
              <option value="432">432 Hours</option>
            </select>
          </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Select Currency</label>
          <select class="custom-select my-1 mr-sm-2" name="currency" id="inlineFormCustomSelectPref">
            <option value="US Dollar" selected>US Dollar</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Total Amount</label>
          <input type="text" class="form-control" disabled="disabled" name="total_amount" id="colFormLabel" value="$120" placeholder="Total Amount">
        </div>
        <div class="form-group col-md-12">
          <label for="inputEmail4">Client Instruction…</label>
          <textarea name="client_note" class="form-control" rows="5" placeholder="Client Instruction…"></textarea>
        </div>
        <div class="form-group col-md-12 text-right mt-3">
            <button type="submit" class="btn btn-warning ripple-surface"><i class="fas fa-calculator"></i> Order Now</button>
        </div>
    </div>
    </form>
  </div>
  <!--Form Section-->
@endsection
