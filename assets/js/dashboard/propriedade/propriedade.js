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
					requestSuccess();
					swal("","Dados inseridos com sucesso","success");
					getPropriedades(IDPRODUTOR);
					closeModalPropriedade();

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
		'<option value="Café Arábica">Café Arábica</option>'+
		'<option value="Outros">Outros</option>'+
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
			$("#nome_propriedade").val(data.nome_propriedade);
			$("#tipo_propriedade").val(data.tipo_propriedade);
			$("#cnpj").val(data.cnpj);
			$("#contato").val(data.contato);
			$("#telefone").val(data.telefone);
			$("#foto_propriedade").val(data.foto_propriedade);
			$("#latitude").val(data.latitude);
			$("#longitude").val(data.longitude);
			$("#altitude").val(data.altitude);
			$("#area_total").val(data.area_total);
			$("#area_plantada").val(data.area_plantada);
			$("#area_irrigada").val(data.area_irrigada);
			$("#arrendada").val(data.arrendada);
			$("#prod_media_cafe").val(data.prod_media_cafe);
			$("#p_eletricidade").val(data.p_eletricidade);
			$("#p_familiar").val(data.p_familiar);
			$("#p_analise_solo_folha").val(data.p_analise_solo_folha);
			$("#p_adubacao_organica").val(data.p_adubacao_organica);
			$("#p_fertilizacao").val(data.p_fertilizacao);
			$("#p_analise_camada_expessura").val(data.p_analise_camada_expessura);
			$("#p_sistema_tulhas").val(data.p_sistema_tulhas);
			$("#p_protecao_chuva").val(data.p_protecao_chuva);
			$("#tipo_terreiro").val(data.tipo_terreiro);
			$("#tipo_processamento").val(data.tipo_processamento);
			$("#processamento_via_umido").val(data.processamento_via_umido);
			$("#logradouro").val(data.logradouro);
			$("#numero_km").val(data.numero_km);
			$("#id_cidade").val(data.id_cidade);
			$("#obs").val(data.obs);
			$("#selectPropEstados").val(data.id_estado);
			
		}else{
			swal("","Erro interno, por favor recarregue a página","error");
		}
	})
	.done(function(){
    	getCidades('selectPropEstados','selectPropCidades',data.id_cidade);
    	
    	getSafras(id);
    	getSafrasCafes(id);
    	toogleTipoProcessamento();
    });
}

function getSafras(id){
	url = base_urla + 'admin/api/safra/' + id;
	selecto = $("#tabelaSafra");
	$.get(url, function(res) {
		if (res) {
			data = JSON.parse(res);
			
			data.forEach(function(obj){
				var col = "";
				col += '<td>'+obj.safra_ano_inicio+ '/' +obj.safra_ano_fim + '</td>';
				col += '<td>'+obj.valor_safra+'</td>';
				col += '<td>'+
							'<button class="w3-button w3-black w3-round"><i class="fa fa-edit"></i></button> '+
							'<button class="w3-button w3-red w3-round"><i class="fa fa-trash-o"></i></button></td>';
				selecto.append("<tr>"+col+"</tr>");
			});
		}
	})
	.done(function(){
    	
    });
}

function getSafrasCafes(id){
	url = base_urla + 'admin/api/safra-cafe/' + id;
	selector = $("#tabelaSafraCafe");
	$.get(url, function(res) {
		if (res) {
			data = JSON.parse(res);
			
			data.forEach(function(obj){
				var col = "";
				col += '<td>'+obj.safra_ano_inicio+ '/' +obj.safra_ano_fim + '</td>';
				col += '<td>'+obj.variedade+'</td>';
				col += '<td>'+obj.area_plantada+'</td>';
				col += '<td>'+obj.valor_safra+'</td>';
				col += '<td>'+
							'<button class="w3-button w3-black w3-round"><i class="fa fa-edit"></i></button> '+
							'<button class="w3-button w3-red w3-round"><i class="fa fa-trash-o"></i></button></td>';
				selector.append("<tr>"+col+"</tr>");
			});
		}
	})
	.done(function(){
    	
    });
}