
<footer class="w3-display-container w3-center w3-black w3-padding-32">
  <p class="w3-center w3-opacity"><span class="w3-hide-small">Desenvolvido por </span><a href="http://wpconsultoria.xyz" title="WP Consultoria" target="_blank" class="w3-hover-text-pink">Wp Consultoria Digital</a></p>
  <p>© 2018 - Souza Cafés</p>
  <p class="w3-display-bottomright w3-margin-right"><a href="<?=base_url('admin')?>"><i class="fa fa-lock"></i></a></p>
</footer>

<!-- Subscribe Modal -->
<div id="subscribe" class="w3-modal">
  <div class="w3-modal-content w3-card w3-animate-zoom w3-padding-large" style="max-width: 40%">
    <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-right w3-transparent"></i>
    <div class="w3-container w3-white w3-center">
      <h2 class="w3-wide">Inscreva-se</h2>
      <p>Receba notificações da Souza Cafés em seu e-mail</p>
      <hr>
      <p><input class="w3-input w3-border" type="text" placeholder="Informe seu nome"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Informe seu e-mail"></p>
      <button type="button" class="w3-button w3-pink w3-block w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Enviar</button>
    </div>
  </div>
</div>

<!--Scripts geral-->
<script type="text/javascript" src="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.min.js');?>"></script>
<script src="<?=base_url('assets/js/commons/main.js')?>"></script>

</body>
</html>
