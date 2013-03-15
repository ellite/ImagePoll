function changeLogo(numb) {
	if(numb && numb > 0) {
			$('#visImg').attr('src', 'img/logos/'+numb+'.jpg');
			$('#option').val(numb);
	}	
}

function growGraph(id, percent) {
	$('.graph'+id).animate({
		height: percent
		}, 500);
	$('.graph'+id).attr('title', percent);	
}

function getResults() {
	$.get('ajax/results.php', function(data) {
			var functions = data.split('*DELIMITER*');
			var len = functions.length;
			for(i = 0; i < len; i++) {
				var values = functions[i].split(', ');
				growGraph(values[0], values[1]);
			}
	});	
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$("form").submit(function() {
	if($('#email').val() != "" && $('#email').val() != 'email') {
		if(IsEmail($('#email').val())) {
			$('.error').text('');
			$.post("ajax/submitpoll.php", $("#voteForm").serialize(), function(data){
				$('.error').text(data);
				if(data == "Voted") {
					getResults();	
				}
			});
		} else {
			$('.error').text('Email Invalid');
		}
	} else {
		$('.error').text('Insert Email');
		return false;
	}
	return false;
});