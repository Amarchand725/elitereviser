<style>
    body {
    background: #dedede;
    }
    .page-wrap {
        min-height: 100vh;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                @if(Auth::user() && Auth::user()->role_id == 3)
                    <a href="{{ url('/') }}" class="btn btn-link">Back to Home</a>
                @else 
                    <a href="{{ url('/home') }}" class="btn btn-link">Back to Home</a>
                @endif
            </div>
        </div>
    </div>
</div>
