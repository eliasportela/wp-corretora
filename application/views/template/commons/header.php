<!DOCTYPE html>
<html>
<title><?=$title?></title>
<link rel="icon" href="<?=base_url('assets/img/thumb.png')?>" type="image/x-icon">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=base_url('assets/css/w3s.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/mystyle.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/mobile-site.css')?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.css');?>">

<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/commons/config.js');?>"></script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none};
.w3-badge {height:13px;width:13px;padding:0}
</style>
<body class="w3-light-gray">

<div class="w3-container w3-green w3-hide-large w3-hide-medium bar-mobile">
  <div class="w3-bar w3-wide">
    <div class="w3-right">
      <span onclick="$('#menuCelular').toggle()" class="w3-bar-item w3-button w3-mobile w3-hover-green"><i class="fa fa-bars"></i></span>
    </div>
    <div id="menuCelular" class="" style="display: none;">
      <a href="<?=base_url('imoveis')?>" class="w3-button w3-block"><i class="fa fa-newspaper-o"></i> Cotações</a>
      <a href="<?=base_url('quem-somos')?>" class="w3-button w3-block"><i class="fa fa-home"></i> Empresa</a>
      <a href="<?=base_url('contato')?>" class="w3-button w3-block"><i class="fa fa-envelope-o"></i> Contato</a>
      <!-- <a href="#projects" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-building-o"></i> Cotações</a>
      <a href="#about" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-home"></i> Empresa</a>
      <a href="#contact" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-envelope-o"></i> Contato</a> -->
    </div>
  </div>
</div>

<!-- Navbar (sit on top) -->
<div class="w3-container w3-padding menuDesktop w3-hide-small">
  <div class="w3-bar w3-wide">
    <div class="w3-center">
      <a href="<?=base_url('imoveis')?>" class="w3-button hover-cabecalho w3-border-right"><i class="fa fa-newspaper-o"></i> Cotações</a>
      <a href="<?=base_url('quem-somos')?>" class="w3-button hover-cabecalho w3-border-right"><i class="fa fa-home"></i> Empresa</a>
      <a href="<?=base_url('contato')?>" class="w3-button hover-cabecalho"><i class="fa fa-envelope-o"></i> Contato</a>
    </div>
  </div>
</div>
