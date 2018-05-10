<input type="hidden" id="fuiAlterado" value="0">
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container w3-cell-row" style="padding-top:22px">
    <h5><i class="fa fa-building-o"></i><b> Imóveis</b></h5>
  </header>
    <div class="w3-row-padding w3-margin-bottom">
      
      <div class="w3-quarter" onclick="imovelPasso1()">
        <a href="#">
          <div class="w3-container w3-red w3-padding-16 w3-center">
            <i class="fa fa-building-o w3-xxxlarge"></i>
            <div class="w3-clear"></div>
            <h4>Novo Imóvel</h4>
          </div>
        </a>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16 w3-center">
          <div><i class="fa fa-check-circle-o w3-xxxlarge"></i></div>
          <div class="w3-clear"></div>
          <h4>Tipo Imóveis</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <a href="#" onclick="modalCidades()">
          <div class="w3-container w3-teal w3-padding-16 w3-center">
            <i class="fa fa-location-arrow w3-xxxlarge"></i>
            <div class="w3-clear"></div>
            <h4>Cidades</h4>
          </div>
        </a>
      </div>
      <div class="w3-quarter">
        <a href="#" onclick="modalBairros()">
          <div class="w3-container w3-orange w3-text-white w3-padding-16 w3-center">
            <i class="fa fa-map-marker w3-xxxlarge"></i>
            <div class="w3-clear"></div>
            <h4>Bairros</h4>
          </div>
        </a>
      </div>
    </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-container w3-card w3-white w3-padding w3-padding-32">
          <form method="GET" action="<?=base_url("admin/imoveis")?>">
            <div class="w3-row-padding">
              <div class="w3-col l3">
                <label class="w3-margin-top"><b>Cidade</b></label>
                <select class="w3-select w3-border"  name="cidade">
                  <?php foreach ($cidades as $cidade): ?>
                  <option value="<?=$cidade->id_cidade?>" <?php if($cidade->id_cidade == $cidadePesquisa): echo "selected "; endif;?>><?=$cidade->nome_cidade?></option>
                  <?php endforeach; ?>
                </select>  
              </div>
              <div class="w3-col l3">
                <label class="w3-margin-top"><b>Imóvel</b></label>
                <select class="w3-select w3-border" name="tipo" required>
                  <?php foreach ($tipoImoveis as $tipoImovel): ?>
                  <option value="<?=$tipoImovel->id_tipo?>" <?php if($tipoImovel->id_tipo == $tipoPesquisa): echo "selected "; endif;?>><?=$tipoImovel->ds_tipo?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="w3-col l2">
                <label class="w3-margin-top"><b>Finalidade</b></label>
                <select class="w3-select w3-border" name="finalidade" required>
                  <?php foreach ($finalidadeImoveis as $finalidadeImovel): ?>
                  <option value="<?=$finalidadeImovel->id_fi?>" <?php if($finalidadeImovel->id_fi == $finalidadePesquisa): echo "selected "; endif;?> ><?=$finalidadeImovel->ds_fi?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="w3-col l2">
                <label class="w3-margin-top"><b>Referência</b></label>
                <input class="w3-input" type="text" placeholder="Referência" name="ref" value="<?=$referenciaPesquisa?>">
              </div>
              <div class="w3-col l2">
                <label class="w3-margin-top"><b>Pesquisar</b></label>
                <button class="w3-button w3-teal w3-block" id="inserir_cidade"><i class="fa fa-search"></i> Pesquisar</button>
              </div>
            </div>
          </form>
        </div>
        
        <br>
        <div class="w3-responsive w3-card">
          <div class="w3-white">
            <table class="w3-table w3-hoverable w3-bordered w3-centered">
            <?php
            if($pesquisa == false): ?>
            <?php else: ?>  
              <tr class="w3-teal">
                <th>Foto</th>
                <th>Referencia</th>
                <th>Tipo do Imóvel</th>
                <th>Finalidade</th>
                <th>Cidade</th>
                <th>Bairro</th>
              </tr>
            <?php 
            if ($imoveis):
            foreach ($imoveis as $imovel): ?>
              <tr onclick="editarImovel('<?=$imovel->id_imovel?>')" style="cursor: pointer;">
                <td><img src="<?=base_url('assets/img/imoveis/'.$imovel->img_imovel)?>" style="max-width: 100px;max-height: 100px;"></td>  
                <td style="vertical-align: middle;"><?=$imovel->referencia_imovel?></td>
                <td style="vertical-align: middle;"><?=$imovel->ds_tipo?></td>
                <td style="vertical-align: middle;"><?=$imovel->ds_fi?></td>
                <td style="vertical-align: middle;"><?=$imovel->nome_cidade?></td>
                <td style="vertical-align: middle;"><?=$imovel->nome_bairro?></td>
              </tr>
            <?php endforeach; endif; endif; ?>
            </table>
            <?php if ($qtdImoveis == false): ?>
              <p class="w3-center w3-padding-16 w3-white w3-opacity">Nenhum imóvel encontrado</p>
            <?php endif ?>         
            <?php if ($qtdImoveis): ?>
              <p class="w3-right w3-padding">Imóveis encontrados: <?=$qtdImoveis;?></p>  
            <?php endif ?>         
          </div>
        </div>

    </div>
  </div>
</div>

  <div id="cadastroImovel" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:1200px">
      <form class="w3-container" method="POST" action="" id="inserirImovel1">
        <div class="w3-section">
          <div class="w3-row-padding">
            <div class="w3-col l4">
              <label class="w3-margin-top"><b>Tipo Imóvel</b></label>
              <select class="w3-select w3-border" id="tipoImovel" required>
                <?php foreach ($tipoImoveis as $tipoImovel): ?>
                <option value="<?=$tipoImovel->id_tipo?>"><?=$tipoImovel->ds_tipo?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="w3-col l4">
              <label class="w3-margin-top"><b>Finalidade Imóvel</b></label>
              <select class="w3-select w3-border" id="finalidadeImovel" required>
                <?php foreach ($finalidadeImoveis as $finalidadeImovel): ?>
                <option value="<?=$finalidadeImovel->id_fi?>"><?=$finalidadeImovel->ds_fi?></option>
                <?php endforeach; ?>
              </select>  
            </div>
            <div class="w3-col l4">
              <label class="w3-margin-top"><b>Preço</b></label>
              <input class="w3-input" type="number" step="0.00" placeholder="Insira o valor conforme a finalidade" id="precoImovel">
            </div>
          </div>
          </br>
          <div class="w3-row-padding">
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>CEP</b></label>
              <input class="w3-input" type="text" placeholder="Insira o CEP"  id="cepImovel"  pattern="(?=.*\d).{8}" title="O CEP deverá conter 8 números" required="">
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top" onclick="modalCidades()"><b>Cidade</b><i class="fa fa-plus-circle" title="Cadastrar Cidade"></i></label>
              <select class="w3-select w3-border"  id="cidadeImovel" onchange="selectBairro(1)" required>
                <?php foreach ($cidades as $cidade): ?>
                <option value="<?=$cidade->id_cidade?>"><?=$cidade->nome_cidade?></option>
                <?php endforeach; ?>
              </select>  
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top" onclick="modalBairros()"><b>Bairro</b> <i class="fa fa-plus-circle" title="Cadastrar Bairro"></i></label>
              <select class="w3-select w3-border"  id="bairroImovel">                
              </select>  
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>Logradouro</b></label>
              <select class="w3-select w3-border" id="logradouroImovel" >
                <?php foreach ($logradouros as $logradouro): ?>
                <option value="<?=$logradouro->id_logradouro?>"><?=$logradouro->ds_logradouro?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <br>
          <div class="w3-row-padding">
            <div class="w3-col l6">
              <label class="w3-margin-top"><b>Descrição do Logradouro</b></label>
              <input class="w3-input" type="text" placeholder="Ex: Floriano Peixoto (não escrever 'Rua', 'Av.' )" id="descricaoLogradouroImovel"  minlength="4" required="">
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Número / KM</b></label>
              <input class="w3-input" type="number" placeholder="Numero" id="numeroImovel" minlength="0" required="">    
            </div>
            <div class="w3-col l4">
              <label class="w3-margin-top"><b>Complemento</b></label>
              <input class="w3-input" type="text" placeholder="Complemento" id="complementoImovel">
            </div>
          </div>
          <br>
          <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Cadastrar</button>
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="recarregarImoveis()" type="button" class="w3-button w3-block w3-gray">Fechar</button>
      </div>
    </div>
  </div>

  <div id="modalEdicaoImovel" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="width:95%">
      <input type="hidden" id="idImovel" value="">
      <input type="hidden" id="refImovel" value="">
      <input type="hidden" id="idEnderecoImovel" value="">
      
      <div class="w3-container"><br>
        <span class="w3-button w3-large w3-red w3-left" onclick="deletarImovel()" title="Deletar"><i class="fa fa-trash-o"></i> Excluir Imóvel</span>
        <span class="w3-button w3-large w3-teal w3-right" onclick="informacoesImovel()" title="Informações do Imóvel"><i class="fa fa-building-o"></i> Informações do Imóvel</span>
        <span class="w3-right w3-margin-right">
          <select class="w3-select w3-border" id="disponibilidadeImovelEditar">
            <option value="0">Imóvel não Disponível</option>
            <option value="1">Imóvel Disponível</option>
            <option value="2">Em Destaque</option>
          </select>
        </span>
      </div><br>

      <div class="w3-row-padding">
        <div class="w3-col m4">
          <button class="w3-button w3-teal w3-block w3-margin-bottom" onclick="selecionarImagemImovel()">Trocar Imagem</button>
          <img class="w3-image" id="imgImovelEditar" src="">
        </div>
        <div class="w3-col m8">
          <form class="w3-container" method="POST" action="" id="edicaoImovel">
            <div class="w3-section">
              <div class="w3-row-padding">
                <div class="w3-col l4">
                  <label class="w3-margin-top"><b>Tipo Imóvel</b></label>
                  <select class="w3-select w3-border" id="tipoImovelEditar" required>
                    <?php foreach ($tipoImoveis as $tipoImovel): ?>
                    <option value="<?=$tipoImovel->id_tipo?>"><?=$tipoImovel->ds_tipo?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="w3-col l4">
                  <label class="w3-margin-top"><b>Finalidade Imóvel</b></label>
                  <select class="w3-select w3-border" id="finalidadeImovelEditar" required>
                    <?php foreach ($finalidadeImoveis as $finalidadeImovel): ?>
                    <option value="<?=$finalidadeImovel->id_fi?>"><?=$finalidadeImovel->ds_fi?></option>
                    <?php endforeach; ?>
                  </select>  
                </div>
                <div class="w3-col l4">
                  <label class="w3-margin-top"><b>Preço</b></label>
                  <input class="w3-input" type="number" step="0.00" placeholder="Insira o valor conforme a finalidade" id="precoImovelEditar">
                </div>
              </div>
              </br>
              <div class="w3-row-padding">
                <div class="w3-col l3">
                  <label class="w3-margin-top"><b>CEP</b></label>
                  <input class="w3-input" type="text" placeholder="Insira o CEP"  id="cepImovelEditar"  pattern="(?=.*\d).{8}" title="O CEP deverá conter 8 números" required="">
                </div>
                <div class="w3-col l3">
                  <label class="w3-margin-top" onclick="modalCidades()"><b>Cidade</b> <i class="fa fa-plus-circle" title="Cadastrar Bairro"></i></label>
                  <select class="w3-select w3-border"  id="cidadeImovelEditar" onchange="selectBairro()" required>
                    <?php foreach ($cidades as $cidade): ?>
                    <option value="<?=$cidade->id_cidade?>"><?=$cidade->nome_cidade?></option>
                    <?php endforeach; ?>
                  </select>  
                </div>
                <div class="w3-col l3">
                  <label class="w3-margin-top" onclick="modalBairros()"><b>Bairro</b> <i class="fa fa-plus-circle" title="Cadastrar Bairro"></i></label>
                  <select class="w3-select w3-border"  id="bairroImovelEditar">                
                  </select>  
                </div>
                <div class="w3-col l3">
                  <label class="w3-margin-top"><b>Logradouro</b></label>
                  <select class="w3-select w3-border" id="logradouroImovelEditar" >
                    <?php foreach ($logradouros as $logradouro): ?>
                    <option value="<?=$logradouro->id_logradouro?>"><?=$logradouro->ds_logradouro?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <br>
              <div class="w3-row-padding">
                <div class="w3-col l6">
                  <label class="w3-margin-top"><b>Descrição do Logradouro</b></label>
                  <input class="w3-input" type="text" placeholder="Ex: Floriano Peixoto (não escrever 'Rua', 'Av.' )" id="descricaoLogradouroImovelEditar"  minlength="4" required="">
                </div>
                <div class="w3-col l2">
                  <label class="w3-margin-top"><b>Número</b></label>
                  <input class="w3-input" type="number" placeholder="Numero" id="numeroImovelEditar" minlength="0" required="">    
                </div>
                <div class="w3-col l4">
                  <label class="w3-margin-top"><b>Complemento</b></label>
                  <input class="w3-input" type="text" placeholder="Informe o complemento" id="complementoImovelEditar">
                </div>
              </div>
              <br>
              <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Editar</button>
            </div>
          </form>    
        </div>
      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="recarregarImoveis()" type="button" class="w3-button w3-block w3-gray">Fechar</button>
      </div>
    </div>
  </div>


  <!-- informacoes do Imovel-->

  <div id="modalDetalhesImovel" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:90%">
      <form class="w3-container" method="POST" action="" id="editarDetalhesImovel">
        <div class="w3-section">
          <div class="w3-row-padding">
            <div class="w3-col l6">
              <label><b>Link do Google Maps</b></label>
              <input class="w3-input w3-border" type="text" placeholder="Ex: http://maps.google.com.br/23r3423432432esf" id="url_maps" name="url_maps" minlength="40">
            </div>
            <div class="w3-col l3">
              <label><b>Área do Imóvel</b></label>
              <input class="w3-input w3-border" type="number" step="0.01" placeholder="Área em metros 2" id="area" name="area" min="0" step="10">
            </div>
            <div class="w3-col l3">
              <label><b>Galería de Imagens</b></label>
              <button class="w3-button w3-teal w3-block" onclick="modalGaleria();$('#modalGaleria').css('display','block');" type="button">Acessar</button>
            </div> 
          </div>
          <br>
          <div class="w3-row-padding">
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Banheiros</b></label>
              <input class="w3-input" type="number" id="n_banheiro" name="n_banheiro"  min="0">
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Suites</b></label>
              <input class="w3-input" type="number" id="n_suite" name="n_suite"  min="0">
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Garagem</b></label>
              <input class="w3-input" type="number" id="n_vagas_garagem" name="n_vagas_garagem"  min="0">
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Dormitórios</b></label>
              <input class="w3-input" type="number" id="n_dormitorio" name="n_dormitorio"  min="0">    
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Salas</b></label>
              <input class="w3-input" type="number" id="n_sala" name="n_sala"  min="0">    
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Cozinha</b></label>
              <input class="w3-input" type="number" id="n_cozinha" name="n_cozinha"  min="0">    
            </div>
          </div>
          <br>
          <div class="w3-row-padding">
            <div class="w3-col l12">
              <label class="w3-margin-top"><b>Descrição e Detalhes do Imóvel</b></label>
              <textarea class="w3-input w3-border" style="width:100%" rows="6" placeholder="Informe os detalhes do Imóvel" maxlength="1200" id="detalhes" name="detalhes"></textarea>  
            </div>
          </div>
          <br>
          <input type="hidden" name="idImovelDetalhes" id="idImovelDetalhes">
          <button class="w3-button w3-block w3-teal w3-section w3-padding">Salvar</button>
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="voltarImovelPasso1()" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>
    </div>
  </div>

  <!--Modal seleciona imagem-->

  <div id="modalSelecionarImagem" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:100%;">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('cadastroImovel3').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>
        <div class="w3-container">
          <div class="w3-row-padding w3-center" id="botaoSelecionarImagemImovel">
            <h4>Selecione uma imagem</h4>
          <form method="POST" id="edicaoImgImovel" action="" enctype="multipart/form-data">
            <div style="background-color: #808080; max-width: 100%; height:300px">
              <div class="w3-display-middle">
                <input type="hidden" id="idImovelImagem" name="idImovelImagem">
                <input class="w3-input" type="file" id="imgImovel" name="imgImovel" style="display: none;" accept="image/*">
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="wcrop" name="wcrop" />
                <input type="hidden" id="hcrop" name="hcrop" />
                <input type="hidden" id="wvisualizacao" name="wvisualizacao" />
                <input type="hidden" id="hvisualizacao" name="hvisualizacao" />
                <input type="hidden" id="woriginal" name="woriginal" />
                <input type="hidden" id="horiginal" name="horiginal" />
                <label class="w3-button w3-teal" for="imgImovel">Adicionar Imagem</label>
              </div>
            </div>
          </div>
          <div class="w3-row-padding" id="imagem-box" style="text-align: -webkit-center;display: none;">
            <label class="w3-button w3-teal w3-left" title="Close Modal" for="imgImovel"><i class="fa fa-file-image-o"></i> Trocar Imagem</label>
            <h4>Selecione uma área da foto para recortar</h4>
            <div class="" style="background: #808080">
              <img src="" id="visualizacao_img" class="w3-image" style="max-width:600px;max-height:300px;width:auto;height:auto;"">
            </div>
            <br>
          </div>
          <button id="recortarImagemImovel" class="w3-button w3-block w3-teal w3-section w3-padding">Selecionar</button>
        </form>
        </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="$('#modalSelecionarImagem').css('display','none')" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>

    </div>
  </div>
      
<!--Modal galeria -->
  <div id="modalGaleria" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:100%;">
      <div class="w3-container w3-padding w3-margin-right">
        <div class="w3-right w3-padding-16">
          <button class="w3-button w3-teal" onclick="$('#modalGaleriaImagem').css('display','block');">Adicionar Imagens</button>
        </div>
        <div class="w3-left w3-padding">
          <span style="font-size:28px">Galeria de Imagens</span>
        </div>
      </div>
      <div class="w3-container w3-margin-bottom">
        <div class="w3-row-padding w3-center">
          <div style="max-width: 100%; height:360px;overflow:auto;" class="w3-border">
            <div class="w3-padding-32">
              <div class="w3-row-padding">
                
                <div class="imgGaleriaOutput">
                  
                </div>
                
              </div>
            </div>
          </div>  
        </div>
      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="$('#modalGaleria').css('display','none')" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>
    </div>
  </div>  

  
  <!--Modal de envios de imagens para a galeria -->
  <div id="modalGaleriaImagem" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:100%;">
      <div class="w3-padding-16 w3-center">
        <button class="w3-button w3-teal" id="btnSelImgImovel">Selecionar Imagens</button>
      </div>
      <div class="w3-container w3-margin-bottom">
        <form class="dropzone" action="<?=base_url('admin/galeria-imovel')?>" style="display:" id="myAwesomeDropzone" enctype="multipart/form-data">
          <input type="hidden" name="additionaldata" id="idImovelGaleria" value="0" />
          <input type="hidden" name="referenciaImovel" id="idRefImovelGaleria" value="0" />
        </form>
      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="modalGaleria();$('#modalGaleriaImagem').css('display','none')" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>
    </div>
  </div>

  <!--Modal de cadastro de cidades -->
  <div id="modalCadastroCidade" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:100%">
      <div class="w3-container w3-margin-bottom">
        <form class="w3-padding-16 w3-margin" method="POST" action="" id="inserirCidade">
          <div class="w3-row-padding">
            <div class="w3-col m5">
              <label class="">Estado</label>
              <select class="w3-select w3-border" id="inputCadastroSiglaEstado" required>
                <option value="SP">São Paulo</option>
                <option value="MG">Minas Gerais</option>
              </select>
            </div>
            <div class="w3-col m5">
              <label>Nome da Cidade</label>
              <input type="text" class="w3-input w3-border" id="inputCadastroNomeCidade" required>
            </div>
            <div class="w3-col m2">
              <label style="visibility: hidden;">a</label>
              <button type="input" class="w3-button w3-block w3-teal">Cadastrar</button>
            </div>
          </div>
        </form>
        <div style="height: 45vh;overflow: auto;">
          <form class="w3-padding-16 w3-margin" >
            <table class="w3-table w3-bordered w3-centered">
              <thead class="w3-teal">
                <tr>
                  <th style="width: 40%">Cidade</th>
                  <th style="width: 30%">Estado</th>
                  <th style="width: 30%">Editar / Remover</th>
                </tr>
              </thead>
              <tbody id="listCidades"></tbody>
            </table>
          </form>
        </div>

      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="$('#modalCadastroCidade').css('display','none')" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>
    </div>
  </div>

   <!--Modal de cadastro de cidades -->
  <div id="modalCadastroBairro" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:100%">
      <div class="w3-container w3-margin-bottom">
        <form class="w3-padding-16 w3-margin" method="POST" action="" id="inserirbairro">
          <div class="w3-row-padding">
            <div class="w3-col m5">
              <label class="">Cidade</label>
              <select class="w3-select w3-border" id="tagSelectCidadeCadastrarBairro" required></select>
            </div>
            <div class="w3-col m5">
              <label>Nome do Bairro</label>
              <input type="text" class="w3-input w3-border" id="inputCadastroNomeBairo" required>
            </div>
            <div class="w3-col m2">
              <label style="visibility: hidden;">ava</label>
              <button type="input" class="w3-button w3-block w3-teal">Cadastrar</button>
            </div>
          </div>
        </form>
        <div style="height: 45vh;overflow: auto;">
          <form class="w3-padding-16 w3-margin" >
            <table class="w3-table w3-bordered w3-centered">
              <thead class="w3-teal">
                <tr>
                  <th style="width: 25%">Bairro</th>
                  <th style="width: 30%">
                    <select class="w3-select w3-border w3-teal" style="text-align-last:center;7" onchange="changeSelectCidades()" id="tagSelectCidadesFiltro">
                      <option value="">Filtrar cidade</option>
                    </select>
                  </th>
                  <th style="width: 20%">Estado</th>
                  <th style="width: 25%">Editar / Remover</th>
                </tr>
              </thead>
              <tbody id="listBairros"></tbody>
            </table>
          </form>
        </div>

      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="();$('#modalCadastroBairro').css('display','none')" type="button" class="w3-button w3-block w3-gray">Voltar</button>
      </div>
    </div>
  </div>

