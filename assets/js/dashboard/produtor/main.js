jQuery(document).ready(function(){

	//Buscando Produtores
	getProdutores(1);
	//Inserir Propriedade
	
	jQuery('#inserirProdutor').submit(function(){
		
		if ($("#selectCidades").val() == 0) {
			swal("","Selecione a cidade do produtor","warning");
		
		}else{

			var dadosajax = new FormData(this);
			pageurl = base_urla + 'admin/api/produtor';

			request("Salvando as informações");
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
					console.log(jqXHR);
					swal("","Dados inseridos com sucesso","success");
					requestSuccess();
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					console.log(jqXHR);
					requestSuccess();
				}          
			});
		}

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

var PAGEID = 1;
var PAGEQTD = 0;

//Modal Propriedade
function modalPropriedade() {
	$('html').css("overflow","hidden");
	$('#modalPropriedade').css("z-index","5");
	$('#modalPropriedade').css("display","block");
}

function closeModalPropriedade() {
	$('html').css("overflow","auto");
	$('#modalPropriedade').css("display","none");
}


// Select produtores
function getProdutores(page){
	var selector = $("#produtores");
	var url = base_urla + 'admin/api/produtor/' + page;
	
	selector.empty();
	//request("Buscando Dados");
	$.get(url, function(res) { 
		data = JSON.parse(res);
		PAGEQTD = data.pages; 
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
    	if (PAGEID == PAGEQTD) {
    		$("#btnproximo").css("display","none");
    	}else if(PAGEID == 1){
    		$("#btnanterior").css("display","none");
    	}
    });
}

function pagination(tipo){
	if (tipo == 0) {
		//anterior
		PAGEID = PAGEID - 1;
		getProdutores(PAGEID);
		$("#btnproximo").css("display","block");
	}else if(tipo == 1) {
		//proximo
		PAGEID = PAGEID + 1;
		getProdutores(PAGEID);
		$("#btnanterior").css("display","block");
	}
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
