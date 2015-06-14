function statusChangeCallback(response) {

	if (response.status === 'connected') {
		Acceder();
	} else if (response.status === 'not_authorized') {
		window.location=$('#base_url').val();
	} else {
		FB.login(function(response){
			if (response.status === 'connected') {
				Acceder();
			} else if (response.status === 'not_authorized') {
				window.location=$('#base_url').val();
			}
		},{scope: 'public_profile,email'});
	}
}

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
	FB.init({
		appId      : '317322888437962',
		cookie     : true,  // enable cookies to allow the server to access 
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.2
	});
};

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function Acceder() {
	FB.api('/me', function(response) {
		$.ajax({
			url: $('#base_url').val()+'user/loginfb',
			type: 'POST',
			data: response,
		})
		.done(function(response) {
			if (response=='-2' || response=='-3') {
				FB.login(function(response){
					statusChangeCallback(response);
				},{scope: 'public_profile,email'});
			}else if (response==1) {
				$('#dialog').attr('title', 'Iniciando Sesion.').html('<p>Espere mientras ingresa a su escritorio.</p>');
				$('#dialog').dialog({modal:true,resizable:false});
				setTimeout(function () {
					$('#dialog').dialog('close');
					History.pushState({url:$('#base_url').val()}, 'ZilevOS - Sistema Operativo', $('#base_url').val());
				},3000);
			}else if (response=='0') {
				$('#dialog').attr('title', 'Error').html('<p>Ocurrio un error ingresar con facebook.</p>');
				$('#dialog').dialog({modal:true,resizable:false});
			}else{
				$('#dialog').attr('title', 'Error').html('<p>'+response+'</P>');
				$('#dialog').dialog({modal:true,resizable:false});
			}
			console.log(response==1);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
}

$(function() {
	$('#login_fb').click(function(event) {
		event.preventDefault();
		checkLoginState();
	});

	$('#login_anonymous').click(function(event) {
		event.preventDefault();
		$.ajax({
			url: $('#base_url').val()+'user/anonimous',
		})
		.done(function(response) {
			History.pushState({url:$('#base_url').val()}, 'ZilevOS - Sistema Operativo', $('#base_url').val());
			console.log(response==1);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
});