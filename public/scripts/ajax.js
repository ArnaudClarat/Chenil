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

		switch (true) {
			case $(this).hasClass('edit'):
				return mod(entity, id);
				break;
			case $(this).hasClass('create'):
				return create(entity);
				break;
			case $(this).hasClass('show'):
				return show(entity, id);
				break;
			case $(this).hasClass('update'):
				return update(entity, id);
				break;
			case $(this).hasClass('store'):
				return store(entity);
				break;
			default:
				return destroy(entity, id);
		}
	});

	$('body').on('change', 'select#specie', function () {
		var selectedSpecie = $(this).find('option:selected').val();
		updateRaceOptions(selectedSpecie);
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

	function mod(entity, id) {
		$.get("/"+entity+"/"+id+"/edit")
		.done(function(result) {
			$('.content').html(result);
		    $('select#specie').each(function() {
        		var selectedSpecie = $(this).find('option:selected').val();
        		updateRaceOptions(selectedSpecie);
    		});
		})
		.fail(function(err) {
			console.warn('error in edit', err);
		})
	}

	function update(entity, id) {
		var data = $('form').serialize();
		$.post("/"+entity+"/"+id+"/update", data)
		.done(function(result) {
			$('.content').html(result);
		})
		.fail(function(err) {
			console.warn('error in edit', err);
		})
	}

	function create(entity) {
		$.get("/"+entity+"/create")
		.done(function(result) {
			$('.content').html(result);
			$('select#specie').each(function() {
        		var selectedSpecie = $(this).find('option:selected').val();
        		updateRaceOptions(selectedSpecie);
    		});
		})
		.fail(function(err) {
			console.warn('error in edit', err);
		})
	}

    function store(entity) {
		var data = $('form').serialize();
    	$.post("/"+entity+"/store", data)
    	.done(function(result) {
    		$('.content').html(result);
    	})
    	.fail(function(err) {
    		console.warn('error in edit', err);
    	})
    }

    function updateRaceOptions(selectedSpecie) {
		$.get("/races/"+selectedSpecie+"/where")
		.done(function(result) {
			result = JSON.parse(result);
			$('select#race').find('option').attr('disabled', 'disabled');
			for (let r in result) {				
				$opt = $('select#race').find('option[value="'+result[r]+'"]');
 				$opt.removeAttr('disabled');
			};
		});
    };
});

