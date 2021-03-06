<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Merit LLC">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}public/admin/main-assets/images/favicon.png">-->
    <title>Dashboard || Elitereviser </title>
    <link rel="icon" href="{{ asset('public/assets/website/images/favicon.png') }}" type="image/png" sizes="16x16">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}public/assets/admin/main-assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" href="{{ asset('/') }}public/assets/admin/main-assets/plugins/dropify/dist/css/dropify.min.css">


	<!-- Bootstrap Core CSS -->

    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
	<!-- Custom CSS -->
    <link href="{{ asset('/') }}public/assets/admin/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/assets/admin/css/self.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('/') }}public/assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
	<!-- ================= Begin For Sweet Alert & Gritter Notifications ========== -->
    <link href="{{ asset('/') }}public/assets/admin/main-assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <!-- ================= End For Sweet Alert & Gritter Notifications ========== -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
</head>
<style>
    .right-side-toggle{ display:none;}
</style>
<body class="fix-header fix-sidebar card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            @include('backend.admin.layout.top-header')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- Side bar -->
         <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            @include('backend.admin.layout.sidebar')
            <div class="sidebar-footer">
                <a href="#" class="link" data-toggle="tooltip" title="Profile"><i class="ti-settings"></i></a>
                <a class="link" data-toggle="tooltip"></a>
                <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </aside>
	</div>

    <!-- ============================================================== -->
    <!-- Content Section  -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
    <!-- Content Section  -->
    <!-- ============================================================== -->

        <!-- Side bar -->

        <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                ?? <?= date('Y');?> Elitereviser
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
	<script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/popper/popper.min.js"></script>
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/') }}public/assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/') }}public/assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/') }}public/assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/') }}public/assets/admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- ================= Begin For Sweet Alert & Gritter Notifications ========== -->
	<script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
     <!-- ================= End For Sweet Alert & Gritter Notifications ========== -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- wysuhtml5 Plugin JavaScript -->
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {

        if ($(".texteditor").length > 0) {
            tinymce.init({
                selector: "textarea.texteditor",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
    <!-- jQuery file upload -->
    <script src="{{ asset('/') }}public/assets/admin/main-assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
		$(".select2").select2();
		// Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-d??posez un fichier ici ou cliquez',
                replace: 'Glissez-d??posez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'D??sol??, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
	 <!-- Clock Plugin JavaScript -->
            <script src="{{ asset('public/assets/admin/main-assets/plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
             <!-- Date Picker Plugin JavaScript -->
            <script src="{{ asset('public/assets/admin/main-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{ asset('public/assets/admin/main-assets/plugins/moment/moment.js') }}"></script>
            <script src="{{ asset('public/assets/admin/main-assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

            <script>
                // MAterial Date picker
                $('.myPicker').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
                $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
                $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

                $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY',time: false, minDate: new Date() });

                // Date Picker
                jQuery('.mydatepicker, #datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                jQuery('#datepicker-inline').datepicker({
                    todayHighlight: true
                });


            </script>


	<!-- ============================================================== -->
	<!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('public/assets/admin/main-assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

	@yield('js')

</body>

</html>
