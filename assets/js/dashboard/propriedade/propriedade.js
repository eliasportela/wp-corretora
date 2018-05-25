jQuery(document).ready(function(){

	jQuery('#inserirPropriedade').submit(function(){
		
		if ($("#selectPropCidades").val() == 0) {
			swal("","Selecione a cidade da Propriedade","warning");

		}else{

			var dadosajax = new FormData(this);
			pageurl = base_urla + 'admin/api/propriedade/1';

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

	if (IDPRODUTOR != "") {
		getPropriedades(IDPRODUTOR);
	}
});

var SAFRA = 0;
var SAFRACAFE = 0;

function addSafra(){
	
	var selector = $("#tabelaSafra");
	var col = "";
	col += '<td>'+
	'<input type="number" value="2018" class="w3-input w3-border" name="safraAnoInicio[]" min="1900" max="2099" style="width: 45%;display: inline-block;margin-right:3px" required>'+
	'<input type="number" value="2019" class="w3-input w3-border" name="safraAnoFim[]" min="1900" max="2099" style="width: 45%;display: inline-block" required>'+
	'</td>';
	col += '<td>'+
	'<input type="number" class="w3-input w3-border" placeholder="Quantidade de sacas" name="safraQtd[]" required>'+
	'</td>';
	col += '<td>'+
	'<button class="w3-button w3-border w3-round" type="button" onclick="removeSafra('+SAFRA+')">'+
	'<i class="fa fa-times"></i> Remover'+
	'</button>'+
	'</td>';
	selector.append("<tr id='rowSafra"+SAFRA+"'>"+col+"</tr>");
	
	SAFRA = SAFRA + 1;
}

function removeSafra(id){
	$("#rowSafra"+id).remove();
}


function addSafraCafe(){
	
	var selector = $("#tabelaSafraCafe");
	var col = "";
	col += '<td>'+
	'<input type="number" value="2018" class="w3-input w3-border" name="safraCafeAnoInicio[]" min="1900" max="2099" style="width: 45%;display: inline-block;margin-right:3px" required>'+
	'<input type="number" value="2019" class="w3-input w3-border" name="safraCafeAnoFim[]" min="1900" max="2099" style="width: 45%;display: inline-block" required>'+
	'</td>';
	col += '<td>'+
	'<select class="w3-select w3-border w3-white" name="safraCafeVariedade[]">'+
	'<option value="2">Café Arábica</option>'+
	'<option value="1">Outros</option>'+
	'</select>'+
	'</td>';
	col += '<td><input type="number" class="w3-input w3-border" placeholder="Área" name="safraCafeArea[]"></td>';
	col += '<td><input type="number" class="w3-input w3-border" placeholder="Média de Sacas" name="safraCafeQtd[]"></td>';
	col += '<td>'+
	'<button class="w3-button w3-border w3-round" type="button" onclick="removeSafraCafe('+SAFRACAFE+')">'+
	'<i class="fa fa-times"></i> Remover'+
	'</button>'+
	'</td>';
	selector.append("<tr id='rowSafraCafe"+SAFRACAFE+"'>"+col+"</tr>");
	
	SAFRACAFE = SAFRACAFE + 1;
}

function removeSafraCafe(id){
	$("#rowSafraCafe"+id).remove();
}

//Modal Propriedade
function modalPropriedade(id) {
	if (IDPRODUTOR != "") {
		if (id != undefined) {
			getPropriedadesId(id);
		}
		$('html').css("overflow","hidden");
		$('#modalPropriedade').css("z-index","5");
		$('#modalPropriedade').css("display","block");
		//funcao editar
	}else{
		swal("","Para cadastrar uma propriedade você precisa salvar o produtor!","warning");
	}
}

function closeModalPropriedade() {
	$('html').css("overflow","auto");
	$('#modalPropriedade').css("display","none");
}

//liberar select do tipo de processamento
function toogleTipoProcessamento(){
	console.log($("#tipo_processamento").val());
	if ($("#tipo_processamento").val() == "Via Úmida") {
		$("#processamento_via_umido").removeAttr("disabled");
	}else{
		$("#processamento_via_umido").prop("disabled","true");
		$("#processamento_via_umido").val("");
	}
}


//Propriedades
function getPropriedades(id) {
	
	var selector = $("#propriedades");
	var url = base_urla + 'admin/api/propriedade/' + id;
	
	selector.empty();
	
	//request("Buscando Dados");
	$.get(url, function(res) {
		if (res) {
			data = JSON.parse(res);
			
			data.forEach(function(obj){
				var col = "";
				col += "<td><i class='fa fa-building-o'></i></td>"
				col += "<td>"+obj.nome_propriedade+"</td>";
				col += "<td>"+obj.nome_cidade+"</td>";
				col += "<td>"+obj.nome_estado+"</td>";
				selector.append("<tr onclick='modalPropriedade("+obj.id_propriedade+")'>"+col+"</tr>");
			});
		}
	})
	.done(function(){
    	
    });
}

//Editar/Visualizar
function getPropriedadesId(id){

	var url = base_urla + 'admin/api/propriedade/id/'+id;
	var data = null;
	
	$.get(url, function(res) {
		
		if (res) {
			data = JSON.parse(res);
			data = data[0];
			console.log(data);
			// $("#nome_produtor").val(data.nome_produtor);
			// $("#tipo_pessoa").val(data.id_tipo_pessoa);
			// $("#cpf_cnpj").val(data.cpf_cnpj);
			// $("#rg_inscricao_estadual").val(data.rg_inscricao_estadual);
			// $("#data_nascimento").val(data.data_nascimento);
			// $("#escolaridade").val(data.escolaridade);
			// $("#membros_familia").val(data.membros_familia);
			// $("#email").val(data.email);
			// $("#telefone").val(data.telefone);
			// $("#endereco").val(data.endereco);
			// $("#numero").val(data.numero);
			// $("#complemento").val(data.complemento);
			// $("#cep").val(data.cep);
			// $("#bairro").val(data.bairro);
			// $("#selectEstados").val(data.id_estado);
			// $("#certificados").val(data.certificados);
		}else{
			swal("","Erro interno, por favor recarregue a página","error");
		}
	})
	.done(function(){
    	//getCidades('selectEstados','selectCidades',data.id_cidade);
    	//$("#id").val(data.id_estado);
    	
    	//imgs
    	// if (data.comprovante_bancario != "") {
    	// 	$("#image-comprovante-bd").attr("src",base_urla + 'uploads/docs/'+IDPRODUTOR+'/'+data.comprovante_bancario);
    	// 	$("#image-comprovante-bd").css("display","block");
    	// }
    });
}
