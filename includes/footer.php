		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.select2/select2.min.js" ></script>

	<script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  	<script type="text/javascript" src="js/jquery.parsley/parsley.js" ></script>
  	<script type="text/javascript" src="js/modernizr.js" ></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>
	<script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/skycons/skycons.js" ></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.min.js"></script>
	<script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
	<script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>

	<?php
	if($action == "listUser"){
	?>
	<script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<?php
	}
	?>

	<script>
	jQuery(function($){
	       $("#relationshipDateBegin").mask("99/99/9999");
	       $("#relationshipDateEnd").mask("99/99/9999");
	       $("#userCPF").mask("999.999.999-99");
	       $("#campoSenha").mask("***-****");
	});
	</script>
		
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
      $(document).ready(function(){
      	App.init();
        App.dataTables();
      });
    </script>
	
	

	<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
  </body>
</html>

