<style type="text/css">
  h6{
    margin: 3px 0;
  }
  .w3-centered tr td {
    padding: 13px;
}
</style>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="w3-container w3-cell-row" style="padding-top:22px">
    <span><i class="fa fa fa-diamond fa-fw"></i><b> Contato</b></span>
    <a class="w3-button w3-teal w3-right" href="<?=base_url('admin/pedidos')?>">Limpar Filtros</a>
  </header>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-container w3-card w3-white w3-padding w3-padding-32">
          <form method="GET" action="<?=base_url("admin/pedidos")?>">
            <div class="w3-row-padding w3-center">
              <div class="w3-col l3">
                <label class="w3-margin-top"><b>Visualização</b></label>
                <select class="w3-select w3-border" name="visualizado">
                  <option value="0">Novos</option>
                  <option value="1" <?php if($optionVisualizado == 1): echo "selected"; endif; ?>>Todos os Contatos</option>
                </select>
              </div>
              <div class="w3-col l3">
                <label class="w3-margin-top"><b>Contato</b></label>
                <select class="w3-select w3-border" name="finalizado">
                  <option value="0">Abertos</option>
                  <option value="1" <?php if($optionFinalizado == 1): echo "selected"; endif; ?>>Finalizados</option>
                </select>
              </div>
              <div class="w3-col l3">
                <label class="w3-margin-top"><b>Data</b></label>
                <input type="date" name="data" class="w3-input w3-border" value="<?=$optionData?>">
              </div>
              <div class="w3-col l3">
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
                <th>Imóvel</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data</th>
              </tr>
            <?php 
            if($pedidos == FALSE): echo '';?>
            <?php else:
            foreach ($pedidos as $pedido): ?>
            <tr onclick="conteudoPedido('<?=$pedido->id_contato?>')" style="cursor: pointer;">
              <td><?=$pedido->referencia_imovel?></td>
              <td><?=$pedido->nome_contato?></td>
              <td><?=$pedido->email?></td>
              <td class="w3-opacity"><?=$pedido->data_contato.' às '.$pedido->hora_contato?></td>
            </tr>
            <?php endforeach; endif; ?>
            </table>
          </div>
          <p class="w3-right w3-padding"> </p>
        </div>
    </div>
  </div>
</div>

  <div id="modalConteudoPedido" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-left" style="max-width:800px">
      <div class="w3-container"><br>
        <span class="w3-large">Solicitação de Contato 00<span id="idContato"></span></span> 
        <span class="w3-right"><span id="dataContato"></span> às <span id="horaContato"></span></span>
        <hr>
        <div class="w3-row-padding">
          <div class="w3-col l9">
            <input type="hidden" id="idContatoImovel">
            <input type="hidden" id="contatoFinalizado">
            <h6><b>De:</b> <span id="nomeContato"></span></h6>
            <h6><b>E-mail:</b> <span id="emailContato"></span></h6>
            <h6><b>Assunto:</b> <span id="assuntoContato"></span></h6>
            <h6><b>Telefone:</b> <span id="telefoneContato"></span></h6>
            <h6><b>Imóvel:</b> <span id="referenciaImovelContato"></span></h6>
          </div>
          <div class="w3-col l3">
            <a id="linkImovelContato" href="" target="_blank">
              <img src="" class="w3-image" id="imgImovelContato">
              <button class="w3-button w3-teal w3-block">Acessar Imóvel</button>
            </a>
          </div>
          <div class="w3-col l12">
          <p class="w3-border w3-padding w3-padding-16" style="height: 20vh">
              <span id="msgContato"></span>
          </p>
        </div>
        </div>
      </div><br>        
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="location.reload();" type="button" class="w3-button w3-gray w3-left">Fechar</button>
        <a href="#" onclick="contatoFinalizar(2)" id="btnReabrir" type="button" class="w3-button w3-teal w3-right">Reabrir Contato</a>
        <a href="#" onclick="contatoFinalizar(1)" id="btnFinalizar" type="button" class="w3-button w3-teal w3-right">Finalizar Contato</a>
      </div>
    </div>
  </div>
  
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/pedido/main.js');?>"></script>