$(document).ready(function() {
	//les différents boutons qui font une requete XHR ont tous la classe "xhr" ainsi qu'une classe correspondant à l'action (edit/create/show/destroy);
	$('body').on('click', 'button.xhr', function () {
		let id = $(this).attr('_id');
		let entity;
		switch (true) {
			case $(this).hasClass('animal'):
				entity = 'animals';
				break;
			case $(this).hasClass('owner'):
				entity = 'owners';
				break;
			case $(this).hasClass('specie'):
				entity = 'species';
				break;
			case $(this).hasClass('race'):
				entity = 'races';
				break;
			case $(this).hasClass('stays'):
				entity = 'stays';
				break;
		}


		if ($(this).hasClass('edit')) {
			return edit(entity, id);
		} else if ($(this).hasClass('create')) {
			return create(entity); 
		} else if ($(this).hasClass('show')) {
			return show(entity, id);
		}
		return destroy(entity, id); 
	});

	function show (entity, id) {
		$.get("/"+entity+"/"+id)
		.done(function(result) {
			$('.content').html(result);
		})
		.fail(function(err) {
			console.warn('error in edit', err);
		});
	};
});

