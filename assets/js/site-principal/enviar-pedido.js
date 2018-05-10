jQuery(document).ready(function(){

	jQuery('#enviarContato').submit(function(){
			
		request('Enviando os dados!');
		//alteradno a id do imovel a ser editado
		var dadosContato = new FormData(this);
		pageurl = base_urla + 'admin/enviar-pedido';

		$.ajax({
		    url: pageurl,
		    type: 'POST',
		    data:  dadosContato,
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
						  	text: 'Dados enviados. Entraremos em contato assim que possível!',
						  	type: 'success'
						},function(){
							$('#enviarContato').each(function(){this.reset();});
						});
		        },
		    error: function(jqXHR, textStatus, errorThrown) 
		        {
		        	requestSuccess();
		        	console.log(textStatus);
		            swal("Erro!","Erro desconhecido","error");
		        }          
		    });
			
		return false;
	});


});


