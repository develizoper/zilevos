	function statusChangeCallback(response) {
		console.log('statusChangeCallback');
		console.log(response);
		if (response.status === 'connected') {
			Acceder();
		} else if (response.status === 'not_authorized') {
			window.location=$('#base_url').val();
		} else {
			FB.login(function(response){
				statusChangeCallback(response);
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
			console.log(JSON.stringify(response));
			alert("Felicidades, estas logueado!");

			
			/*$.ajax({
				url: $('#base_url').val()+'home/desktop',
			})
			.done(function(e) {
				$('main').html(e);
			})
			.fail(function() {
				$('.login').html('<h1>Error de carga</h1>');
			})*/
		});
	}
	$(function() {
		$('#login_fb').click(function(event) {
			event.preventDefault();
			checkLoginState();
		});
	});