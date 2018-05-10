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
            <i class="fa fa-user-plus w3-xxxlarge"></i>
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
        <a href="#">
          <div class="w3-container w3-teal w3-padding-16 w3-center">
            <i class="fa fa-share-alt w3-xxxlarge"></i>
            <div class="w3-clear"></div>
            <h4>Cidades</h4>
          </div>
        </a>
      </div>
      <div class="w3-quarter">
        <a href="admin/usuarios" style="">
          <div class="w3-container w3-orange w3-text-white w3-padding-16 w3-center">
            <i class="fa fa-user-times w3-xxxlarge"></i>
            <div class="w3-clear"></div>
            <h4>Bairros</h4>
          </div>
        </a>
      </div>
    </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-container w3-card w3-white w3-padding w3-padding-32">
          <form method="GET" action="<?=base_url("admin/site")?>">
            <div class="w3-row-padding w3-center">
              <div class="w3-col l6">
                <label class="w3-margin-top"><b>Pagina</b></label>
                <select class="w3-select w3-border"  name="pagina">
                  <?php foreach ($paginas as $pagina): ?>
                  <option value="<?=$pagina->id_pagina?>" <?php if($pagina->id_pagina == $idpagina): echo "selected "; endif;?>><?=$pagina->ds_pagina?></option>
                  <?php endforeach; ?>
                </select>  
              </div>
              <div class="w3-col l6">
                <label class="w3-margin-top"><b>Pesquisar</b></label>
                <button class="w3-button w3-block w3-teal" id="inserir_cidade"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        
        <br>
        <div class="w3-responsive w3-card">
          <div class="w3-white">
            <table class="w3-table w3-hoverable w3-bordered w3-centered">
              <tr class="w3-teal">
                <th>ID</th>
                <th>Descrição</th>
                <th>Título</th>
                <th>Subtítulo</th>
              </tr>
            <?php 
            if($conteudos == FALSE): echo '';?>
            <?php else:
            foreach ($conteudos as $conteudo): ?>
            <tr onclick="editarConteudoSite('<?=$conteudo->id_conteudo?>')">
              <td><?=$conteudo->id_conteudo?></td>
              <td><?=$conteudo->ds_conteudo?></td>
              <td><?=$conteudo->titulo_conteudo?></td>
              <td><?=$conteudo->subtitulo_conteudo?></td>
            </tr>
            <?php endforeach; endif; ?>
            </table>
            <p class="w3-right w3-padding"> </p>
          </div>
        </div>

    </div>
  </div>
</div>

  <div id="modalEditarConteudo" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:800px">
      <input type="hidden" id="idConteudo" value="">
      <div class="w3-container"><br>
        <h3 class="w3-center">Conteúdos</h3>
        <form action="" method="POST" id="formEditarConteudo">
          <div class="w3-padding" style="max-height: 300px; overflow: auto;" id="textoConteudo">
            <div class="textoConteudoOutput">
              
            </div>
          </div>
          <br>
          <button class="w3-button w3-block w3-teal">Editar</button>
        </form>
      </div><br>        
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="$('#modalEditarConteudo').css('display','none')" type="button" class="w3-button w3-block w3-gray">Fechar</button>
      </div>
    </div>
  </div>

  <div id="modalEditarDestaque" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:95%">
      <input type="hidden" id="idConteudo" value="">
      <div class="w3-container"><br>
        <h3 class="w3-center">Imóveis em Destaque</h3>
        <form action="" method="POST" id="formEditarConteudo">
          <div class="w3-row-padding" style="max-height: 300px; overflow: auto;" id="textoConteudo">
            <div class="w3-quarter">
              <label>Imóvel 1</label>
              <input type="text" class="w3-input w3-border" placeholder="Referencia do Imovel">
            </div>
            <div class="w3-quarter">
              <label>Imóvel 2</label>
              <input type="text" class="w3-input w3-border" placeholder="Referencia do Imovel">
            </div>
            <div class="w3-quarter">
              <label>Imóvel 3</label>
              <input type="text" class="w3-input w3-border" placeholder="Referencia do Imovel">
            </div>
            <div class="w3-quarter">
              <label>Imóvel 4</label>
              <input type="text" class="w3-input w3-border" placeholder="Referencia do Imovel">
            </div>
          </div>
          <br>
          <div class="w3-right w3-padding">
            <p>Deixe em branco para ser utilizado o imóvel mais recente</p>
          </div>        
          <button class="w3-button w3-block w3-teal">Editar</button>
        </form>
      </div>
      <br>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="$('#modalEditarDestaque').css('display','none')" type="button" class="w3-button w3-block w3-gray">Fechar</button>
      </div>
    </div>
  </div>

