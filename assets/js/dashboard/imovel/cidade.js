jQuery(document).ready(function(){

	jQuery('#inserirCidade').submit(function(){

		dadosCidade = {
			'nome_cidade':$.trim($("#inputCadastroNomeCidade").val()),
			'sigla_estado':$.trim($("#inputCadastroSiglaEstado").val())
		}

		console.log(dadosCidade);
		
		pageurl = base_urla + 'admin/cadastrar-cidade';

		//
		$.post(pageurl,dadosCidade,function(res) {
			if (res) {
				buscarCidades();
			}
		});
		//
		return false;
	})


});

//variaveis
var dataCidade = [];
//variaveis
function modalCidades() {
	
	$('#modalCadastroCidade').css('display','block');
	buscarCidades();

}

function buscarCidades() {

	$('#listCidades').empty();

	pageurl = base_urla + 'admin/cidades';
	$.get(pageurl, function(res) {

		if (res != '') {

			dataCidade = JSON.parse(res);
			$.each(dataCidade, function(i, item) {
				
				html = '<tr>'+
							'<td style="vertical-align: middle;" id="tdNomeCidade'+i+'">'+item.nome_cidade+'</td>'+
							'<td style="vertical-align: middle;" id="tdSiglaEstado'+i+'">'+item.sigla_estado+'</td>'+
							'<td style="vertical-align: middle;" id="tdBtnEditarCidade'+i+'">'+
								'<button type="button" class="w3-button w3-teal w3-round" onclick="selEditarCidade('+i+')"><i class="fa fa-edit"></i></button> '+
								'<button type="button" class="w3-button w3-red w3-round" onclick="removerCidade('+item.id_cidade+')"><i class="fa fa-trash-o"></i></button>'+
							'</td>'+
						'</tr>';

				$('#listCidades').append(html);
			
			});
		} //fim do if
	})
	.done(function(){
    	
    });
	
}

//muda para input os campos da tabela
function selEditarCidade(i) {
	
	$("#tdNomeCidade"+i).html('<input type="text" class="w3-input w3-border" id="inputNomeCidade'+i+'" value="'+dataCidade[i].nome_cidade+'" placeholder="'+dataCidade[i].nome_cidade+'" autofocus>');
	$("#tdSiglaEstado"+i).html('<input type="text" class="w3-input w3-border" id="inputSiglaEstado'+i+'" value="'+dataCidade[i].sigla_estado+'" placeholder="'+dataCidade[i].sigla_estado+'">');
	$("#tdBtnEditarCidade"+i).html('<button type="button" id="btnEditarCidade" class="w3-button w3-teal w3-round" onclick="editarCidade('+i+')"><i class="fa fa-check"></i></button> <button type="button" class="w3-button w3-border w3-round" onclick="buscarCidades()"><i class="fa fa-times"></i></button>');

}

//funcao para editar a cidade
function editarCidade(i) {
	
	dadosEdicao = {
		'nome_cidade':$.trim($("#inputNomeCidade"+i).val()),
		'sigla_estado':$.trim($("#inputSiglaEstado"+i).val()),
		'id_cidade':dataCidade[i].id_cidade
	}

	pageurl = base_urla + 'admin/editar-cidade';

	$.post(pageurl,dadosEdicao,function(res){
		if (res) {
			buscarCidades();
		}else{
			swal("Erro!","Erro desconhecido","error");
		}
	});
}

//funcao de remover cidades
function removerCidade(id) {
	
	dados = {'id_cidade':id}
	pageurl = base_urla + 'admin/remover-cidade';

	swal({
		title: "Você tem certeza?",
		text: "Esta cidade não irá aparecer em buscas e cadastros, mas se existir imóveis cadastrados  nesta cidade ela ainda continuará existindo!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Sim, remover!",
		closeOnConfirm: false
	},
	function(){
		$.post(pageurl,dados,function(res){
			if (res) {
				buscarCidades();
				swal("Deletada","A cidade foi removida","success");
			}else{
				swal("Erro!","Erro desconhecido","error");
			}
		});

	});
}

function selectCidades(p){

	$('#listCidades').empty();
	var selector = $('#'+p);

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
    });
}