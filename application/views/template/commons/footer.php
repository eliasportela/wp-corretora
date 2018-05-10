<br>
<div class="w3-container w3-margin-top w3-padding w3-padding-16 w3-light-gray">
  <div class="w3-row-padding">
    <div class="w3-quarter w3-padding-large w3-center">
      <h4><i class="fa fa-home"></i>  Informações</h4>
        <p class="w3-opacity">
        <a href="">Imóveis</a><br>
        <a href="">Empresa</a><br>
        <a href="">Contato</a></p>
        <div class="w3-padding w3-border-bottom w3-hide-large"></div>
    </div>
    <div class="w3-quarter w3-padding-large w3-center">
      <h4><i class="fa fa-newspaper-o"></i>  Notícias</h4>
      <p class="w3-opacity">Receba notificações da A Spinneli Imóveis em seu e-mail</p>
      <button class="w3-button w3-block w3-pink w3-margin-top" onclick='document.getElementById("subscribe").style.display = "block";'>Receber</button>
      <div class="w3-padding w3-border-bottom w3-hide-large"></div>
    </div>
    <div class="w3-quarter w3-padding-large w3-center">
      <h4><i class="fa fa-heart-o"></i>  Siga-nos</h4>
      <p class="w3-opacity">
        <a href="Facebook">Facebook</a><br>
        <a href="Facebook">Twiter</a><br>
        <a href="Facebook">Instagram</a>
        <div class="w3-padding w3-border-bottom w3-hide-large"></div>
      </p>
    </div>
    <div class="w3-quarter w3-padding-large w3-center">
      <h4><i class="fa fa-paper-plane-o"></i>  Contate-nos</h4>
      <p class="w3-opacity">
        <i class="fa fa-map-marker"></i> Avenida do Diamante, 13<br>
        Marumbé, Patrocínio Paulista - SP<br>
        CEP: 142322-000<br>
        <i class="fa fa-envelope-o"></i> contato@spinelliimoveis.com<br>
        <i class="fa fa-phone"></i> (16) 4432-2342<br>
      </p>
    </div>
  </div>
  
</div>
<footer class="w3-display-container w3-center w3-black w3-padding-32 w3-opacity">
  <p class="w3-center w3-opacity"><span class="w3-hide-small">Sistema Imobiliário desenvolvido por </span><a href="http://wpconsultoria.xyz" title="W3.CSS" target="_blank" class="w3-hover-text-pink">Wp Consultoria Digital</a></p>
  <p>© 2017 A. Spinneli Imóveis - CRECI 147646</p>
  <p class="w3-display-bottomright w3-margin-right"><a href="<?=base_url('admin')?>"><i class="fa fa-lock"></i></a></p>
</footer>

<!-- Subscribe Modal -->
<div id="subscribe" class="w3-modal">
  <div class="w3-modal-content w3-card w3-animate-zoom w3-padding-large" style="max-width: 40%">
    <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-right w3-transparent"></i>
    <div class="w3-container w3-white w3-center">
      <h2 class="w3-wide">Inscreva-se</h2>
      <p>Receba notificações, ofertas e novidades da A Spinneli Imóveis em seu e-mail</p>
      <hr>
      <p><input class="w3-input w3-border" type="text" placeholder="Informe seu nome"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Informe seu e-mail"></p>
      <button type="button" class="w3-button w3-pink w3-block w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Enviar</button>
    </div>
  </div>
</div>

<!-- Modal de Requests -->
  <div id="request" class="w3-modal">
    <div class="w3-modal-content w3-card-4" style="max-width:30%;">
      <div class="w3-container">
        <div class="w3-row-padding w3-center" id="botaoSelecionarImagemImovel">
          <div style="background-color: #fff; max-width: 100%; max-height:150px">
            <p><i class="fa fa-sun-o w3-spin" style="font-size:64px"></i></p>
            <p>Aguarde.. <span id="descricaoRequest">.</span></p>
          </div>
        </div>
      </div>
      <div class="w3-container w3-padding-16">
        <button onclick="location.reload()" type="button" class="w3-button w3-block w3-red">Cancelar</button>
      </div>
    </div>
  </div>

<!--Scripts geral-->
<script type="text/javascript" src="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.min.js');?>"></script>
<script src="<?=base_url('assets/js/commons/main.js')?>"></script>

</body>
</html>
