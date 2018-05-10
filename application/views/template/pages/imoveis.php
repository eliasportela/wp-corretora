<div class="w3-row-padding">
  <div class="w3-col l3 w3-margin-top w3-hide-small">
    <div class="w3-container w3-card-2 w3-white w3-padding w3-padding-16">
      <h3 class="w3-text-pink">Buscar Imóveis</h3>
      <p>Ache o imóvel ideal para você</p>
      <hr>
      <form method="GET" action="<?=base_url("imoveis")?>">
        <div class="w3-row">
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Finalidade</b></label>
            <select class="w3-select w3-border" name="finalidade" id="finalidadeImovel" onchange="selectPreco()">
              <?php foreach ($fis as $finalidadeImovel): ?>
              <option value="<?=$finalidadeImovel->id_fi?>" <?php if ($finalidadeImovel->id_fi == $finalidadePesquisa): echo "selected"; endif;?>><?=$finalidadeImovel->ds_fi?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Imóvel</b></label>
            <select class="w3-select w3-border" name="tipo">
              <?php foreach ($tis as $tipoImovel): ?>
              <option value="<?=$tipoImovel->id_tipo?>" <?php if ($tipoImovel->id_tipo == $tipoPesquisa): echo "selected"; endif;?>><?=$tipoImovel->ds_tipo?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Cidade</b></label>
            <select class="w3-select w3-border" name="cidade" id="cidadeImovel" onchange="selectBairro()">
              <?php foreach ($cidades as $cidade): ?>
              <option value="<?=$cidade->id_cidade?>"<?php if ($cidade->id_cidade == $cidadePesquisa): echo "selected"; endif;?>><?=$cidade->nome_cidade?></option>
              <?php endforeach; ?>
            </select>  
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Bairro</b></label>
            <select class="w3-select w3-border" name="bairro" id="bairroImovel" disabled>
              <option value="0">Selecione</option>
            </select>
          </div>      
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Faixa de Preço</b></label>
            <select class="w3-select w3-border"  name="preco" id="precoImovel" disabled>
              <option value="0">Selecione a Finalidade</option>
            </select>  
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Dormitórios</b></label>
            <select class="w3-input w3-border" name="dormitorio">
              <option value="0">Selecione</option>
              <option value="1">1 Dormitório</option>
              <option value="2">2 Dormitórios</option>
              <option value="3">3 Dormitórios</option>
              <option value="4">Acima de 4 Dormitórios</option>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Banheiros</b></label>
            <select class="w3-input w3-border" name="banheiro">
              <option value="0">Selecione</option>
              <option value="1">1 Banheiro</option>
              <option value="2">2 Banheiros</option>
              <option value="3">Acima de 3 Banheiros</option>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Vagas na Garagem</b></label>
            <select class="w3-input w3-border" name="garagem">
              <option value="0">Selecione</option>
              <option value="1">1 Vaga</option>
              <option value="2">2 Vagas</option>
              <option value="3">Acima de 3 Vagas</option>
            </select>
          </div>
          <div class="w3-col m12 w3-margin-top">
            <label><b>Pesquisar</b></label>
            <button class="w3-button w3-block w3-pink" id="inserir_cidade"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      <br>
    </div>
  </div>
  <div class="w3-col l9 w3-margin-top">
    <div class="w3-container w3-card-2 w3-white w3-padding w3-padding-16">
      <h3 class="w3-padding-16 w3-center w3-text-pink">Imóveis</h3>
      <hr>
      <?php if ($imoveis): ?>
      <?php foreach ($imoveis as $imovel): ?>
      <div class="w3-col l3 m6">
        <div class="w3-padding">
          <?php  
          // define a rota amigavel
          $ref = strtolower($imovel->referencia_imovel);
          $tipo = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($imovel->ds_tipo))));
          $finalidade = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($imovel->ds_fi))));
          $cidade = str_replace(" ","-",strtolower(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($imovel->nome_cidade))));
          $rota = $ref.'/'.$tipo.'-'.$finalidade.'-'.$cidade;
          ?>
          <a href="<?=base_url('imovel/'.$rota)?>">
          <div class="w3-display-container">
            <div class="w3-display-topleft w3-pink w3-padding">R$ <?=number_format($imovel->preco_imovel,2,",",".");?></div>
            <img src="<?=base_url('assets/img/imoveis/'.$imovel->img_imovel)?>" alt="House" class="w3-hover-opacity" style="width:100%">
            <p class="w3-center w3-opacity"><?=$imovel->ds_tipo?> p/ <?=$imovel->ds_fi?><br><?=$imovel->nome_cidade?> - <?=$imovel->sigla_estado?></p>
            <div class="w3-pink w3-padding">
              <div class="w3-row w3-center">
                <div class="w3-col s4">
                  <i class="fa fa-bed"></i> <?php if($imovel->n_dormitorio < 1): echo '<small>N/D</small>'; else: echo $imovel->n_dormitorio; endif;?>
                </div>
                <div class="w3-col s4">
                  <i class="fa fa-bath"></i> <?php if($imovel->n_banheiro < 1): echo '<small>N/D</small>'; else: echo $imovel->n_banheiro; endif;?>
                </div>
                <div class="w3-col s4">
                  <i class="fa fa-car"></i> <?php if($imovel->n_vagas_garagem < 1): echo '<small>N/D</small>'; else: echo $imovel->n_vagas_garagem; endif;?>
                </div>
              </div>
            </div>
          </div>
          </a>
          <hr>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="w3-display-container" style="height: 200px;">
        <div class="w3-display-middle w3-center">
          <h1><i class="fa fa-frown-o"></i></h1>
          <p>Não foi possivel localizar o imóvel!. Por favor redefina a pesquisa.</p>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
</div>


<!--Script da pagina-->
<script src="<?=base_url('assets/js/site-principal/filtro-imoveis.js')?>"></script>