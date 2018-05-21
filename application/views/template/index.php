<!-- Header -->
<header class="w3-display-container">
  <div class="container-banner w3-display-container w3-center">
    <img class="image-banner" src="<?=base_url('assets/img/site/banner.jpg')?>">
    <div class="w3-container w3-display-middle container-home w3-round w3-text-white">
      <div class="w3-row-padding">
        <div class="w3-col l6 w3-display-container col-home">
          <div class="w3-display-middle">
            <h1>SOUZA CAFÉS</h1>
            <h4>Sua safra de cafés em boas mãos</h4>
            <a href="#cotacoes" class="w3-button hover-btn w3-block w3-green w3-round w3-margin-top">
              <i class="fa fa-newspaper-o"></i>
              Cotações
            </a>
            <a href="#empresa" class="w3-button hover-btn w3-block w3-green w3-round w3-margin-top">
              <i class="fa fa-home"></i>
              Sobre nós
            </a>
            <button class="w3-button hover-btn w3-block w3-green w3-round w3-margin-top" onclick="$('#modal-contato').css('display','block')">
              <i class="fa fa-phone"></i>
              Solicitar contato
            </a>
          </div>
        </div>
        <div class="w3-col l6 w3-display-container col-home w3-hide-small">
          <div class="w3-display-middle w3-card-2 w3-round w3-white w3-padding w3-padding-32">
            <h4>Fale com nosso Corretor</h4>
            <hr>
            <form id="solicitarContato" method="post" action="">
              <div class="w3-margin-top">
                <input type="text" class="w3-input w3-border" id="nome_contato" name="nome_contato" placeholder="Informe seu nome" required>
              </div>
              <div class="w3-margin-top">
                <input type="text" class="w3-input w3-border" id="email" name="email" placeholder="E-mail" required>
              </div>
              <div class="w3-margin-top">
                <input type="text" class="w3-input w3-border" id="telefone" name="telefone" placeholder="Telefone" required>
              </div>
              <hr>
              <button class="btnEnviar w3-button w3-block w3-green w3-margin-top w3-round hover-btn">
                Quero falar com um corretor
              </button>
            </form>
          </div>  
        </div>
      </div>
    </div>
  </div>
</header>

<div class="w3-padding w3-center" id="cotacoes">
  <div>
    <div class="w3-container">
      <h3 class="w3-padding-16">COTAÇÕES DO CAFÉ</h3>
    </div>
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-col l4">
        <div class="w3-card w3-padding w3-round w3-white col-cotacoes">
          <h3>NYBOT</h3>
          <script type="text/javascript" src="http://www.noticiasagricolas.com.br/widget/cotacoes.js.php?id=4&fonte=Arial%2C%20Helvetica%2C%20sans-serif&tamanho=10pt&largura=320px&cortexto=333333&corcabecalho=FFF&corlinha=DCE7E9&imagem=false&output=js"></script>  
        </div>
      </div>
      <div class="w3-col l4">
        <div class="w3-card w3-padding w3-round w3-white col-cotacoes">
          <h3>Bolsa de Londres</h3>
          <script type="text/javascript" src="http://www.noticiasagricolas.com.br/widget/cotacoes.js.php?id=5&fonte=Arial%2C%20Helvetica%2C%20sans-serif&tamanho=10pt&largura=320px&cortexto=333333&corcabecalho=FFF&corlinha=DCE7E9&imagem=true&output=js"></script>
        </div>
      </div>
      <div class="w3-col l4">
        <div class="w3-card w3-padding w3-round w3-white col-cotacoes">
          <h3>Mercado</h3>
          <script type="text/javascript" src="http://www.noticiasagricolas.com.br/widget/cotacoes.js.php?id=100&fonte=Arial%2C%20Helvetica%2C%20sans-serif&tamanho=10pt&largura=320px&cortexto=333333&corcabecalho=FFF&corlinha=DCE7E9&imagem=true&output=js"></script>
        </div>
      </div>    
    </div>
  </div>
</div>

<br>

<div class="w3-display-container w3-margin-top w3-center w3-green container-empresa" id="empresa">
  <div class="w3-display-middle">
    <i class="fa fa-home fa-3x"></i>
    <h2>Nossa Empresa</h2>
  </div>
</div>

<br>
<div class="w3-container w3-margin-top" style="margin: 0 5%">
  <div class="w3-row-padding w3-center">
    <div class="w3-col m6 l3 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-globe fa-3x w3-text-green"></i>
        <h4>Quem somos?</h4>
        <p class="text">
          Estamos estabelecidos na cidade de São Sebastião do Paraíso, interior de Minas Gerais Brasil.
        </p>
      </div>
    </div>
    <div class="w3-col m6 l3 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-retweet fa-3x w3-text-green"></i>
        <h4>O que fazemos?</h4>
        <p class="text">
          Atuamos na intermediação das vendas de Café em Minas Gerais e São Paulo
        </p>
      </div>
    </div>
    <div class="w3-col m6 l3 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-dollar fa-3x w3-text-green"></i>
        <h4>Melhor Preço</h4>
        <p class="text">
          Negociamos diretamente com Exportadores, Importadores e Torrefadores.
        </p>
      </div>
    </div>
    <div class="w3-col m6 l3 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-send fa-3x w3-text-green"></i>
        <h4>Transparência</h4>
        <p class="text">
          Contamos com um rigoroso processo de qualidade, garantindo transparência e confiança para nossos parceiros
        </p>
      </div>
    </div>
  </div>
</div>

<div class="w3-container w3-margin-top w3-padding w3-center" style="margin: 0 5%">
  <h4 class="w3-padding-64">Missão, Visão e Valor</h4>
  <div class="w3-row-padding">
    <div class="w3-col m4 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-globe fa-3x w3-text-green"></i>
        <h4>Missão</h4>
        <p class="text">
          Estabelecer relações duradoras com nossos parceiros e clientes.
        </p>
      </div>
    </div>
    <div class="w3-col m4 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-retweet fa-3x w3-text-green"></i>
        <h4>Visão</h4>
        <p class="text">
          Ser o maior parceiro dos seus clientes.
        </p>
      </div>
    </div>
    <div class="w3-col m4 w3-padding">
      <div class="w3-card w3-round w3-white w3-padding w3-padding-32 card-info">
        <i class="fa fa-dollar fa-3x w3-text-green"></i>
        <h4>Valor</h4>
        <p class="text">
          Foco no cliente, Transparência, Valorização dos Parceiros, Agilidade e Qualidade Única.
        </p>
      </div>
    </div>
  </div>
</div>


<br>
<div class="w3-display-container w3-margin-top w3-center w3-green container-empresa" style="margin-bottom: 0">
  <div class="w3-display-middle">
    <i class="fa fa-phone fa-3x"></i>
    <h2>Fale Conosco</h2>
  </div>
</div>
<div class="w3-row-padding w3-padding-16" style="margin: 64px 5%">
  <div class="w3-col l9">
    <div id="map"></div>
  </div>
  <div class="w3-col l3 col-contato">
    <div class="w3-display-container w3-card w3-round w3-white w3-padding w3-padding-16" style="height: 70vh">
      <h4 class="w3-text-green"><b>Souza Cafés</b></h4>
      <div class="w3-display-middle" style="width: 90%">
        <h4 class="w3-text-green"><b>Endereço</b></h4>
        <p>
          <i class="fa fa-map-marker w3-text-green"></i> Av: Oliveira Rezende, 751 Braz <br>
          São Sebastião do Paraíso – MG 37950-000
        </p>
        <h4 class="w3-text-green"><b>E-mail</b></h4>
        <p>
          <i class="fa fa-envelope w3-text-green"></i> contato@souzacafes.com.br
        </p>
        <h4 class="w3-text-green"><b>Telefone</b></h4>
        <p>
          <i class="fa fa-phone w3-text-green" ></i> (35) 3535-1805
        </p>
      </div>
    </div>
  </div>
</div>

<div id="modal-contato" class="w3-modal" style="padding-top: 70px!important">
  <div class="w3-modal-content w3-card-4 w3-round w3-animate-left w3-padding w3-padding-32 w3-display-container">
    <div class="w3-display-topright" style="padding: 8px">
      <i onclick="document.getElementById('modal-contato').style.display='none'" class="fa fa-remove w3-button w3-transparent"></i>
    </div>
    <h4 class="w3-center">Fale com nosso Corretor</h4>
    <hr>
    <form id="solicitarContato" method="post" action="">
      <div class="w3-margin-top">
        <input type="text" class="w3-input w3-border" id="nome_contato" name="nome_contato" placeholder="Informe seu nome" required>
      </div>
      <div class="w3-margin-top">
        <input type="text" class="w3-input w3-border" id="email" name="email" placeholder="E-mail" required>
      </div>
      <div class="w3-margin-top">
        <input type="text" class="w3-input w3-border" id="telefone" name="telefone" placeholder="Telefone" required>
      </div>
      <hr>
      <button class="btnEnviar w3-button w3-block w3-green w3-margin-top w3-round hover-btn">
        Enviar Solicitação
      </button>
    </form>
  </div>
</div>


<script>
  function initMap() {
    var uluru = {lat: -20.913754, lng: -46.998136};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt7EhKe2GKq4NV-p9mdrgRH07pGGxVmGA&callback=initMap">
</script>
<script type="text/javascript" src="<?=base_url("assets/js/site-principal/contato.js")?>"></script>