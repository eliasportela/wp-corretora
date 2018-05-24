<div id="modalPropriedade" class="w3-modal" style="padding: 60px 0">
  <div class="w3-modal-content modal w3-card-4 w3-animate-left">
    <form method="POST" action="" id="inserirPropriedade">
      <div class="w3-container w3-padding-16 w3-large w3-border-bottom">
        <i class="fa fa-building"></i> Cadastro de Propriedade  
        <span class="w3-right" onclick="closeModalPropriedade()" style="cursor: pointer;"><i class="fa fa-times"></i></span>
      </div>
      <div class="w3-section" >
        <div class="w3-row-padding">
          <div class="w3-col l4 w3-margin-top">
            <label>Tipo</label>
            <select class="w3-select w3-border w3-white" name="id_tipo_propriedade">
              <option>Fazenda</option>
              <option>Sítio</option>
              <option>Chácara</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Nome da Propriedade</label>
            <input type="text" class="w3-input w3-border" placeholder="Nome da Propriedade" name="nome_propriedade" required>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>CNPJ</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: 123.121.0001/01" name="cnpj">
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Contatos na Propriedade</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: Daniel, Joaquim" name="telefone">
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Telefone</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: (16) 3531-1215" name="contato">
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Enviar Foto</label>
            <input type="file" class="w3-input" name="propriedade_file">
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-col l4 w3-margin-top">
            <label>Logradouro</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: Rodovia Ronan Rocha" name="logradouro" required>
          </div>
          <div class="w3-col l2 w3-margin-top">
            <label>Número/KM</label>
            <input type="text" class="w3-input w3-border" placeholder="Ex: KM 200" name="numero_km">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Estado</label>
            <select class="w3-select w3-border" onchange="getCidades('selectPropEstados','selectPropCidades')" id="selectPropEstados">
              <option value="0">Selecione</option>
              <?php foreach ($estados as $estado):?>
                <option value="<?=$estado->id_estado?>"><?=$estado->nome_estado?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Cidade</label>
            <select class="w3-input w3-border" id="selectPropCidades" name="id_cidade" required disabled>
              <option>Selecione o estado</option>
            </select>
          </div>
        </div>
        <div class="w3-row-padding">
          <div class="w3-col l3 w3-margin-top">
            <label>Latitude</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 1.4324121" name="latitude">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Longitude</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 1.323345" name="longitude">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Altitude (m)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 1.323121" name="altitude">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Total (m2)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 24.5" name="area_total">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Plantada (m2)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 12.5" name="area_plantada">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Irrigada (m2)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 12.5" name="area_irrigada">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Área Arrendada (m2)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 6.3" name="arrendada">
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Prod. media Café (ha)</label>
            <input type="number" class="w3-input w3-border" placeholder="Ex: 4.2" name="prod_media_cafe">
          </div>
          <div class="w3-col l12 w3-margin-top">
            <label>Observações</label>
            <textarea class="w3-input w3-border" name="obs" placeholder="Informe aqui caso houver observações"></textarea>
          </div>
          <div class="w3-col l12 w3-margin-top">
            <b>Possui*</b>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Eletricidade?</label>
            <select class="w3-select w3-border" name="p_eletricidade">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Propriedade Familiar?</label>
            <select class="w3-select w3-border" name="p_familiar">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Análise de solo/folha?</label>
            <select class="w3-select w3-border" name="p_analise_solo_folha">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Adubação Orgânica?</label>
            <select class="w3-select w3-border" name="p_adubacao_organica">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Fertilização?</label>
            <select class="w3-select w3-border" name="p_fertilizacao">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Análise camada expessura?</label>
            <select class="w3-select w3-border" name="p_analise_camada_expessura">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Sistemas de Tulhas?</label>
            <select class="w3-select w3-border" name="p_sistema_tulhas">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l3 w3-margin-top">
            <label>Proteção Chuva?</label>
            <select class="w3-select w3-border" name="p_protecao_chuva">
              <option value="">Não Informado</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Tipo de Terreiro</label>
            <select class="w3-select w3-border" name="tipo_terreiro">
              <option value="">Não Informado</option>
              <option value="Asfalto">Asfalto</option>
              <option value="Coberto">Coberto</option>
              <option value="Concreto">Concreto</option>
              <option value="Suspenso">Suspenso</option>
              <option value="Terra">Terra</option>
              <option value="Secador">Secador</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Tipo de Processamento</label>
            <select class="w3-select w3-border" name="tipo_processamento" id="tipo_processamento" onchange="toogleTipoProcessamento()">
              <option value="">Não Informado</option>
              <option value="Via Seca">Via Seca</option>
              <option value="Via Úmida">Via Úmida</option>
            </select>
          </div>
          <div class="w3-col l4 w3-margin-top">
            <label>Processamento via úmido</label>
            <select class="w3-select w3-border" name="processamento_via_umido" id="processamento_via_umido" disabled>
              <option value="">Não Informado</option>
              <option value="CD">CD</option>
              <option value="Despolpado">Despolpado</option>
              <option value="Desmucilado">Desmucilado</option>
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
            <tbody id="tabelaSafra">
              <tr>
                <td style="width: 40%">2018 / 2019</td>
                <td style="width: 30%">600</td>
                <td style="width: 30%">
                  <button class="w3-button w3-black w3-round">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button class="w3-button w3-red w3-round">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <button class="w3-button w3-gray w3-right w3-block" type="button" id="btnAddSafra" style="margin:12px 0" onclick="addSafra()"><i class="fa fa-plus"></i> Adicionar safra</button>
        </div>
        <div class="w3-container w3-margin-bottom">
          <div class="w3-padding-16">
            <span class="w3-large"><b>Safras / Cafés</b></span>
          </div>
          <table class="w3-table w3-bordered w3-centered">
            <thead>
              <tr class="w3-black">
                <th style="width: 30%">Ano</th>
                <th style="width: 20%">Variedade</th>
                <th style="width: 15%">Área Plantanda</th>
                <th style="width: 15%">Prod. Média</th>
                <th style="width: 20%">Opções</th>
              </tr>
            </thead>
            <tbody id="tabelaSafraCafe">
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
            </tbody>
          </table>
          <button class="w3-button w3-gray w3-right w3-block" type="button" style="margin:12px 0" onclick="addSafraCafe()"><i class="fa fa-plus"></i> Adicionar safra</button>
        </div>
      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="closeModalPropriedade()" type="button" class="w3-button w3-gray" style="width: 150px">
          <i class="fa fa-times"></i>
          Fechar
        </button>
        <button type="submit" class="w3-button w3-black w3-right" style="width: 150px">
          <i class="fa fa-check"></i>
          Salvar
        </button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/propriedade/propriedade.js');?>"></script>