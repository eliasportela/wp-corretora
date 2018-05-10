
var base_url = 'http://127.0.0.1/imobiliaria/';

function siteBuscaBairro(){
	var cidade = $('#siteBuscaIdCidade').val();
	console.log(cidade);
	var selector = $('#siteBuscaIdBairro'); 
	//fazendo a requisicao
	if (cidade) {

		$('#siteBuscaIdBairro').empty();

		$.get(base_url + 'api/bairros?id=' + cidade, function(res) { 
       
       	data = JSON.parse(res);
     
       	data.forEach(function(obj){
       
	       var option = $('<option>');
		   // set its value
		   option.val(obj.id_bairro);
		   // set its text
		   option.text(obj.nome_bairro);
		   // append it to select element
		   selector.append(option);

		   $('.selectpicker').selectpicker('refresh');

    	});
    })
    .done(function(){
    	$('#siteBuscaIdBairro').removeAttr('disabled');
    });

	}
}
