<!-- !PAGE CONTENT! -->

  <!-- Header -->

  <div class="w3-container w3-padding w3-display-middle w3-third w3-center">
    <div class="w3-card-4 w3-padding w3-padding-16 w3-teal w3-large">
      <span><b>Wp Sistemas</b></span>
    </div>
    <div class="w3-card-4 w3-white w3-padding w3-padding-16">
      <h5><b>A Spinneli Imobiliária</b></h5>
      <p>Acesso ao Dashboard</p>
        <form method="POST" action="<?php echo base_url('login') ?>">
            <label>Usuário</label>
            <input type="text" name="user" class="w3-input" placeholder="Digite seu Usuário">
            
            <?php if($error == 1): ?>
            <div class="w3-text-red">Usuario inválido</div>
            <?php endif; ?>
            <br>
            <label>Senha</label>
            <input type="password" name="senha" class="w3-input" placeholder="Digite sua senha">
            
            <?php if($error == 2): ?>
            <div class="w3-text-red">Senha incorreta</div>
            <?php endif; ?>

            <br>
            <div class="w3-center w3-padding">
                <button class="w3-btn w3-teal w3-block">Login</button>
            </div>
        </form>
    </div>
  </div>
  