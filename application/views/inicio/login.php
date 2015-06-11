<div id="dialog" style="display: none;" title="Iniciando sesion...">
  <p>Espere mientras ingresa a su escritorio</p>
</div>

<h1>Iniciar Sesion</h1>
<form id="frmlogin" action="<?=base_url();?>user/login" method="post">
	<input id="js" type="hidden" name="js" value="0">
	<div><input type ="email" placeholder="E-mail" name="email" class="first"></div>
	<div><input type ="password" placeholder="Contraseña" name="pass"></div>
	<div><input type ="submit" class="btn" value="Ingresar"></div>
</form>

<a href ="<?=base_url();?>" class="link back history"><i class="glyphicon glyphicon-arrow-left"></i></a>
<a href ="<?=base_url();?>registrar" class="link history">Registrese aqui</a>
<script type="text/javascript" src="<?=base_url();?>assets/js/login.js"></script>
