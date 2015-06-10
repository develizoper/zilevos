(function(window,undefined){
	$(document).on("click touchend", "a.history", function (e) {
		e.preventDefault();
		href = $(this).attr("href");
		History.pushState({url:href}, document.title, href);

		$.get(href, function(data) {
			$('body').html(data);
		});
	});

	History.Adapter.bind(window,'statechange',function(){
		console.log('adapter','bind');
		console.log('event','statechange');
		console.log(History.getState().data);
		console.log('---------------------------');

		$.get(History.getState().data.url, function(data) {
			$('#load').html(data);
		});
	});

	History.Adapter.bind(window,'anchorchange',function(){
		console.log('adapter','bind');
		console.log('event','anchorchange');
		console.log(History.getHash());
		console.log('---------------------------');
	});
	History.Adapter.onDomLoad(function () {
		console.log('ondomload');
		console.log(History.getState().data);
		console.log('---------------------------');
	})
})(window);


$('#login .back').click(function(event) {
	alert('hola');
	$.ajax({
		url: $('#base_url').val()+'home/access',
	})
	.done(function(e) {
		$('.login').html(e);
		console.log(e);
	})
	.fail(function() {
		$('.login').html('<h1>Error de carga</h1>');
	});
});

$('#login_registered').click(function(event) {
	$.ajax({
		url: $('#base_url').val()+'login',
	})
	.done(function(e) {
		$('.login').html(e);
		console.log(e);
	})
	.fail(function() {
		$('.login').html('<h1>Error de carga</h1>');
	});
});

$('#login_anonymous').click(function(event) {
	$.ajax({
		url: $('#base_url').val()+'home/desktop',
	})
	.done(function(e) {
		$('main').html(e);
	})
	.fail(function() {
		$('.login').html('<h1>Error de carga</h1>');
	});
});

$('#login_fb').click(function(event) {
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	window.fbAsyncInit = function() {
		FB.init({
			appId      : '317322888437962',
			cookie     : true,  // enable cookies to allow the server to access 
			xfbml      : true,  // parse social plugins on this page
			version    : 'v2.2' // use version 2.2
		});

		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});
	};

	function statusChangeCallback(response) {
		console.log('statusChangeCallback');
		console.log(response);
		if (response.status === 'connected') {
			Acceder();
		} else if (response.status === 'not_authorized') {
			document.getElementById('status').innerHTML = 'Please log into this app.';
		} else {
			document.getElementById('status').innerHTML = 'Please log into Facebook.';
		}
	}

	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
		});
	}

	function Acceder() {
		FB.api('/me', function(response) {
			console.log(response);
			alert("Felicidades, estas logueado!");
		});
	}

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

