<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6 lt-ie9 lt-ie8 lt-ie7 lt-ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9 lt-ie9" lang="es"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<!-- <html lang="en" manifest="<?=base_url();?>demo.assetscache"> -->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ZilevOS - <?=$title;?></title>
	<meta content="Daniel Andres Veliz Obregon" name="author" />
	<meta content="Sistema operativo web online y offline. brinda un servicio de almacenamiento gratuito de 200Mb y interfaz personalizable. te brinda la seguridad de guardar tu archivos en la nube y compartirlo en las redes sociales." name="description" />
	<meta content="sistema,operativo,sistema operativo,zilevos,veliz,zilev,so,os,sistema operativo zilev,sistema zilevos,offline,online,emulacion,sistemas operativos" name="keywords" />

	<link rel="shortcut icon" href="<?=base_url();?>assets/img/logo/logo3.ico">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/main.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/jpreloader/css/jpreloader.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/login/css/style.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/glyphicon.css" />

	<!--[if lte IE 7]>
		<link href="<?=base_url();?>assets/css/main.ie.css" rel="stylesheet">
  <![endif]-->

  <!--[if lte IE 8]>
		<script src="<?=base_url();?>assets/js/respond.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/js/selectivizr.js"></script>
	<![endif]-->

	<!--[if lte IE 9]>
		<script src="<?=base_url();?>assets/js/IE9.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.placeholder.js"></script>
	<![endif]-->
</head>
<body>
	<input id="base_url" type="hidden" value="<?=base_url()?>">
	<div id="jSplash">
		<h1>Iniciando ZilevOS</h1>
		<h6>&copy; Develizoper 2015</h6>
	</div>


	<main class="">
		<div id="login">
			<div class  ="body"></div>
			<div class  ="grad"></div>
			<div class  ="header">
				<div>Zilev<span>OS</span></div>
			</div>
			<br>

			<div class="login"><?php $this->load->view('access');?></div>
		</div>
	</main>

	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	<script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"><\/script>')</script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/vendor/jpreloader/js/jpreloader.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.history.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/main.js"></script>

	<script>
		$(function() {
			$('body').jpreLoader({
				splashID: "#jSplash",
				loaderVPos: '0%',
				splashVPos: '0%'
			});
		});
	</script>

	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>
</body>
</html>