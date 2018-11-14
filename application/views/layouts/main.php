<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
    	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Step Up</title>
		
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/plugins/images/favicon.png');?>">
		<link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/bower_components/toast-master/css/jquery.toast.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/bower_components/morrisjs/morris.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/bower_components/custom-select/custom-select.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bower_components/switchery/dist/switchery.min.css');?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.css');?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css');?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css');?>" />
		<link href="<?php echo base_url('assets/css/animate.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/colors/default.css');?>" id="theme" rel="stylesheet">
	</head>
	<body style="background-color: #f5f5f5;">
		<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg pull-right" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
              <div class="top-left-part hidden-xs" style="background: #4f5467"><h2 style="color:white;"><a href="<?php echo site_url('/');?>">&nbsp;&nbsp;&nbsp;StepUP!</a></h2></div>
                <ul class="nav navbar-top-links navbar-right pull-right">
					<?php
                    if ($this->session->userdata('username') != '') { ?>
                        <?php
                    } else { ?>
                        <li><a href="<?php echo site_url("Dashboard/register"); ?>">Registracija</a></li>
                        <li><a href="<?php echo site_url("Dashboard/login"); ?>">Logovanje</a></li>
                    <?php } ?>

                    <!-- sekcija za lekare -->
			        <?php if ($this->session->userdata('role') == 2) { ?>
			            <li><a href="<?php echo site_url("Lekarpacijent/pregledPacijenata"); ?>">Pacijenti</a></li>
			            <li><a href="<?php echo site_url("Trauma/index"); ?>">Traume</a></li>
			            <li><a href="<?php echo site_url("Vezba/index"); ?>">Vežbe</a></li>
			        <?php } ?>

			        <!-- sekicja za pacijente -->
                    <?php if ($this->session->userdata('role') == 3) { ?>
                        <li><a href="<?php echo site_url("Lekarpacijent/zapocniProgram"); ?>">Rehabilitacija</a></li>
                        <li><a href="<?php echo site_url("Lekarpacijent/prikaziPrograme"); ?>">Moji programi</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') != '') { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <g class="hidden-xs"><span class="hidden-xs"><?php echo $this->session->userdata('username');?></span></g> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo site_url('Dashboard/logout');?>"><i class="fa fa-power-off"></i>  Odjavi se</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

		<?php if (isset($_view) && $_view)
		    $this->load->view($_view);
		?>

		<script src="<?php echo base_url('assets/plugins/bower_components/jquery/dist/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.slimscroll.js');?>"></script>
		<script src="<?php echo base_url('assets/js/waves.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/raphael/raphael-min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/switchery/dist/switchery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/custom-select/custom-select.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/plugins/bower_components/multiselect/js/jquery.multi-select.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/counterup/jquery.counterup.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/toast-master/js/jquery.toast.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/blockUI/jquery.blockUI.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js');?>"></script>

		<script>
		$( document ).ready(function() {
			$('#a').click(function(){
				var data = CKEDITOR.instances.editor1.getData();
				console.log(data);
			});
		});
		</script>
	</body>
</html>