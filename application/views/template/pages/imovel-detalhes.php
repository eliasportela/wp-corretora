<!-- Sidebar/menu -->
<div class="w3-row-padding">
  <div class="w3-col l3 w3-margin-top w3-hide-small">
    <div class="w3-container w3-card-2 w3-white w3-padding w3-padding-16">
      <h3 class="w3-text-pink">Buscar Imóveis</h3>
      <p>Ache o imóvel ideal para você</p>
      <hr>
      <form method="GET" action="<?=base_url("imoveis")?>">
        <div class="w3-row-padding">
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Finalidade</b></label>
            <select class="w3-select w3-border" name="finalidade" id="finalidadeImovel" onchange="selectPreco()">
              <?php foreach ($fis as $finalidadeImovel): ?>
              <option value="<?=$finalidadeImovel->id_fi?>"><?=$finalidadeImovel->ds_fi?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Imóvel</b></label>
            <select class="w3-select w3-border" name="tipo">
              <?php foreach ($tis as $tipoImovel): ?>
              <option value="<?=$tipoImovel->id_tipo?>"><?=$tipoImovel->ds_tipo?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="w3-col l12 m6 w3-margin-top">
            <label><b>Cidade</b></label>
            <select class="w3-select w3-border" name="cidade" id="cidadeImovel" onchange="selectBairro()">
              <?php foreach ($cidades as $cidade): ?>
              <option value="<?=$cidade->id_cidade?>"><?=$cidade->nome_cidade?></option>
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
            
  <?php if ($imovel): ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-col l6 w3-margin-top">
    <div class="w3-card-2 w3-white w3-padding w3-padding-16">
      <!-- Slideshow Header -->
      <div class="w3-container" id="apartment">
        <h3 class="w3-text-pink"><strong><?= $imovel->ds_tipo . ' para ' .$imovel->ds_fi . ' em ' .$imovel->nome_cidade .' - '.$imovel->sigla_estado ?></strong></h3>
        <p class="w3-text-pink"><?='Referência: ' .$imovel->referencia_imovel?></p>
        <hr>
        <h4 class="w3-text-pink"><strong>Galería de Imagens</strong></h4>
        <div class="w3-display-container w3-black">
          <div style="height: 400px;max-width: 500%">
          <?php 
          if($galerias):
          foreach ($galerias as $galeria): ?>
            <img class="mySlides w3-image w3-display-middle" src="<?=base_url('assets/img/imoveis/galeria/'.$imovel->referencia_imovel.'/'.$galeria->name_file)?>" style="max-width:100%;max-height:400px;margin:auto;">
          <?php endforeach ?>
          <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-middle" style="width:100%">
            <div class="w3-left w3-button w3-hover-opacity" onclick="plusDivs(-1)" style="cursor:pointer;font-size: 39px">&#10094;</div>
            <div class="w3-right w3-button w3-hover-opacity" onclick="plusDivs(1)" style="cursor:pointer;font-size: 39px">&#10095;</div>
          </div>
          <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
          <?php $cont = 1; 
            foreach ($galerias as $galeria): ?>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" style="height:18px;width:18px;padding:0" onclick="currentDiv(<?=$cont?>)"></span>
            <?php $cont++; endforeach; ?> 
            <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <div class="w3-container w3-padding ">
        <hr>
        <h4 class="w3-text-pink"><strong>Detalhes</strong></h4>
        <div class="w3-row w3-large">
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-bed"></i> <span class="w3-hide-small">Dormitório:</span> <?php if($imovel->n_dormitorio): echo $imovel->n_dormitorio; else: echo 'N/D'; endif;?></p>
            <p><i class="fa fa-fw fa-shower"></i> <span class="w3-hide-small">Banheiro:</span> <?php if($imovel->n_banheiro): echo $imovel->n_banheiro; else: echo 'N/D'; endif; ?></p>
            <p><i class="fa fa-fw fa-car"></i> <span class="w3-hide-small">Garagem:</span> <?php if($imovel->n_vagas_garagem): echo $imovel->n_vagas_garagem; else: echo 'N/D'; endif;?></p>
            <p><i class="fa fa-fw fa-tv"></i> <span class="w3-hide-small">Salas:</span> <?php if($imovel->n_sala): echo $imovel->n_sala; else: echo 'N/D'; endif; ?></p>
          </div>
          <div class="w3-col s6">
            <p><i class="fa fa-fw fa-cutlery"></i> <span class="w3-hide-small">Cozinha:</span> <?php if($imovel->n_cozinha): echo $imovel->n_cozinha; else: echo 'N/D'; endif; ?></p>
            <p><i class="fa fa-fw fa-bath"></i> <span class="w3-hide-small">Suite:</span> <?php if($imovel->n_suite): echo $imovel->n_suite; else: echo 'N/D'; endif; ?></p>
            <p><i class="fa fa-fw fa-home"></i> <span class="w3-hide-small">Área:</span> <?php if($imovel->area): echo $imovel->area . ' m2'; else: echo 'N/D'; endif; ?></p>
            <p><i class="fa fw fa-usd"></i> <span class="w3-hide-small">Preço:</span> R$ <?php if($imovel->preco_imovel): echo $imovel->preco_imovel; else: echo 'N/D'; endif; ?></p>
          </div>
          <div class="w3-col s12">
            <p><i class="fa fa-fw fa-map-marker"></i> <?php if($imovel->ds_logradouro): echo $imovel->logradouro .' '.$imovel->ds_logradouro.', '.$imovel->numero.' - '.$imovel->nome_bairro.' - '.$imovel->nome_cidade.' - '.$imovel->sigla_estado; endif;?></p>  
          </div>
        </div>
        <hr>
        <h4 class="w3-text-pink"><strong>Informações</strong></h4>
        <p><?php if($imovel->detalhes): echo $imovel->detalhes; else: echo 'Não disponível'; endif;?></p>
      </div>
    </div>

  </div>

  <div class="w3-col l3 w3-margin-top">
    <div class="w3-card-2 w3-white">
      <div class="w3-container w3-display-container w3-padding-16">
        <h4 class="w3-opacity w3-text-pink" ><b>Gostou desse Imóvel?</b></h4>
        <p>Preencha o formulário abaixo e entraremos em contato.</p>
        <hr>
        <form method="POST" action="" id="enviarContato">
          <p><label><i class="fa fa-user"></i> Nome</label>
          <input class="w3-input w3-border" type="text" placeholder="Nome completo" name="nome" required>          
          </p>
          <p><label><i class="fa fa-phone"></i> Telefone</label>
          <input class="w3-input w3-border" type="tel" placeholder="Telefone" name="telefone" required>         
          </p>
          <p><label><i class="fa fa-envelope"></i> E-mail</label>
          <input class="w3-input w3-border" type="email" placeholder="Seu e-mail" name="email">              
          </p>
          <p><label><i class="fa fa-comment"></i> Mensagem</label>
          <textarea class="w3-input w3-border" rows="4" style="max-width: 100%" placeholder="Digite sua Mensagem" name="mensagem"></textarea>
          </p>
          <input type="hidden" name="imovel" value="<?=$imovel->referencia_imovel?>">
          <p>
            <button class="w3-button w3-block w3-pink" type="submit"><i class="fa fa-send w3-margin-right"></i> Enviar</button>
          </p>
        </form>
      </div>
      <hr>
      <div class="w3-container w3-padding">
        <h4 class="w3-opacity w3-text-pink"><b>Fale Conosco</b></h4>
        <p>Se preferir entre em contato</p>
        <p><i class="fa fa-envelope-o"></i> contato@spinelliimoveis.com</p>
        <p><i class="fa fa-phone"></i> (16) 4432-2342<br></p>
      </div>
    </div>
  </div>

<?php else: ?>
  <div class="w3-col l9 w3-margin-top">
    <div class="w3-display-container w3-card-2 w3-white w3-padding w3-padding-16" style="height: 500px;">
      <div class="w3-display-middle w3-center">
        <h1><i class="fa fa-frown-o"></i></h1>
        <h3>Este imóvel não está disponível</h3>
      </div>
    </div>
  </div>
<?php endif; ?>

</div>

<!--Script da pagina-->
<script src="<?=base_url('assets/js/site-principal/slide-galeria.js')?>"></script>
<script src="<?=base_url('assets/js/site-principal/filtro-imoveis.js')?>"></script>
<script src="<?=base_url('assets/js/site-principal/enviar-pedido.js')?>"></script>