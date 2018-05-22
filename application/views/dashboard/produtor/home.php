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
    <button onclick="window.location.href='<?=base_url("admin/produtor/cadastro")?>'" class="w3-button w3-round w3-black w3-right"><i class="fa fa-plus"></i> Cadastrar Produtor</button>  
    <button class="w3-button w3-black w3-right" style="margin-right: 12px" onclick="getProdutores(1)">Limpar Filtros</button>
  </header>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-container w3-card w3-white w3-padding w3-padding-32">
        <form method="GET" action="<?=base_url("admin/contatos")?>">
          <div class="w3-row-padding w3-center">
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>Nome</b></label>
              <input type="text" class="w3-input w3-border" placeholder="Informe o Nome" name="">
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>Tipo</b></label>
              <select class="w3-select w3-border w3-white">
                <?php foreach ($t_pessoas as $p) { ?>
                  <option value="<?=$p->id_tipo_pessoa?>"><?=$p->nome_tipo_pessoa?></option>
                <?php } ?>
              </select>
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>Cidade</b></label>
              <input type="text" class="w3-input w3-border" placeholder="Informe a Cidade" name="">
            </div>
            <div class="w3-col l3">
              <label class="w3-margin-top"><b>Pesquisar</b></label>
              <button class="w3-button w3-block w3-black" onclick="getProdutores(1)"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
      
      <br>
      <div class="w3-responsive w3-card">
        <div class="w3-white">
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th>Nome</th>
                <th>Tipo</th>
                <th>E-mail</th>
                <th>Cidade</th>
                <th>Visualizar</th>
              </tr>
            </thead>
            <tbody id="produtores">
              <tr></tr>
            </tbody>
          </table>
        </div>
        <div class="w3-bar w3-border">
          <button onclick="pagination(0)" id="btnanterior" class="w3-button">&#10094; Anterior</button>
          <button onclick="pagination(1)" id="btnproximo" class="w3-button w3-right">Próximo &#10095;</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/produtor/main.js');?>"></script>