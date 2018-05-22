function getCidades(par1,par2) {
	var estado = $("#"+par1);
	var selector = $("#"+par2);
	var url = base_urla + 'admin/api/cidade?id=';
	console.log(par1,par2);

	selector.html("<option>Buscando cidades...</option>");
	selector.prop("disabled","true");

	console.log(estado);
	if (estado.val() == 0) {
		selector.html("<option>Selecione o Estado</option>");
		return;
	}

	$.get(url+estado.val(), function(res) { 
       	data = JSON.parse(res);
       	selector.empty();
       	data.forEach(function(obj){
	       var option = $('<option>');
		   option.val(obj.id_cidade);
		   option.text(obj.nome_cidade);
		   selector.append(option);
    	});
    })
    .done(function(){
    	selector.removeAttr("disabled");
    });
}

function request(ds){
	$('#request').css("display","block");
	$('#descricaoRequest').empty();
	$('#descricaoRequest').append(ds);	
}
function requestSuccess(){
	$('#request').css("display","none");
}