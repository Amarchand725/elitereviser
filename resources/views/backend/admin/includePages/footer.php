<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?= date('Y');?> Merit LLC by logozones
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
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url();?>assets/admin/main-assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/popper/popper.min.js"></script>
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url();?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url();?>assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url();?>assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url();?>assets/admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- ================= Begin For Sweet Alert & Gritter Notifications ========== -->
	<script src="<?php echo base_url()?>assets/admin/main-assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo base_url()?>assets/admin/main-assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
     <!-- ================= End For Sweet Alert & Gritter Notifications ========== -->

	
	<!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/tinymce/tinymce.min.js"></script>
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
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
		$(".select2").select2();
		// Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
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
            <script src="<?= base_url();?>assets/admin/main-assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
             <!-- Date Picker Plugin JavaScript -->
            <script src="<?= base_url();?>assets/admin/main-assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="<?= base_url();?>assets/admin/main-assets/plugins/moment/moment.js"></script>
            <script src="<?= base_url();?>assets/admin/main-assets/	plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
            
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
    <script src="<?= base_url();?>assets/admin/main-assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
