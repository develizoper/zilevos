<?php if (!isset($ajax)): ?>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.messages_es.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.date.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.validate.alphanumeric.js"></script>
	
	<div id="jSplash">
		<h1>Iniciando ZilevOS</h1>
		<h6>&copy; Develizoper 2015</h6>
	</div>
<?php endif ?>

<main class="">
	<div id="login">
		<div class ="body"></div>
		<div class ="grad"></div>
		<div class ="header">
			<div>Zilev<span>OS</span></div>
		</div>
		<br>

		<div class="login">
			<?php
				if (!isset($load)) {
					$this->load->view('inicio/index');
				}else{
					$this->load->view('inicio/'.$load);
				}
			?>
		</div>
	</div>
</main>