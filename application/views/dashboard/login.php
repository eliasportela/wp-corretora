<div class="dash-video" style="width: 100%;height: 100vh;overflow: hidden;">
  <video autoplay muted loop id="myVideo" style="width: 100%;height: auto;">
    <source src="<?=base_url("assets/img/banner.mp4")?>" type="video/mp4">
  </video>
</div>
<div>
  <div class="w3-container w3-padding w3-display-middle w3-center" style="width: 80%">
    <div class="w3-row-padding">
      <div class="w3-col l6">
        <div class="w3-display-container w3-text-white">
          <div class="w3-center" style="width: 100%">
            <img class="w3-image" width="250" src="<?=base_url("assets/img/icon.svg")?>">
            <h1><b>WP Corretora</b></h1>
            <p><b>O melhor sistema para sua corretora de café</b></p>
          </div>
        </div>
      </div>
      <div class="w3-col l6">
        <div class="w3-card-4 w3-round w3-white w3-padding w3-padding-16" style="width: 80%;float: right;">
          <h4>Acesso ao Dashboard</h4>
          <br>
          <form method="POST" action="<?php echo base_url('login') ?>">
            <div class="w3-margin-top">
              <label>Usuário</label>
              <input type="text" name="email" class="w3-input w3-border" placeholder="Digite seu Usuário">
            </div>
            <?php if($error == 1): ?>
              <div class="w3-text-red">Usuario inválido</div>
            <?php endif; ?>
            <div class="w3-margin-top">
              <label>Senha</label>
              <input type="password" name="senha" class="w3-input w3-border" placeholder="Digite sua senha">
            </div>
            <?php if($error == 2): ?>
              <div class="w3-text-red">Senha incorreta</div>
            <?php endif; ?>
            <hr>
            <div class="w3-center w3-padding-16 w3-margin-top">
              <button class="w3-button w3-black w3-round w3-block">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
