jQuery(document).ready(function(){

	//Buscando Produtores
	getProdutores(1);

	//Inserir Propriedade
	jQuery('#inserirProdutor').submit(function(){
		
		var dadosajax = new FormData(this);
		//console.log(dadosajax);
		pageurl = base_urla + 'admin/api/produtor';

		$.ajax({
			url: pageurl,
			type: 'POST',
			data:  dadosajax,
			mimeType:"multipart/form-data",
			contentType: false,
			cache: false,
			processData:false,
			success: function(data, textStatus, jqXHR)
			{
	             // Em caso de sucesso faz isto...
	             console.log(jqXHR);
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	         	console.log(jqXHR);
	        }          
	    });

		return false;
	});


	//Editar Prorpriedade
	jQuery('#editarPropriedade').submit(function(){

		var dadosImagemImovel = new FormData(this);
		pageurl = base_urla + 'admin/imagem-perfil-imovel';

		if (parseInt($('#wcrop').val())) { // verificca se foi selecionado uma area de corte
			request('Enviando a Imagem!');
			$.ajax({
				url: pageurl,
				type: 'POST',
				data:  dadosImagemImovel,
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data, textStatus, jqXHR)
				{
			             // Em caso de sucesso faz isto...
			             requestSuccess();
			             swal({
			             	title: 'Sucesso!',
			             	text: 'Imagem alterada com sucesso!!',
			             	type: 'success'
			             },function(){
			             	console.log(data);
			             	buscarImovelId(data);
			             	$("#fuiAlterado").val(1);
			             	$('#modalSelecionarImagem').css('display','none');
			             });
			         },
			         error: function(jqXHR, textStatus, errorThrown) 
			         {
			         	requestSuccess();
			         	console.log(textStatus);
			         	swal("Erro!","Erro desconhecido","error");
			         }          
			     });
		}else{
			swal("Erro!!","Selecione a área de corte para continuar!","error");
		}
		return false;
	});

});


//Remover Prorpriedade
function deletarPropriedade() {
	swal({
		title: "Tem certeza?",
		text: "Ao excluir este imóvel ele não poderá mais ser recuperado!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Sim, Excluir!",
		closeOnConfirm: false
	},
	function(){
		var dadosDeletar = {
			'id' : $("#idImovel").val()
		};
		
		pageurl = base_urla+ 'admin/remover-imovel';

		jQuery.ajax({
			type: "GET",
			url: pageurl,
			data: dadosDeletar,
			success: function(result)
			{
				swal({
					title: "Sucesso!",
					text: "Imóvel deletado com sucesso!",
					type: "success",
					closeOnConfirm: false
				},
				function(){
					location.reload();
				});

				
			},
			error: function(result)
			{	
				swal("Erro!","Erro ao enviar requisão ao servidor. Tente Novamente!","error");
			}

		});

	});
}

//Modal Propriedade
function modalPropriedade(id) {
	//Buscar imovel pela ID
	//buscarPropriedadeId(id);
	$('html').css("overflow","hidden");
	$('#modalPropriedade').css("z-index","5");
	$('#modalPropriedade').css("display","block");
}

function buscarPropriedadeId(id){

	request('carregando o Imóvel');
	var data = [];
	var imovel = id;

	var selector = '';//$('#bairroImovel');
	//fazendo a requisicao
	$.get(base_urla + 'api/imovel?id='+imovel, function(res) { 

		data = JSON.parse(res);
       	//passando os valores
       	$('#imgImovelEditar').attr('src', base_urla + 'assets/img/imoveis/' + data[0].img_imovel);
       	$('#idImovel').val(data[0].id_imovel);
       	$('#refImovel').val(data[0].referencia_imovel);
       	$('#idEnderecoImovel').val(data[0].id_endereco_imovel);
       	$('#cepImovelEditar').val(data[0].cep);
       	$('#numeroImovelEditar').val(data[0].numero);
       	$('#precoImovelEditar').val(data[0].preco_imovel);
       	$('#complementoImovelEditar').val(data[0].complemento);
       	$('#descricaoLogradouroImovelEditar').val(data[0].ds_logradouro);
       	$("#disponibilidadeImovelEditar").val(data[0].disponibilidade).change();
       	
       	//se estiver em destaque
       	if(data[0].destaque_imovel == 1){ //se estiver em destaque
       		$("#disponibilidadeImovelEditar").val(2).change();
       	}

       	$('#tipoImovelEditar').val(data[0].id_tipo_imovel).change();
       	$('#finalidadeImovelEditar').val(data[0].id_finalidade).change();
       	$('#cidadeImovelEditar').val(data[0].id_cidade).change();
       	$('#logradouroImovelEditar').val(data[0].id_logradouro).change();

       	$('#detalhes').val(data[0].detalhes);
       	$('#area').val(data[0].area);
       	$('#n_suite').val(data[0].n_suite);
       	$('#n_vagas_garagem').val(data[0].n_vagas_garagem);
       	$('#n_dormitorio').val(data[0].n_dormitorio);
       	$('#n_sala').val(data[0].n_sala);
       	$('#n_cozinha').val(data[0].n_cozinha);
       	$('#n_banheiro').val(data[0].n_banheiro);
       	$('#url_maps').val(data[0].url_maps);
       })
	.done(function(){
		requestSuccess();
		$('#bairroImovelEditar').val(data[0].id_bairro).change();
	});
}

// Select produtores
function getProdutores(page){
	var selector = $("#produtores");
	var url = base_urla + 'admin/api/produtor/' + page;
	$.get(url, function(res) { 
		data = JSON.parse(res);
		data.result.forEach(function(obj){
			var tr = $('<tr>');
			var col = "";
			col += "<td>"+obj.nome_produtor+"</td>"
			col += "<td>"+obj.nome_tipo_pessoa+"</td>"
			col += "<td>"+obj.email+"</td>"
			col += "<td>"+obj.nome_cidade+"</td>"
			col += "<td>"+"<button class='w3-button'><i class='fa fa-eye'></i></button</td>"
			tr.append(col);
		   	selector.append(tr);
    	});
    })
    .done(function(){
    	//selector.removeAttr("disabled");
    });
}

//Mudar doc do tiipo de pessoa
function selectTipoPessoa(){
	var tipo = $("#tipo_pessoa").val();
	//pessoa fisica
	if (tipo == 1) {
		$("#label-cpf_cnpj").html("CPF");
		$("#label-ie_rg").html("RG");
	}
	//pessoa juridica
	else{
		$("#label-cpf_cnpj").html("CNPJ");
		$("#label-ie_rg").html("Inscrição Estadual");
	}
}
