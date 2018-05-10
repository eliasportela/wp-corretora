// passar como parametro o que sera carregado Ex (Aguarde.. Carregando (bairros) (ds = bairros))
function request(ds){
	$('#request').css("display","block");
	$('#descricaoRequest').empty();
	$('#descricaoRequest').append(ds);	
}
function requestSuccess(){
	$('#request').css("display","none");
}
function alertError(ds) {
    $('#alertError').css("display","block");
    $('#descricaoAlertError').html(ds);   
}
