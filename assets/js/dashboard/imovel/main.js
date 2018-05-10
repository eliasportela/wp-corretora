var idGaleriaImovel = 0;

jQuery(document).ready(function(){

	//Selecionando os bairros	
	jQuery('#inserirImovel1').submit(function(){
			
		request('Inserindo os dados!');
		var dadosajax = {
					
			'tipoImovel': $("#tipoImovel").val(),
			'finalidadeImovel': $("#finalidadeImovel").val(),
			'precoImovel': $("#precoImovel").val(),
			'cepImovel': $("#cepImovel").val(),
			'cidadeImovel': $("#cidadeImovel").val(),
			'bairroImovel': $("#bairroImovel").val(),
			'logradouroImovel': $("#logradouroImovel").val(),
			'descricaoLogradouroImovel' : $("#descricaoLogradouroImovel").val(),
			'numeroImovel': $("#numeroImovel").val(),
			'complementoImovel': $("#complementoImovel").val()
		
		};

		console.log(dadosajax);
		
		pageurl = base_urla + 'admin/cadastro-imovel';
			
			jQuery.ajax({
				type: "POST",
				url: pageurl,
				data: dadosajax,
				success: function(result)
				{
					console.log($.trim(result));
					//se foi inserido com sucesso
					if ($.trim(result) == '1') {

						// Deu certo cara :D
						requestSuccess();

						swal({
							title: 'Sucesso!',
						  	text: 'Dados inseridos com sucesso!!',
						  	type: 'success'
						},function(){
							location.reload();
						});


					}else{
						swal("Erro!","Erro desconhecido","error");
					}
				},
				error: function(result)
				{	
					console.log(result);
					var res = result.readyState;
					if (res == 4){
						swal("Erro!","Recarregue a página e tente Novamente","error");
					}else{
						swal("Erro!","Erro ao enviar requisão ao servidor. Tente Novamente!","error");
					}
				}

			});
			
			return false;
	});


	//editando a img de perfil do imovel
	jQuery('#edicaoImgImovel').submit(function(){
			
		var dadosImagemImovel = new FormData(this);
		pageurl = base_urla + 'admin/imagem-perfil-imovel';

		if (parseInt($('#wcrop').val())) { // verificca se foi selecionado uma area de corte
			request('Enviando a Imagem!');
			$.ajax({
			    url: pageurl,
			    type: 'POST',
			    data:  dadosImagemImovel,
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
							  	text: 'Imagem alterada com sucesso!!',
							  	type: 'success'
							},function(){
								console.log(data);
							  	buscarImovelId(data);
							  	$("#fuiAlterado").val(1);
								$('#modalSelecionarImagem').css('display','none');
							});
			        },
			    error: function(jqXHR, textStatus, errorThrown) 
			        {
			        	requestSuccess();
			        	console.log(textStatus);
			            swal("Erro!","Erro desconhecido","error");
			        }          
			    });
		}else{
			swal("Erro!!","Selecione a área de corte para continuar!","error");
		
		}

			
		return false;
	});

	//editando os imoveis
	jQuery('#editarDetalhesImovel').submit(function(){
			
		request('Enviando os dados do Imóvel!');
		//alteradno a id do imovel a ser editado
		$("#idImovelDetalhes").val($("#idImovel").val());
		var dadosDetalhesImovel = new FormData(this);
		pageurl = base_urla + 'admin/detalhes-imovel';

		$.ajax({
		    url: pageurl,
		    type: 'POST',
		    data:  dadosDetalhesImovel,
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
						  	text: 'Imóvel alterado com sucesso!!',
						  	type: 'success'
						},function(){
							console.log(data);
						  	$("#fuiAlterado").val(1);
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


	//inserindo galeria
	jQuery('#inserirGaleriaImovelAA').submit(function(){
			
		request('Enviando as Imagens!');
		//alteradno a id do imovel a ser editado
		//$("#idImovelGaleria").val($("#idImovel").val());
		var dadosGaleriaImovel = new FormData(this);
		pageurl = base_urla+ 'admin/galeria-imovel';

		$.ajax({
		    url: pageurl,
		    type: 'POST',
		    data:  dadosGaleriaImovel,
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
						  	text: 'Imagens inseridas com sucesso!!',
						  	type: 'success'
						},function(){
							console.log(data);
						  	$("#fuiAlterado").val(1);
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


	//Inserindo a imagem do imovel
	jQuery('#edicaoImovel').submit(function(){
			
		request('Editando os dados!');
		var dadosajaxeditar = {
					
			'idImovel': $("#idImovel").val(),
			'idEnderecoImovel': $("#idEnderecoImovel").val(),
			'tipoImovel': $("#tipoImovelEditar").val(),
			'finalidadeImovel': $("#finalidadeImovelEditar").val(),
			'precoImovel': $("#precoImovelEditar").val(),
			'cepImovel': $("#cepImovelEditar").val(),
			'cidadeImovel': $("#cidadeImovelEditar").val(),
			'bairroImovel': $("#bairroImovelEditar").val(),
			'logradouroImovel': $("#logradouroImovelEditar").val(),
			'descricaoLogradouroImovel' : $("#descricaoLogradouroImovelEditar").val(),
			'numeroImovel': $("#numeroImovelEditar").val(),
			'complementoImovel': $("#complementoImovelEditar").val(),
			'disponibilidadeImovel': $("#disponibilidadeImovelEditar").val()
		};

		console.log(dadosajaxeditar);
		
		pageurl = base_urla+ 'admin/editar-imovel';
			
			jQuery.ajax({
				type: "POST",
				url: pageurl,
				data: dadosajaxeditar,
				success: function(result)
				{
					console.log($.trim(result));
					//se foi inserido com sucesso
					if ($.trim(result) == '1') {

						// Deu certo cara :D
						requestSuccess();
						swal({
							title: 'Sucesso!',
						  	text: 'Dados alterados com sucesso!!',
						  	type: 'success'
						},function(){
							$("#fuiAlterado").val(1);
						});
						
					}else{
						requestSuccess();
						swal("Erro!","Erro desconhecido","error");
					}
				},
				error: function(result)
				{	
					console.log(result);
					var res = result.readyState;
					if (res == 4){
						swal("Erro!","Recarregue a página e tente Novamente","error");
					}else{
						swal("Erro!","Erro ao enviar requisão ao servidor. Tente Novamente!","error");
					}
				}

			});
			
			return false;
	});

});


// Funcao para deletar o usuario
function deletarImovel() {
	swal({
	  title: "Tem certeza?",
	  text: "Ao excluir este imóvel ele não poderá mais ser recuperado!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Sim, Excluir!",
	  closeOnConfirm: false
	},
	function(){
	  	var dadosDeletar = {
			'id' : $("#idImovel").val()
		};
		
		pageurl = base_urla+ 'admin/remover-imovel';
			
			jQuery.ajax({
				type: "GET",
				url: pageurl,
				data: dadosDeletar,
				success: function(result)
				{
					swal({
						title: "Sucesso!",
					  	text: "Imóvel deletado com sucesso!",
					  	type: "success",
					  	closeOnConfirm: false
					},
					function(){
					  location.reload();
					});

				
				},
				error: function(result)
				{	
					swal("Erro!","Erro ao enviar requisão ao servidor. Tente Novamente!","error");
				}

			});
	  	
	});
}


// deleta a imagem da galeria
function deletarImagemGaleria(idImg) {
	swal({
	  title: "Tem certeza?",
	  text: "Ao excluir esta imagem ela não poderá ser recuperada!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Sim, Excluir!",
	  closeOnConfirm: false
	},
	function(){
	  	var dadosDeletar = {
			'id' : idImg
		};
		
		pageurl = base_urla+ 'admin/galeria-remove';
			
			jQuery.ajax({
				type: "GET",
				url: pageurl,
				data: dadosDeletar,
				success: function(result)
				{
					swal({
						title: "Sucesso!",
					  	text: "Imagem deletada com sucesso!",
					  	type: "success"
					});

					return buscarGaleriaImagens();
				
				},
				error: function(result)
				{	
					swal("Erro!","Erro ao enviar requisão ao servidor. Tente Novamente!","error");
				}

			});
	  	
	});
}


//Editar Imovel
function editarImovel(id) {
	//Buscar imovel pela ID
	buscarImovelId(id);
	$('#modalEdicaoImovel').css("display","block");

}
function informacoesImovel(){
	//alteradno a id do imovel a ser editado
	$("#idImovelDetalhes").val($("#idImovel").val());
	//modais
	console.log($("#idImovelDetalhes").val());
	$('#modalEdicaoImovel').css("display","none");
	$('#modalDetalhesImovel').css("display","block");	
}
// Passa a passo do cadastro
function imovelPasso1(){
	$('#cadastroImovel').css("display","block");	
	selectBairro(1);
}
function voltarImovelPasso1(){
	$('#modalDetalhesImovel').css("display","none");	
	$('#modalEdicaoImovel').css("display","block");
}
// Selecionar imagem para o perfil
function selecionarImagemImovel(){
	//alteradno a id do imovel a ser editado
	$('#idImovelImagem').val($('#idImovel').val());
	$('#cadastroImovel').css("display","none");
    $('#modalSelecionarImagem').css("display","block");
}
//Obtem os bairros coforme a id da cidade
function selectBairro(opcao){

	request('carregando os bairros');
	var data = [];

	if (opcao == 1){ //se estiver vindo da tela de cadastro
		var selector = $('#bairroImovel'); 
		var cidade = $("#cidadeImovel").val();
		$('#bairroImovel').empty();
	}else{ //se estiver vindo da tela de edicao
		var selector = $('#bairroImovelEditar'); 
		var cidade = $("#cidadeImovelEditar").val();
		$('#bairroImovelEditar').empty();
	}

	//fazendo a requisicao
	$.get(base_urla+'admin/bairros?id='+cidade, function(res) { 
       
       	data = JSON.parse(res);
     
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
    	requestSuccess()
    });
}

function buscarImovelId(id){

	request('carregando o Imóvel');
	var data = [];
	var imovel = id;

	var selector = '';//$('#bairroImovel');
	//fazendo a requisicao
	$.get(base_urla + 'api/imovel?id='+imovel, function(res) { 
       
		data = JSON.parse(res);
       	//passando os valores
       	$('#imgImovelEditar').attr('src', base_urla + 'assets/img/imoveis/' + data[0].img_imovel);
       	$('#idImovel').val(data[0].id_imovel);
       	$('#refImovel').val(data[0].referencia_imovel);
       	$('#idEnderecoImovel').val(data[0].id_endereco_imovel);
       	$('#cepImovelEditar').val(data[0].cep);
       	$('#numeroImovelEditar').val(data[0].numero);
       	$('#precoImovelEditar').val(data[0].preco_imovel);
       	$('#complementoImovelEditar').val(data[0].complemento);
       	$('#descricaoLogradouroImovelEditar').val(data[0].ds_logradouro);
       	$("#disponibilidadeImovelEditar").val(data[0].disponibilidade).change();
       	
       	//se estiver em destaque
       	if(data[0].destaque_imovel == 1){ //se estiver em destaque
       		$("#disponibilidadeImovelEditar").val(2).change();
       	}

       	$('#tipoImovelEditar').val(data[0].id_tipo_imovel).change();
       	$('#finalidadeImovelEditar').val(data[0].id_finalidade).change();
       	$('#cidadeImovelEditar').val(data[0].id_cidade).change();
       	$('#logradouroImovelEditar').val(data[0].id_logradouro).change();

       	$('#detalhes').val(data[0].detalhes);
       	$('#area').val(data[0].area);
       	$('#n_suite').val(data[0].n_suite);
       	$('#n_vagas_garagem').val(data[0].n_vagas_garagem);
       	$('#n_dormitorio').val(data[0].n_dormitorio);
       	$('#n_sala').val(data[0].n_sala);
       	$('#n_cozinha').val(data[0].n_cozinha);
       	$('#n_banheiro').val(data[0].n_banheiro);
       	$('#url_maps').val(data[0].url_maps);

    })
    .done(function(){
    	requestSuccess();
    	$('#bairroImovelEditar').val(data[0].id_bairro).change();
    });
}

//ESta funcao recarrega a pagina principal, caso houver alguma alteracao em um dos imoveis
function recarregarImoveis(){
	if ($("#fuiAlterado").val() == 1) {
		location.reload();
	}else{
		$("#cadastroImovel").css('display','none');
		$("#modalEdicaoImovel").css('display','none');
	}
}



// codigo da galeria
function galeriaImagem() {
	
}

function modalGaleria() {

	//alteracoes para o envio de imagem
	var idRefImovelGaleria = $('#refImovel').val();
	$('#idRefImovelGaleria').val(idRefImovelGaleria);
	var idImovelGaleria = $('#idImovel').val();
	$('#idImovelGaleria').val(idImovelGaleria);

	buscarGaleriaImagens();
}


Dropzone.options.myAwesomeDropzone = {
  dictDefaultMessage: "Ou arraste aqui as imagens do Imóvel",
  maxFilesize: 2, // MB
  maxFiles: 10,
  clickable: "#btnSelImgImovel",
  acceptedFiles: "image/*",
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { 
    	done(); 
    }
  }
};

//Buscar imagens dos imoveis
function buscarGaleriaImagens(){
	request('carregando Galería');
	var data = [];
	var imovel = $('#idImovel').val();;

	var img = '';
	var ref = '';
	//fazendo a requisicao
	
	$.get(base_urla + 'api/galeria-imovel?id='+imovel, function(res) { 
       
		if (res) {

			data = JSON.parse(res);
			$( ".imgGaleriaOutput" ).empty();
			ref = $('#refImovel').val();
			$.each(data, function(i, item) {
	    		img = base_urla + 'assets/img/imoveis/galeria/' + ref + '/' + data[i].name_file;
	    		idImg = data[i].id_img;
	    		$( ".imgGaleriaOutput" ).append( '<div class="w3-quarter w3-padding"><div class="w3-card-2 w3-gray" style="height:140px;max-width:100%"><button class="w3-button w3-red w3-block" onclick="deletarImagemGaleria('+idImg+')"><i class="fa fa-trash-o"></i></button><img class="w3-image" style="max-width:100%;max-height:100px;margin:auto;" src='+img+'></div></div>');
			})

		}else{
			return $( ".imgGaleriaOutput" ).empty();
		}
    })
    .done(function(){
    	requestSuccess();
    });	
};