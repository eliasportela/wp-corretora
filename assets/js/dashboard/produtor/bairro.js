jQuery(document).ready(function(){

	jQuery('#inserirbairro').submit(function(){

		dadosBairro = {
			'nome_bairro':$.trim($("#inputCadastroNomeBairo").val()),
			'id_cidade':$.trim($("#tagSelectCidadeCadastrarBairro").val())
		}

		console.log(dadosBairro);
		
		pageurl = base_urla + 'admin/cadastro-bairro';

		//
		$.post(pageurl,dadosBairro,function(res) {
			if (res) {
				buscarBairros(dadosBairro.id_cidade);
			}
		});
		//
		return false;
	})


});

//variaveis
var dataBairro = [];
//variaveis
function modalBairros() {

	selectCidades('tagSelectCidadeCadastrarBairro');
	selectCidades('tagSelectCidadesFiltro');
	$('#modalCadastroBairro').css('display','block');
	buscarBairros();

}

function buscarBairros(p) {

	$('#listBairros').empty();

	if (p != undefined) {
		pageurl = base_urla + 'admin/bairros?id=' + p;
	}else{
		pageurl = base_urla + 'admin/bairros';
	}
	$.get(pageurl, function(res) {

		if (res != '') {

			dataBairro = JSON.parse(res);
			$.each(dataBairro, function(i, item) {
				
				html = '<tr>'+
							'<td style="vertical-align: middle;" id="tdNomeBairro'+i+'">'+item.nome_bairro+'</td>'+
							'<td style="vertical-align: middle;" id="tdNomeCidadeBairro'+i+'">'+item.nome_cidade+'</td>'+
							'<td style="vertical-align: middle;" id="tdSiglaEstadoBairro'+i+'">'+item.sigla_estado+'</td>'+
							'<td style="vertical-align: middle;" id="tdBtnEditarBairro'+i+'">'+
								'<button type="button" class="w3-button w3-teal w3-round" onclick="selEditarBairro('+i+')"><i class="fa fa-edit"></i></button> '+
								'<button type="button" class="w3-button w3-red w3-round" onclick="removerBairro('+i+')"><i class="fa fa-trash-o"></i></button>'+
							'</td>'+
						'</tr>';

				$('#listBairros').append(html);
			
			});
		} //fim do if
	})
	.done(function(){
    	
    });
	
}

//muda para input os campos da tabela
function selEditarBairro(i) {
	
	$("#tdNomeBairro"+i).html('<input type="text" class="w3-input w3-border" id="inputNomeBairro'+i+'" value="'+dataBairro[i].nome_bairro+'" placeholder="'+dataBairro[i].nome_bairro+'" autofocus>');
	$("#tdNomeCidadeBairro"+i).html('<select class="w3-select w3-border" id="selBairroEditar'+i+'"></select>');
	$("#tdBtnEditarBairro"+i).html('<button type="button" id="btnEditarBairro" class="w3-button w3-teal w3-round" onclick="editarBairro('+i+')"><i class="fa fa-check"></i></button> <button type="button" class="w3-button w3-border w3-round" onclick="buscarBairros('+dataBairro[i].id_cidade+')"><i class="fa fa-times"></i></button>');
	
	var selector = $('#selBairroEditar'+i);

	pageurl = base_urla + 'admin/cidades';
	$.get(pageurl, function(res) {

		if (res != '') {

			dataCidade = JSON.parse(res);
			
			dataCidade.forEach(function(obj){

		       var option = $('<option>');
			   // set its value
			   option.val(obj.id_cidade);
			   // set its text
			   option.text(obj.nome_cidade);
			   // append it to select element
			   selector.append(option);

    		});
    	} //fim do if
	})
	.done(function(){
		$('#selBairroEditar'+i).val(dataBairro[i].id_cidade).change();
    });


}

//funcao para editar a bairro
function editarBairro(i) {
	
	dadosEdicao = {
		'nome_bairro':$.trim($("#inputNomeBairro"+i).val()),
		'id_cidade':$.trim($("#selBairroEditar"+i).val()),
		'id_bairro':dataBairro[i].id_bairro
	}

	pageurl = base_urla + 'admin/editar-bairro';

	$.post(pageurl,dadosEdicao,function(res){
		if (res) {
			buscarBairros(dadosEdicao.id_cidade);
		}else{
			swal("Erro!","Erro desconhecido","error");
		}
	});
}

//funcao de remover bairros
function removerBairro(i) {
	
	dados = {'id_bairro':dataBairro[i].id_bairro}
	pageurl = base_urla + 'admin/remover-bairro';

	swal({
		title: "Você tem certeza?",
		text: "Esta bairro não irá aparecer em buscas e cadastros, mas se existir imóveis cadastrados  nesta bairro ela ainda continuará existindo!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Sim, remover!",
		closeOnConfirm: false
	},
	function(){
		$.post(pageurl,dados,function(res){
			if (res) {
				buscarBairros(dataBairro[i].id_cidade);
				swal("Deletada","A bairro foi removida","success");
			}else{
				swal("Erro!","Erro desconhecido","error");
			}
		});

	});
}


//funcao q filtra os bairros por cidade quando muda o select
function changeSelectCidades() {
	id = $('#tagSelectCidadesFiltro').val();
	buscarBairros(id);
}