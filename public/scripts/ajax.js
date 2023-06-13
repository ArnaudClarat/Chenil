$(document).ready(function() {
	//les différents boutons qui font une requete XHR ont tous la classe "xhr" ainsi qu'une classe correspondant à l'action (edit/create/show/destroy);
	$('body').on('click', 'button.xhr', function () {
		let id = $(this).attr('_id');
		if ($(this).hasClass('edit')) {
			return edit(id);
		} else if ($(this).hasClass('create')) {
			return create(); 
		} else if ($(this).hasClass('show')) {
			return show(id);
		}
		return destroy(id); 
	});

	function show (id) {
		$.get("/animals/"+id)
		.done(function(result) {
			$('.content').html(result);
		})
		.fail(function(err) {
			console.warn('error in edit', err);
		});
	};
});

