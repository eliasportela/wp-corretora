jQuery(document).ready(function(){

	//Buscando Produtor
	if ($("#id_produtor").val() != undefined) {
		getProdutorID($("#id_produtor").val());
	}
	
	jQuery('#editarProdutor').submit(function(){
		
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

});

function getProdutorID(id){
	
	var url = base_urla + 'admin/api/produtor/id/'+id;
	var data = null;
	
	$.get(url, function(res) {
		
		if (res) {
			data = JSON.parse(res);
			data = data[0];
			
			$("#nome_produtor").val(data.nome_produtor);
			$("#id_tipo_pessoa").val(data.id_tipo_pessoa);
			$("#cpf_cnpj").val(data.cpf_cnpj);
			$("#rg_inscricao_estadual").val(data.rg_inscricao_estadual);
			$("#data_nascimento").val(data.data_nascimento);
			$("#escolaridade").val(data.escolaridade);
			$("#membros_familia").val(data.membros_familia);
			$("#email").val(data.email);
			$("#telefone").val(data.telefone);
			$("#endereco").val(data.endereco);
			$("#numero").val(data.numero);
			$("#complemento").val(data.complemento);
			$("#cep").val(data.cep);
			$("#bairro").val(data.bairro);
			$("#selectEstados").val(data.id_estado);
			$("#certificados").val(data.certificados);
			$("#image-foto-bd").attr("src",base_urla + 'uploads/docs/' + data.foto_produtor);
			$("#image-comprovante-bd").attr("src",base_urla + 'uploads/docs/' + data.comprovante_bancario);

		}else{
			swal("","Erro interno, por favor recarregue a página","error");
		}
	})
	.done(function(){
    	getCidades('selectEstados','selectCidades',data.id_cidade);
    	$("#id").val(data.id_estado);
    	//imgs
    	$("#image-foto-bd").css("display","block");
    	$("#image-comprovante-bd").css("display","block");
    });
}