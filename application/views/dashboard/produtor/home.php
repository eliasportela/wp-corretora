<style type="text/css">
h6{
  margin: 3px 0;
}
.w3-centered tr td {
  padding: 13px;
}
.w3-table td{
  vertical-align: middle;
}

</style>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="w3-container w3-cell-row" style="padding-top:22px">
    <span class="w3-xlarge"><i class="fa fa fa-user fa-fw"></i><b> Produtor</b></span>
    <a class="w3-button w3-black w3-right" href="<?=base_url('admin/contatos')?>">Limpar Filtros</a>
    <a class="w3-button w3-black w3-right" style="margin-right: 12px" href="#" onclick="location.reload();">Atualizar página</a>
  </header>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-container w3-card w3-white w3-padding w3-padding-32">
        <form method="GET" action="<?=base_url("admin/contatos")?>">
          <div class="w3-row-padding w3-center">
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Nome</b></label>
              <input type="text" class="w3-input w3-border" name="">
            </div>
            <div class="w3-col l4">
              
            </div>
            <div class="w3-col l4">
              
            </div>
            <div class="w3-col l2">
              <label class="w3-margin-top"><b>Pesquisar</b></label>
              <button class="w3-button w3-block w3-black" id="inserir_cidade"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
      
      <br>
      <div class="w3-responsive w3-card">
        <div class="w3-white" style="height: 45vh;overflow: auto;">
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th style="width:8%"><i class="fa fa-eye"></i></th>
                <th>Data</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
              </tr>
            </thead>
            <tbody>
              <tr></tr>
            </tbody>
          </table>
        </div>
        <div class="container-btn-material">
          <button onclick="window.location.href='<?=base_url("admin/produtor/cadastro")?>'" class="w3-button w3-circle w3-black btn-material"><i class="fa fa-plus"></i></button>  
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/produtor/main.js');?>"></script>