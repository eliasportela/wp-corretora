<!-- Top container -->
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-center">
      <span><i class="fa fa-user fa-2x"></i> <strong><?php echo $this->session->userdata('nome_usuario')?></strong></span><br>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fechar</a>
    <a href="<?php echo base_url('admin')?>" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 1): echo 'w3-black'; endif; ?>"><i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="<?php echo base_url('admin/usuarios')?>" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 2): echo 'w3-black'; endif; ?>"><i class="fa fa-users fa-fw"></i>  Usuários</a>
    <a href="<?php echo base_url('admin/produtor')?>" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 3): echo 'w3-black'; endif; ?>"><i class="fa fa-user fa-fw"></i>  Produtores</a>
    <a href="<?php echo base_url('admin/contatos')?>" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 5): echo 'w3-black'; endif; ?>"><i class="fa fa-phone fa-fw"></i>  Contatos</a>
    <a href="<?php echo base_url('admin/site')?>" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 4): echo 'w3-black'; endif; ?>"><i class="fa fa-bullseye fa-fw"></i>  Site (Indiponivel)</a>
    <a href="#" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 6): echo 'w3-blue'; endif; ?>"><i class="fa fa-envelope fa-fw"></i>  CRM (Indiponivel)</a>
    <a href="#" class="w3-bar-item w3-button w3-padding <?php if ($id_page == 7): echo 'w3-teal'; endif; ?>"><i class="fa fa-cog fa-fw"></i>  Configurações (Indiponivel)</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>