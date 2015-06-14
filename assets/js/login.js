$(function() {
	$('#frmlogin .btn').click(function () {
		$('#js').val('1');
	})
	$('#frmlogin').validate({
		errorClass:"has-error",
		validClass:"has-success",
		highlight: function(element, errorClass, validClass) {
			$(element).parents("div").addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents("div").removeClass(errorClass).addClass(validClass);
		},
		rules: {
			email      :{
				required:true,
				email:true
			},
			pass       :{
				required:true,
			}
		},
		messages : {
			email      :{
				required:"Ingrese su correo.",
				email   :"Correo no valido. Ej.: nombre@empresa.com."
			},
			pass       :{
				required:"Ingrese su clave de usuario."
			}
		},
		submitHandler:function() {
			$('#frmlogin').ajaxSubmit({ 
				success: function(response) {
					if (response=='-2') {
						$('#dialog').attr('title', 'Formulario Vacio').html('<p>Ingrese sus datos de ususario.</P>');
					}else if (response=='-1') {
						$('#dialog').attr('title', 'Error de Sesion').html('<p>Usuario no existe, ingrese sus datos de usario.</P>');
					}else if (response=='0') {
						$('#dialog').attr('title', 'Error de Sesion').html('<p>Verifique su nombre de usuario y contraseña.</P>');
					}else if (response=='1') {
						$('#frmlogin').clearForm().resetForm();
						$('#dialog').attr('title', 'Iniciando Sesion.').html('<p>Espere mientras ingresa a su escritorio.</P>');
						setTimeout(function () {
							$('#dialog').dialog('close');
							History.pushState({url:$('#base_url').val()}, 'ZilevOS - Sistema Operativo', $('#base_url').val());
						},1000);
					}else{
						console.log(response);
						$('#dialog').attr('title', 'Error Inesperado.').html('<p>Ocurrio un error, vuelva a intentar.</P>');
					}
					$('#dialog').dialog({modal:true,resizable:false});
				},
				error: function(){
					$('#dialog').attr('title', 'Error Fatal.').html(' <p>Lo sentimos, estamos teniendo problemas con el sistema, intente ingresar mas tarde. Gracias</p>');
				}
			});
			$('#js').val('0');
		}
    });
});
