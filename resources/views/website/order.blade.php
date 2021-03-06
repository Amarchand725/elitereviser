@extends('website.layouts.master')
@section('metatitle')
    <title>Order | Elite Revisor</title>
@endsection
<!-- Banner -->
@section('content')
    <style>
        #exTab1 .nav-pills > li > a {
            border-radius: 0;
        }

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills > li > a {
            border-radius: 4px 4px 0 0 ;
        }

        li.active {
            background: #ffbe00 !important;
            padding: 10px 20px;
        }

        #exTab2 .active a{
            color: #fff !important;
            text-decoration: none;
        }
        #exTab2 li{
            color: #333;
            padding: 10px 20px;
            background: #ededed;
        }

        #exTab2 li a{
            color: #333;
            text-decoration: none;
        }
    </style>
    <section class="inner-banner">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"></div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        src="{{ asset('public/assets/website')}}/images/banner1.png" class="d-block w-100" alt="..."/>
                    <div class="carousel-caption d-none d-md-block">
                        <h5> <strong>Order</strong> Details</h5>
                        <br/>
                        <!--<h6><strong>Journal Artical, Research Proposal, Presentation, Abstract, Research Paper</strong> </h6>-->
                        <p>We deliver the best possible results on all projects. You can always count on us for a work well done.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Banner -->
    <div class="container mt-5 mb-5">
        <div id="content" class="page-content container">
            <div class="row">
                <div class="col-md-12">
                    @if(!Auth::check())
                        <input type="hidden" name="cmd" value="order_modify">
                        <input type="hidden" name="referrer" value="/service/academic_editing#service-quote">
                        <fieldset style="display: table-cell; width: 100%; box-sizing: border-box;">
                            <div id="your-details-panel" class="panel panel-default panel-default-scribendi form-horizontal">
                            <div class="panel-heading">
                                <span class="fa fa-user"></span>
                                <span class="notranslate">&nbsp;</span>Login Details
                            </div>
                            <div id="exTab2">
                                <ul class="nav nav-tabs" id="exTab2" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login-panel" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="sign-up-tab" data-toggle="tab" href="#sign-up" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="exTab2">
                                    <div class="tab-pane fade show active" id="login-panel" role="tabpanel" aria-labelledby="home-tab">
                                        <span style="color:Red;"> <x-auth-validation-errors class="mb-4" :errors="$errors" /></span>
                                        <form id="login" method="post" enctype="multipart/form-data" action="{{ route('login') }}" accept-charset="UTF-8">
                                            @csrf 
                                            <input type="hidden" name="order_details" value="order_details" id="">
                                            <div class="tab-pane active" id="login-panel">
                                                <div class="panel-body pt-20">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label for="inputEmail4">Your Email</label>
                                                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="inputEmail4">Your Password</label>
                                                            <input type="password" name="password" class="form-control" id="" placeholder="Password">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4"></label>
                                                            <input type="submit" class="btn btn-scrib-cta btn-lg ripple-surface" id="inputEmail4" value="Login" style="padding: 6px 20px;
                                                            margin-top: 33px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab">
                                        <form id="login" method="post" enctype="multipart/form-data" action="{{ route('register') }}" accept-charset="UTF-8">
                                            @csrf
                                            <input type="hidden" name="order_details" value="order_details" id="">
                                            <div class="tab-pane" id="sign-up">
                                                <div class="panel-body pt-20">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Your Name</label>
                                                            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Your Name">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Phone Number</label>
                                                            <input type="text" name="phone_number" class="form-control" id="inputEmail4" placeholder="Your Phone Number">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Your Email</label>
                                                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="inputEmail4">Your Password</label>
                                                            <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Password">
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="inputEmail4">Conform Password</label>
                                                            <input type="password" name="password_confirmation" class="form-control" id="inputEmail4" placeholder="Password">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4"></label>
                                                            <input type="submit" class="btn btn-scrib-cta btn-lg ripple-surface" id="inputEmail4" value="Sign Up" style="padding: 6px 20px;
                                                            margin-top: 33px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    @endif
                    
                    <div id="quote-panel" class="panel panel-default panel-default-scribendi">
                        <div class="panel-heading">
                            <span class="fa fa-shopping-cart"></span>
                            <span class="notranslate">&nbsp;</span>Order Details
                        </div>
                        <div class="panel-body">
                            <table id="quote-table" class="table" style=" width: 100%;">
                                @php $data = Session::get('data'); @endphp 
                                <tbody>
                                    <tr>
                                        @if(isset($data['service_type']))
                                            <td colspan="2">
                                                {{ $data['service_type'] }},
                                                <span style="display: inline-block;">{{ $data['total_words'] }} words completed within {{ $data['trunaround_time'] }} Hours</span>
                                            </td>
                                        @else 
                                            <td colspan="2">
                                                @if($data['sub_service']=='41')
                                                    CV
                                                @else  
                                                    Resume
                                                @endif
                                            </td>
                                        @endif
                                        <td id="checkout-base-price" class="price text-right">
                                            {{ $data['currency'] }} ${{ number_format($data['total_amount'], 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Currency: {{ $data['currency'] }}</td>
                                        <td class="text-right" align="right" style="font-weight: bold;">Total:<span class="notranslate">&nbsp;</span></td>
                                        <td id="checkout-final-price" class="price text-right" style="font-weight: bold;">
                                            ${{ number_format($data['total_amount'], 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="canada-tax" style="margin-top: -19px;">
                                <strong>Please note:</strong> Our head office is in Ontario, so sales tax (GST/HST) will be added to orders from Canada.
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a  href="{{route('checkout')}}"  class="btn btn-scrib-cta btn-lg" id="start_checkout" name="start_checkout">
                        <span class="confirm">Proceed to Checkout</span>
                        <span class="notranslate">&nbsp;</span><span class="fa fa-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="lastsec" style="margin-top: 200px;">
@endsection
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->