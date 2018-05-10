<!-- Sidebar/menu -->
<div class="w3-card-2 w3-white w3-margin w3-padding w3-padding-16">
  <div class="w3-row">
    <div class="w3-col l6">
      <div class="w3-container w3-padding-16">
        <h4 class="w3-opacity w3-text-pink" ><b>Contate-nos</b></h4>
        <hr>
        <form action="/action_page.php" target="_blank">
          <p><label><i class="fa fa-user"></i> Nome</label>
          <input class="w3-input w3-border" type="text" placeholder="Nome completo" name="CheckIn" required>          
          </p>
          <p><label><i class="fa fa-phone"></i> Telefone</label>
          <input class="w3-input w3-border" type="tel" placeholder="Telefone" name="CheckOut" required value="(16) ">         
          </p>
          <p><label><i class="fa fa-envelope"></i> E-mail</label>
          <input class="w3-input w3-border" type="email" placeholder="Seu e-mail" name="Adults">              
          </p>
          <p><label><i class="fa fa-font"></i> Assunto</label>
          <input class="w3-input w3-border" type="text" placeholder="Assunto do contato" name="Adults">              
          </p>
          <p><label><i class="fa fa-comment"></i> Mensagem</label>
          <textarea class="w3-input w3-border" rows="4" style="max-width: 100%" placeholder="Digite sua Mensagem"></textarea>
          </p>
          <p>
            <button class="w3-button w3-block w3-pink" type="submit"><i class="fa fa-send w3-margin-right"></i> Enviar</button>
          </p>
        </form>
      </div>
    </div>
    <div class="w3-col l6 w3-margin-top">
      <div class="w3-container" id="apartment">
        <h4 class="w3-text-pink w3-padding-8 w3-opacity"><strong>Como chegar</strong></h4>
        <hr>
        <img class="w3-image" src="<?=base_url('assets/img/site/maps.png')?>">
        <hr>
      </div>
    </div>

  </div>
</div>

