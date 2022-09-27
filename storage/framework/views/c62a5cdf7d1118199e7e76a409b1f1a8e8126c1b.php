<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content='<?php echo e(csrf_token()); ?>'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="John 1429">
    <!-- Favicon icon -->
    <title>Login || Elitereviser </title>
    <link rel="icon" href="<?php echo e(asset('public/assets/website/images/favicon.png')); ?>" type="image/png" sizes="16x16">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('public')); ?>/assets/admin/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(asset('public')); ?>/assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url( <?php echo e(asset('public/assets/admin/main-assets/images/background/login-register.jpg')); ?>">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="#">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="message alert"></div>
						<div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" id="email"placeholder="Email" required=""> </div>
                        </div>
						<div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password"required=""> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" value="">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/popper/popper.min.js"></script>
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('public')); ?>/assets/admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
	<script src="<?php echo e(asset('public')); ?>/assets/admin/js/jasny-bootstrap.js"></script>
    <script src="<?php echo e(asset('public')); ?>/assets/admin/main-assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('.message').hide();
        var form = $('#loginform');
        form.on('submit', function(e) {
            e.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();
            if (email == '') {
				$('#email').addClass('form-control-danger');
                $('.message').hide();
            } else {
				$('#email').removeClass('form-control-danger');
            }
            if (password == '') {
                $('#password').addClass('form-control-danger');
                $('.message').hide();
            } else {
                $('#password').removeClass('form-control-danger');
            }
            //console.log(email + ',' + password);
            if (email != '' && password != '') {
                $.ajax({
                    type: 'POST',
                    data: form.serialize(),
                    url: '<?php echo e(route("set-login")); ?>',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                    },
                    success: function(data) {
                        if (data != false) {
                            $('.message').removeClass('alert-danger');
                            $('.message').addClass('alert-success');
                            $('.message').show().html('login success').hide(3000);
                            $('#email').removeClass('border-danger');
                            $('#password').removeClass('border-danger');
                            console.log('my data: '+data);
                            if(data =='admin'){
                                setTimeout(function() {
                                    location.href = '<?php echo e(route("dashboard")); ?>'
                                }, 2500);
                            }else if(data =='editor'){
                                setTimeout(function() {
                                    location.href = '<?php echo e(route("editor.dashboard")); ?>'
                                }, 2500);
                            }else{ 
                                setTimeout(function() {
                                    location.href = '<?php echo e(route("my_orders")); ?>'
                                }, 2500);
                            }
                        } else {
                            $('.message').removeClass('alert-success');
                            $('.message').addClass('alert-danger');
                            $('.message').show().html('login failed. Try again');
                            $('#username').addClass('border-danger');
                            $('#password').addClass('border-danger');
                            console.log(data);
                        }
                    },
                    error: function(data) {
                       // console.log(data)
                    }
                });
            }
        });
    });
</script>

</html>
<?php /**PATH C:\xampp\htdocs\elitereviser\resources\views/backend/admin/login/login.blade.php ENDPATH**/ ?>