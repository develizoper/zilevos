<div id="dialog" style="display: none;" title="Iniciando sesion...">
  <p>Espere mientras ingresa a su escritorio</p>
</div>

<h1>Registrate</h1>
<form id="frmregistro" action="<?=base_url();?>user/registrar" method="post">
	<input id="js" type="hidden" name="js" value="0">
	<div><input type ="text" placeholder="¿Cual es su nombre?" name="nombre" class="first"></div>
	<div><input type ="text" placeholder="¿Cuales son su apellido?" name="apellido"></div>
	<div><input type ="email" placeholder="E-mail" name="email"></div>
	<div><input type ="password" placeholder="Contraseña" name="pass" id="password"></div>
	<div><input type ="password" placeholder="Confirme Contraseña" name="confirmpass"></div>
	<div><input type ="submit" value="Registrar" class="btn"></div>
</form>

<a href="<?=base_url();?>" class="link back history"><i class="glyphicon glyphicon-arrow-left"></i></a>
<a href="<?=base_url();?>login" class="link history">Iniciar Sesion</a>
<script type="text/javascript" src="<?=base_url();?>assets/js/registrar.js"></script>