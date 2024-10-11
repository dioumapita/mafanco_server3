
<!-- laravel sweat alert -->
@include('sweetalert::alert')
<!-- laravel livewire Scripts -->
	@livewireScripts
<!-- start js includes path -->
		<script src="/assets/asset_principal/plugins/jquery/jquery.min.js"></script>
		<script src="/assets/asset_principal/plugins/popper/popper.js"></script>
		<script src="/assets/asset_principal/plugins/jquery-blockui/jquery.blockui.min.js"></script>
		<script src="/assets/asset_principal/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Start plugins permettant de faire la validation au niveau des formulaires cote front-end -->
		<script src="/assets/asset_principal/plugins/jquery-validation/js/jquery.validate.min.js"></script>
		<script src="/assets/asset_principal/plugins/jquery-validation/js/additional-methods.min.js"></script>
		<script src="/assets/asset_principal/js/pages/validation/form-validation.js"></script>
	<!-- End plugins permettant de faire la validation au niveau des formulaires cote front-end -->

	<!-- start pluging permettant de faire le comptage automatique -->
		<script src="/assets/asset_principal/plugins/counterup/jquery.waypoints.min.js"></script>
		<script src="/assets/asset_principal/plugins/counterup/jquery.counterup.min.js"></script>
	<!--end start pluging permettant de faire le comptage automatique -->
	<!-- bootstrap -->
		<script src="/assets/asset_principal/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/asset_principal/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
		<script src="/assets/asset_principal/plugins/sparkline/jquery.sparkline.js"></script>
		<script src="/assets/asset_principal/js/pages/sparkline/sparkline-data.js"></script>
		<script src="/assets/asset_principal/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- Common js-->
		<script src="/assets/asset_principal/js/app.js"></script>
		<script src="/assets/asset_principal/js/layout.js"></script>
		<script src="/assets/asset_principal/js/theme-color.js"></script>
	<!-- material -->
		<script src="/assets/asset_principal/plugins/material/material.min.js"></script>
		<script src="/assets/asset_principal/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
		<script src="/assets/asset_principal/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
		<script src="/assets/asset_principal/plugins/material-datetimepicker/datetimepicker.js"></script>
	<!-- chart js -->
		<script src="/assets/asset_principal/plugins/chart-js/Chart.bundle.js"></script>
		<script src="/assets/asset_principal/plugins/chart-js/utils.js"></script>
		<script src="/assets/asset_principal/js/pages/chart/chartjs/home-data.js"></script>
	<!-- summernote -->
		<script src="/assets/asset_principal/plugins/summernote/summernote.js"></script>
		<script src="/assets/asset_principal/js/pages/summernote/summernote-data.js"></script>
	<!--Start Form Steps -->
		<script src="/assets/asset_principal/plugins/steps/jquery.steps.js"></script>
		<script src="/assets/asset_principal/js/pages/steps/steps-data.js"></script>
	<!--End Form Steps -->
	<!-- Start apline js pour la progress bar avec livewire -->
		<script src="/assets/asset_principal/js/alpine.min.js"></script>
	<!-- End apline js pour la progress bar  avec livewire-->
	<!--Start Select utiliser pour faire une selection multiple-->
		<script src="/assets/asset_principal/plugins/select2/js/select2.js"></script>
		<script src="/assets/asset_principal/js/pages/select2/select2-init.js"></script>
	<!-- End Select -->
	<!-- Start Plugins DataTables -->
		<script src="/assets/asset_principal/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/dataTables.buttons.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/buttons.flash.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/jszip.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/pdfmake.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/vfs_fonts.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/buttons.html5.min.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/buttons.print.min.js"></script>
		<script src="/assets/asset_principal/js/pages/table/table_data.js"></script>
		<script src="/assets/asset_principal/plugins/datatables/export/buttons.colvis.min.js"></script>
	<!-- End Plugins DataTables -->
	{{-- fonction print --}}
	<script src="/assets/asset_principal/js/function_print.js"></script>
    <!-- start boostrap date-spicket -->
        <script src="/assets/asset_principal/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="/assets/asset_principal/plugins/bootstrap-datepicker/datepicker-init.js"></script>
    <!-- end boostrap date-spicket -->
<!-- end js includes path -->
@include ('flashy::message')
{{-- @stack('scripts') --}}
</body>
</html>
