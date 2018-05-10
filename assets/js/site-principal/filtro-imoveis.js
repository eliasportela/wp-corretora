jQuery(document).ready(function(){
	selectBairro();
	selectPreco();
});


function selectBairro(){

	var data = [];

	var selector = $('#bairroImovel');
	var cidade = $("#cidadeImovel").val();
	$('#bairroImovel').empty();
	$('#bairroImovel').prop("disabled", true);
	//fazendo a requisicao
	$.get(base_urla + 'api/bairros?id=' + cidade, function(res) { 
       
       	data = JSON.parse(res);
     	selector.append( '<option value="0">Selecione</option>' );
       	data.forEach(function(obj){
       
	       var option = $('<option>');
		   // set its value
		   option.val(obj.id_bairro);
		   // set its text
		   option.text(obj.nome_bairro);
		   // append it to select element
		   selector.append(option);
    	});
    })
    .done(function(){
    	$('#bairroImovel').prop("disabled", false);
    });
}

function selectPreco() {
	var selector = $('#precoImovel'); 
	var finalidade = $("#finalidadeImovel").val();
	//opcoes de venda
	if (finalidade == 1) { 
		$('#precoImovel').empty();
		$('#precoImovel').prop("disabled", true);

		selector.append( '<option value="0">Selecione</option>' );
		selector.append( '<option value="1">R$80 mil - R$150 mil</option>' );
		selector.append( '<option value="2">R$150 mil - R$250 mil</option>' );
		selector.append( '<option value="3">R$250 mil - R$500 mil</option>' );
		selector.append( '<option value="4">Acima de R$500 mil</option>' );
		
		$('#precoImovel').prop("disabled", false);
	}

	else if (finalidade == 2) { 
		$('#precoImovel').empty();
		$('#precoImovel').prop("disabled", true);
		
		selector.append( '<option value="0">Selecione</option>' );
		selector.append( '<option value="1">R$250,00 - R$600,00</option>' );
		selector.append( '<option value="2">R$600,00 - R$800,00</option>' );
		selector.append( '<option value="3">R$800,00 - R$1200,00</option>' );
		selector.append( '<option value="4">Acima de R$1200,00</option>' );
		
		$('#precoImovel').prop("disabled", false);
	}

}