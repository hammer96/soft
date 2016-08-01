<script src="<?php echo base_url() ?>assets/js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/momentjs/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/tabdrop/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/lib/datatables/datatables.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/lib/bootstrap_growl/bootstrap-growl.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/pages/ui_alerts.js" type="text/javascript"></script>




<script type="text/javascript">
	$(document).ready(function() {
		$('.datatable').dataTable({
			"sPaginationType": "bs_four_button"
		});
		$('.datatable').each(function(){
			var datatable = $(this);
// SEARCH - Add the placeholder for Search and Turn this into in-line form control
var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
search_input.attr('placeholder', 'Buscar');
search_input.addClass('form-control input-sm');
// LENGTH - Inline-Form control
var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
length_sel.addClass('form-control input-sm');
});
	});
</script>
<script>
	/*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-45950338-1', 'creligent.com');
	ga('send', 'pageview');*/

</script>