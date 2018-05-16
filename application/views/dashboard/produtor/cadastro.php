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
    <span class="w3-xlarge"><i class="fa fa fa-user fa-fw"></i><b> Cadastro de Produtor</b></span>
  </header>
  <div style="margin: 0 16px">
    <div class="w3-padding" style="margin:0 -16px">
      <div style="margin: 0 10px">
        <a class="w3-button w3-black" href="<?=base_url('admin/produtor')?>"><i class="fa fa-chevron-left"></i> Voltar</a>
        <a class="w3-button w3-black" href="<?=base_url('admin/produtor')?>"><i class="fa fa-eraser"></i> Limpar Campos</a>
        <a class="w3-button w3-black w3-right" href="<?=base_url('admin/produtor')?>"><i class="fa fa-check"></i> Salvar</a>
      </div>
      <br>
      <div class="w3-responsive w3-card w3-white w3-padding-32">
        <div class="w3-row-padding">
          <div class="w3-col m12">Dados Pessoais</div>
          <div class="w3-col m4 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Nome" name="">
          </div>
          <div class="w3-col m4 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="E-mail" name="">
          </div>
          <div class="w3-col m4 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Telefone" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="number" class="w3-input w3-border" placeholder="CPF" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="number" class="w3-input w3-border" placeholder="CNPJ" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="number" class="w3-input w3-border" placeholder="Inscrição Estadual" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="number" class="w3-input w3-border" placeholder="Qtd Membros da família" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <label>Data Nascimento</label>
            <input type="date" class="w3-input w3-border" placeholder="Data Nascimento" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <label>Escolaridade</label>
            <select class="w3-select w3-white w3-border">
              <option>Selecione</option>
            </select>
          </div>
          <div class="w3-col m3 w3-margin-top">
            <label>Foto</label>
            <label class="w3-button w3-black w3-block" for="foto">Enviar Foto</label>
            <input type="file" id="foto" class="w3-input w3-border" placeholder="Foto Cliente" name="" style="display: none;">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <label>Comprovante Bancário</label>
            <label class="w3-button w3-black w3-block" for="comprovante">Enviar Comprovante</label>
            <input type="file" id="comprovante" class="w3-input w3-border" placeholder="Foto Cliente" name="" style="display: none;">
          </div>

          <div class="w3-col m12 w3-margin-top">Correspondência</div>
          
          <div class="w3-col m4 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Endereço" name="">
          </div>
          <div class="w3-col m2 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Número" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Bairro" name="">
          </div>
          <div class="w3-col m3 w3-margin-top">
            <input type="text" class="w3-input w3-border" placeholder="Complemento" name="">
          </div>
          <div class="w3-col m4 w3-margin-top">
            <label>Estado</label>
            <select class="w3-select w3-border">
              <option>Selecione</option>
              <?php foreach ($estados as $estado):?>
                <option value="<?=$estado->id_estado?>" onchange="getCidades(<?=$estado->id_estado?>)"><?=$estado->nome_estado?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="w3-col m4 w3-margin-top">
            <label>Cidade</label>
            <select class="w3-select w3-border" disabled>
              <option>Selecione o Estado</option>
            </select>
          </div>
          <div class="w3-col m4 w3-margin-top">
            <label>CEP</label>
            <input type="text" class="w3-input w3-border" placeholder="CEP" name="">
          </div>
        </div>
      </div>

      <br>
      <div style="margin-bottom: 20px">
        <span class="w3-large w3-padding">
          <i class="fa fa-building"></i>
          Propriedades
        </span>
      </div>
      <div class="w3-responsive w3-card w3-margin-bottom">
        <div class="w3-white" style="height: 30vh;overflow: auto;">
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th>Data</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Opções</th>
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

<div id="cadastroPropriedade" class="w3-modal" style="padding-top: 50px">
  <div class="w3-modal-content w3-card-4 w3-animate-left">
    <form class="w3-container" method="POST" action="" id="inserirImovel1">
      <div class="w3-container w3-padding-16 w3-large w3-border-bottom">
        <i class="fa fa-building"></i> Cadastro de Propriedade  
      </div>
      <div class="w3-section" style="height: 65vh;overflow: auto;">
        <div class="w3-row-padding">
          <div class="w3-col l2 w3-margin-top">
            <label>Tipo</label>
            <select class="w3-select w3-border">
              <option></option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Nome da Propriedade</label>
            <input type="text" class="w3-input w3-border" placeholder="Nome da Propriedade">
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Contatos na Propriedade</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: Daniel,Joaquim">
          </div>
          <div class="w3-col l2 w3-margin-top">
            <label>Enviar Foto</label>
            <button class="w3-button w3-block w3-black">Selecionar</button>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-col l4 w3-margin-top">
            <label>Endereço</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: Rodovia Ronan Rocha">
          </div>
          <div class="w3-col l2 w3-margin-top">
            <label>Número/KM</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: KM 200">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Estado</label>
            <select class="w3-select w3-form">
              <option>Selecione</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Cidade</label>
            <select class="w3-input w3-border" disabled>
              <option>Selecione o estado</option>
            </select>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-col l3 w3-margin-top">
            <label>Latitude</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: 1.4324">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Longitude</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: 1.3233">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Altitude (m)</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: 1.323">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Total (m2)</label>
            <input type="text" class="w3-input w3-border" placeholder="">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Plantada (m2)</label>
            <input type="text" class="w3-input w3-border" placeholder="">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Irrigada (m2)</label>
            <input type="text" class="w3-input w3-border" placeholder="">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Arrendada (m2)</label>
            <input type="text" class="w3-input w3-border" placeholder="">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Prod. media Café (ha)</label>
            <input type="text" class="w3-input w3-border" placeholder="">
          </div>
          <div class="w3-col l12 w3-margin-top">
            <label>Observações</label>
            <textarea class="w3-input w3-border"></textarea>
          </div>
          <div class="w3-col l12 w3-margin-top">
            <b>Possui*</b>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Eletricidade?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Propriedade Familiar?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Análise de solo/folha?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Adubação Orgânica?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Fertilização?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Análise camada expessura?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Sistemas de Tulhas?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Proteção Chuva?</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Tipo de Terreiro</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Tipo de Processamento</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Processamento via úmido</label>
            <select class="w3-select w3-border">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
        </div>
        <div class="w3-container">
          <div class="w3-padding-16">
            <span class="w3-large"><b>Safra Geral</b></span>
          </div>
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th>Ano</th>
                <th>Quantidade</th>
                <th>Opções</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2018 / 2019</td>
                <td>600</td>
                <td>
                  <button class="w3-button w3-black w3-round">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="w3-button w3-red w3-round">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </td> 
              </tr>
              <tr>
                <td>
                  <input type="number" value="2018" class="w3-input w3-border" name="" min="1900" max="2099" style="width: 45%;display: inline-block">
                  <input type="number" value="2019" class="w3-input w3-border w3-margin-top" name="" min="1900" max="2099" style="width: 45%;display: inline-block">
                </td>
                <td>
                  <input type="number" class="w3-input w3-border" placeholder="Quantidade de sacas" name="">
                </td>
                <td>
                  <button class="w3-button w3-border w3-round">
                    <i class="fa fa-times"></i>
                  </button>
                  <button class="w3-button w3-black w3-round">
                    <i class="fa fa-check"></i>
                  </button>
                </td> 
              </tr>
            </tbody>
          </table>
          <button class="w3-button w3-gray w3-right w3-block" style="margin:12px 0"><i class="fa fa-plus"></i> Adicionar safra</button>
        </div>
        <div class="w3-container w3-margin-bottom">
          <div class="w3-padding-16">
            <span class="w3-large"><b>Safras / Cafés</b></span>
          </div>
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th>Ano</th>
                <th>Variedade</th>
                <th>Área Plantanda</th>
                <th>Prod. Média</th>
                <th>Opções</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2018 /2019</td>
                <td>Café Arábica</td>
                <td>200 m2</td>
                <td>600</td>
                <td>
                  <button class="w3-button w3-black w3-round">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="w3-button w3-red w3-round">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="number" value="2018" class="w3-input w3-border" name="" min="1900" max="2099" style="width: 45%;display: inline-block;%">
                  <input type="number" value="2019" class="w3-input w3-border w3-margin-top" name="" min="1900" max="2099" style="width: 45%;display: inline-block;">
                </td>
                <td>
                  <select class="w3-select w3-border">
                    <option value="2">Café Arábica</option>
                    <option value="1">Outros</option>
                  </select>
                </td>
                <td>
                  <input type="number" class="w3-input w3-border" placeholder="Área" name="">
                </td>
                <td>
                  <input type="number" class="w3-input w3-border" placeholder="Média de Sacas" name="">
                </td>
                <td>
                  <button class="w3-button w3-border w3-round">
                    <i class="fa fa-times"></i>
                  </button>
                  <button class="w3-button w3-black w3-round">
                    <i class="fa fa-check"></i>
                  </button>
                </td> 
              </tr>
            </tbody>
          </table>
          <button class="w3-button w3-gray w3-right w3-block" style="margin:12px 0"><i class="fa fa-plus"></i> Adicionar safra</button>
        </div>
      </div>
    </form>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="$('#cadastroPropriedade').css('display','none')" type="button" class="w3-button w3-gray" style="width: 150px">
        <i class="fa fa-times"></i>
        Fechar
      </button>
      <button onclick="$('#cadastroPropriedade').css('display','none')" type="button" class="w3-button w3-black w3-right" style="width: 150px">
        <i class="fa fa-check"></i>
        Salvar
      </button>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/produtor/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/commons/cidade.js');?>"></script>

<script type="text/javascript">
  //$("#cadastroPropriedade").css("display","block")
</script>