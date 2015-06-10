(function(window,undefined){
	$(document).on("click touchend", "a.history", function (e) {
		e.preventDefault();
		href = $(this).attr("href");
		History.pushState({url:href}, document.title, href);
	});

	History.Adapter.bind(window,'statechange',function(){
		console.log('adapter','bind');
		console.log('event','statechange');
		console.log(History.getState().data);
		console.log('---------------------------');


		$.ajax({
			url: History.getState().data.url,
			type: 'POST',
			data: {ajax: true}
		})
		.done(function(e) {
			$('body').html(e);
		})
		.fail(function() {
			window.loaction='http://zilevos.iuxdev.com/fail';
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

$(function() {
	History.pushState({url:window.location.href}, document.title, window.location.href);
});

