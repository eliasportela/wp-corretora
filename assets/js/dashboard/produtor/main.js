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
var PAGEQTD = 1;

// Select produtores
function getProdutores(page){
	var selector = $("#produtores");
	var url = base_urla + 'admin/api/produtor/' + page;
	
	selector.empty();
	var nome = "nome="+$("#nomesearch").val();
	var tipo = "tipo="+$("#tiposearch").val();;
	var cidade = "cidade="+$("#cidadesearch").val();

	//request("Buscando Dados");
	$.get(url +'?'+nome+'&'+tipo+'&'+cidade, function(res) {
		if (res) {
			data = JSON.parse(res);
			PAGEQTD = data.pages; 
			data.result.forEach(function(obj){
				var col = "";
				col += "<td>"+"<i class='fa fa-user'></i></td>"
				col += "<td>"+obj.nome_produtor+"</td>"
				col += "<td>"+obj.nome_tipo_pessoa+"</td>"
				col += "<td>"+obj.email+"</td>"
				col += "<td>"+obj.nome_cidade+"</td>"
				selector.append("<tr onclick=viewProdutor("+obj.id_produtor+")>"+col+"</tr>");
			});
			$("#naoencontrado").css("display","none");
		}else{
			data = null;
			$("#naoencontrado").css("display","block");
		}
	})
	.done(function(){
    	if (PAGEID == PAGEQTD) {
    		$("#btnproximo").prop("disabled","true");;
    	}
    	if(PAGEID == 1){
    		$("#btnanterior").prop("disabled","true");;
    	}
    });
}

function limparSearch() {
	$("#nomesearch").val("");
	$("#tiposearch").val("");
	$("#cidadesearch").val("");
	getProdutores(1);
}

function pagination(tipo){
	if (tipo == 0) {
		//anterior
		PAGEID = PAGEID - 1;
		getProdutores(PAGEID);
		$("#btnproximo").removeAttr("disabled");
	}else if(tipo == 1) {
		//proximo
		PAGEID = PAGEID + 1;
		getProdutores(PAGEID);
		$("#btnanterior").removeAttr("disabled");
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


function viewProdutor(id){
	window.location.href = base_urla +"admin/produtor/" + id;
}