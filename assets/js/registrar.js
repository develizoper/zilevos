$(function() {
	$('#frmregistro .btn').click(function () {
		$('#js').val('1');
	});
	
	$('#frmregistro').validate({
		errorClass:"has-error",
		validClass:"has-success",
		highlight: function(element, errorClass, validClass) {
			$(element).parents("div").addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents("div").removeClass(errorClass).addClass(validClass);
		},
		rules: {
			nombre:{
				required:true,
				alpha:true
			},
			apellido:{
				required:true,
				alpha:true
			},
			email:{
				required:true,
				email:true
			},
			pass       :{
				required:true,
			},
			confimpass       :{
				required:true,
				equalTo: "#password"
			}
		},
		messages : {
			nombre:{
				required:"Por favor, ingrese su nombre.",
				alpha:"Solo puede contener letras."
			},
			apellido:{
				required:"Por favor, ingrese su apellido",
				alpha:"Solo puede contener letras."
			},
			email:{
				required:"Por favor, ingrese su email.",
				email:"Correo no valido. Ej.: nombre@empresa.com"
			},
			pass       :{
				required:"Ingrese una clave.",
			},
			confimpass       :{
				required:"Las claves con coinsiden.",
				equalTo: "#password"
			}
		},
		submitHandler:function() {
			$('#frmregistro').ajaxSubmit({ 
				success: function(response) {
					if (response=='-1') {
						$('#dialog').attr('title', 'Formulario Vacio').html('<p>Ingrese sus datos de ususario.</P>');
					}else if (response=='0') {
						$('#dialog').attr('title', 'Error de Sesion').html('<p>Verifique su nombre de usuario y contraseña.</P>');
					}else if (response=='1') {
						History.pushState({url:$('#base_url').val()}, 'ZilevOS - Sistema Operativo', $('#base_url').val());
						$('#frmregistro').clearForm().resetForm();
						$('#dialog').attr('title', 'Iniciando Sesion.').html('<p>Espere mientras ingresa a su escritorio.</P>');
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