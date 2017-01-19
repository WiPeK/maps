$('#cateditModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var cat = button.data('whatever') // Extract info from data-* attributes
	var modal = $(this)
	modal.find('.modal-title').text('Edycja artykułu ' + cat.name)
	if (!!cat.logo) {
		modal.find('.modal-body .article_logo').html('<img src="../' + cat.logo + '" alt="' +  cat.name + '" class="logo_edit"/><span><a href="category/deletelogo/' + cat.id + '"<i class="glyphicon glyphicon-remove"></i></a></span>');
	} else {
		modal.find('.modal-body .article_logo').html('<input type="file" name="category_logo" class="input_file">')
	};
	//modal.find('.modal-body input').val(recipient)
	i = 0;
	for(i = 0; i<cat.obr.length; i++){
		modal.find('ul.img_cat').append('<li><img src="../' + cat.obr[i].link + '" alt="' +  cat.obr[i].name + '"/><a href="category/delete_image/' + cat.obr[i].id + '"<i class="glyphicon glyphicon-remove"></i></a></li>')
	}
	//usuwanie na zamknięcie
	
	modal.find('.name_in').html('<input type="text" class="input_wp" name="name" value="' + cat.name + '">')
});

$('#cateditModal').on('hidden.bs.modal', function (e) {
	var modal = $(this)
	modal.find('ul.img_cat li').empty()
});