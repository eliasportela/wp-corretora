<!-- Modal de Requests -->
  <style type="text/css">
      @media (min-width: 600px){
        .modal-request{
          width: 35%;
        }
      }
  </style>
  <div id="request" class="w3-modal" style="padding-top: 35vh;">
    <div class="w3-modal-content w3-card-4 modal-request">
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
  <!-- Modal de Erros -->
  <div id="alertError" class="w3-modal" style="padding-top: 35vh;">
    <div class="w3-modal-content w3-card-4 modal-request">
      <div class="w3-container">
        <div class="w3-row-padding w3-center" id="botaoSelecionarImagemImovel">
          <div style="background-color: #fff; max-width: 100%; max-height:150px">
            <p><i class="fa fa-exclamation-circle" style="font-size:64px"></i></p>
            <p><span id="descricaoAlertError">.</span></p>
          </div>
        </div>
      </div>
      <div class="w3-container w3-padding-16">
        <button onclick="location.reload()" type="button" class="w3-button w3-block w3-red">Ok</button>
      </div>
    </div>
  </div>
  <!-- End page content -->

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery.Jcrop.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/dropzone.min.js');?>"></script>

<!-- JS GERAL -->
<script type="text/javascript" src="<?php echo base_url('assets/js/commons/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/commons/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.min.js');?>"></script>

<!-- JS DASHBOARD -->
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/user/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/imovel/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/imovel/cidade.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/imovel/bairro.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/site/main.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dashboard/imovel/perfil-imovel.js');?>"></script>

</body>
</html>
