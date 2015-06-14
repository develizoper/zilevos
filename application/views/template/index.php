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

	<title>ZilevOS</title>
	<meta content="Daniel Andres Veliz Obregon" name="author" />
	<meta content="Sistema operativo web online y offline. brinda un servicio de almacenamiento gratuito de 200Mb y interfaz personalizable. te brinda la seguridad de guardar tu archivos en la nube y compartirlo en las redes sociales." name="description" />
	<meta content="sistema,operativo,sistema operativo,zilevos,veliz,zilev,so,os,sistema operativo zilev,sistema zilevos,offline,online,emulacion,sistemas operativos" name="keywords" />

	<meta property="og:title" content="ZilevOS - Sistema Operativo Emulado en web"/>
	<meta property="og:site_name" content="ZilevOS"/>
	<meta property="og:type" content="Sistema Operativo"/>
	<meta property="og:description" content="Sistema operativo web online y offline. brinda un servicio de almacenamiento gratuito de 200Mb y interfaz personalizable. te brinda la seguridad de guardar tu archivos en la nube y compartirlo en las redes sociales." />
	<meta property="og:locale" content="es_PE" />
	<meta property="article:author" content="https://www.facebook.com/veliz.skl" />
	<meta property="og:url" content="<?=base_url();?>"/>
	<meta property="og:image" content="<?=base_url();?>assets/img/logo/logo_fb.png"/>

	<link rel="shortcut icon" href="<?=base_url();?>assets/img/logo/logo3.ico">

	<!-- Apple devices -->
	<link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets/img/logo/logox152.png" /> <!-- 152x152 -->
	<link rel="icon" href="<?=base_url();?>assets/img/logo/logox64.png"> <!-- 32x32 or 64x64 -->

	<!-- For Mobile Windows -->
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="<?=base_url();?>assets/img/logo/logox64.png"> <!-- 32x32 or 64x64 -->

	<link rel="stylesheet" href="<?=base_url();?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/jqueryiu/jquery-ui.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/jqueryiu/jquery-ui.theme.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/main.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/jpreloader/css/jpreloader.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/glyphicon.css" />

	<!--[if lte IE 7]>
		<link href="<?=base_url();?>assets/css/main.ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if lte IE 8]>
		<script src="<?=base_url();?>assets/js/respond.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/js/selectivizr.js"></script>
	<![endif]-->

	<?php foreach ($style as $css):?>
		<link rel="stylesheet" href="<?=base_url();?>assets/<?=$css?>">
	<?php endforeach; ?>

	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	<script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"><\/script>')</script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/vendor/jpreloader/js/jpreloader.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.history.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/vendor/jqueryiu/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/plugins.js"></script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.messages_es.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.date.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.alphanumeric.js"></script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/js/main.js"></script>

	<?php foreach ($script as $js):?>
 		<script src="<?=base_url();?>assets/<?=$js?>"></script>
	<?php endforeach; ?>

	<script>
		$(function() {
			$('body').jpreLoader({
				splashID: "#jSplash",
				loaderVPos: '0%',
				splashVPos: '0%'
			});
		});
	</script>
</head>
<body>
	<input id="base_url" type="hidden" value="<?=base_url()?>">
	
	<div id="ajax">
		<?php foreach ($body as $section):?>
			<?=$section; ?>
		<?php endforeach; ?>
	</div>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-28540217-3', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>