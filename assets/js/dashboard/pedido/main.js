function contatoFinalizar(p) {
	
	request('Finalizando');
	id = $("#idContatoImovel").val();
	if (p==1) { // 1 para finalizar
		url = 'admin/finalizar-pedido?id='+id+'&par=1';
		var text = 'Contato finalizado'
	}else{
		url = 'admin/finalizar-pedido?id='+id+'&par=0';
		var text = 'Contato Reaberto'
	}
	$.get(base_urla + url, function(res){
		data = res;
	}).done(function(){
		if (data) {
			requestSuccess();
			swal({
				title:'Sucesso!',
			  	text: text,
			  	type: 'success'
			},function(){
				location.reload();
			});
		}else{
			swal('Erro!','Não foi possivel finalizar','error');
			requestSuccess();
			$('#modalConteudoPedido').css('display','none');
		}
	});
}
//madal do conteudo do pedido
function conteudoPedido(id) {
	// body...
	request('Carregando conteudo..');
	$.get(base_urla + 'admin/buscar-pedido?id='+id, function(res) { 
		if (res != undefined) {
			data = JSON.parse(res);
			$('#nomeContato').html(data.nome_contato);
			$('#assuntoContato').html(data.assunto);
			$('#emailContato').html(data.email);
			$('#telefoneContato').html(data.telefone);
			$('#idContato').html(data.id_contato);
			//ID do contato para poder recuperar na funcao finalizar imovel
			$('#idContatoImovel').val(data.id_contato);
			//verificar se o contato esta finalizado / para trocar os botoes
			$('#contatoFinalizado').val(data.finalizado);
			if($('#contatoFinalizado').val() == 1){ //se estiver fechado
				$("#btnReabrir").css('display','block');
				$("#btnFinalizar").css('display','none')
			}else{
				$("#btnReabrir").css('display','none');
				$("#btnFinalizar").css('display','block');
			}
			//
			$('#referenciaImovelContato').html(data.referencia_imovel);
			$('#msgContato').html(data.texto);
			$('#dataContato').html(data.data_contato);
			$('#horaContato').html(data.hora_contato);
			$("#linkImovelContato").attr("href", base_urla +'admin/imoveis?cidade=1&tipo=1&finalidade=1&ref='+ data.referencia_imovel);
			$("#imgImovelContato").attr("src", base_urla +'assets/img/imoveis/'+ data.img_imovel);
			//$('#imgImovelContato').attr('src', data.img_imovel);
		}else{
			data = false;
			alertError('Desculpe! Este imóvel foi excluido');
		}
	})
	.done(function(){
		requestSuccess();
		if (data) {
			visualizarImovel(data.id_contato);
	    	$('#modalConteudoPedido').css('display','block');	
		}
		
    });

	//assim q o user abre o modal, o pedido passa a ser como visualizado
    function visualizarImovel(id) {
		$.get(base_urla + 'admin/visualizacao-pedido?id='+id, function(res){
			data = res;
		});
		if (data) {
			console.log('euuu');
			ajaxBuscarContato();
			return true;
		}else{
			return false;
		}
    }

}


