$(document).ready(function(){

	var check = true;
	var fazer = '';
	
	var janelas = new Array();
	Array.prototype.clean = function(deleteValue){
		for(var i = 0; i < this.length; i++){
			if(this[i] == deleteValue){
				this.splice(i, 1);
				i--; 
			}
		}
	}
	
	function add_janela(id, nome){
		var html_add = '<div class="janela" id="jan_'+id+'" ><div class="topo" id="'+id+'" ><span>'+nome+'</span><a href="javascript:void(0);" id="fechar" >X</a></div><div id="corpo" ><div id="mensagens"><ul class="listar"><li></li></ul></div><input type="text" class="mensagem" id="'+id+'"></div></div>';
		$('#chat').append(html_add);
	}
	
	$('body').delegate('.comecar', 'click', function(){
		var id = $(this).attr('id');
		var nome = $(this).attr('nome');
		
		janelas.push(id);
		janelas.clean(undefined);
		
		add_janela(id, nome);
		$(this).removeClass('comecar');	
		
	});
	
	$('body').delegate('a#fechar', 'click',function(){
		var id = $(this).parent().attr('id');
		var parent = $(this).parent().parent().toggle(100);
		$('#user a#'+id+'').addClass('comecar');
		
		var n = janelas.length;
		for(i = 0; i < n; i++){
			if(janelas[i] != undefined){
				if(janelas[i] == id){
					delete janelas[i];
				}
			}
		}
		
	});
	
	$('body').delegate('.topo', 'click', function(){
		var pai = $(this).parent();
		var isto = $(this);
		
		if(pai.children('#corpo').is(':hidden')){
			isto.removeClass('fixar');
			pai.children('#corpo').toggle(100);
		}else{
			isto.addClass('fixar');
			pai.children('#corpo').toggle(100);
		}
	});
	
	setInterval(function(){
		var campo = $('.mensagem');
		var to = campo.attr('id');
		
		$.post('php/chat.php',{
		acao:'atualizar',
		para: to
		}, function(retorno){
			if(retorno != fazer){
				$('#jan_'+to+' ul.listar li').remove();
				$('#jan_'+to+' ul.listar').append(retorno);
			}
			fazer = retorno;
		});

	}, 3000);
	
});