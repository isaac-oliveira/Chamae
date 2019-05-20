$(function(){
	$(document).keydown(function (e) {
		if ($(".mensagem:focus") && (e.keyCode == 13)) {
			var campo = $('.mensagem');
			var msg = campo.val();
			var to = campo.attr('id');
			
			if(msg != ''){
				$.post('php/chat.php',{
				acao:'inserir',
				mensagem: msg,
				para: to
				}, function(retorno){
					$('#jan_' + to + ' ul.listar').append(retorno);
					campo.val('');
				});
			}
		}
	});
});