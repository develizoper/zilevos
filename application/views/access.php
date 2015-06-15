<?php if (!isset($ajax)): ?>
	<div id="jSplash">
		<h1>Iniciando ZilevOS</h1>
		<h6>&copy; Develizoper 2015</h6>
	</div>
<?php endif ?>
<div id="dialog" style="display: none;" title="Iniciando sesion...">
  <p>Espere mientras ingresa a su escritorio</p>
</div>

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
