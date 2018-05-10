<?php
defined('BASEPATH') OR exit('No direct script access allowed');


# Rotas do Tamplate
$route['default_controller'] = 'Site';

//Rotas do Site principal
$route['quem-somos'] = 'Site/QuemSomos';
$route['imoveis'] = 'Site/Imoveis';
$route['contato'] = 'Site/Contato';
$route['imovel/(:any)/(:any)'] = 'Site/DetalhesImovel';

# Rotas Do Dashboard
$route['admin'] = 'Dashboard';
$route['login'] = 'User/login';


#Conteudo do Site
$route['admin/site'] = 'Pagina';

#Usuario
$route['login'] = 'User/Login';
$route['logout'] = 'User/Logout';
$route['alterar-senha'] = 'User/UpdatePassw';
$route['profile-editar'] = 'User/EditarMyUser';
$route['profile/recortar'] = 'User/Recortar';
$route['profile/visualizacao'] = 'User/Visualizacao';

#CRUD  usuario
$route['admin/usuarios'] = 'User/ListarUser';
$route['admin/cadastro-usuario'] = 'User/Register';
$route['admin/editar-usuario'] = 'User/EditarUser';
$route['admin/remover-usuario'] = 'User/RemoverUser';

#Imoveis
$route['admin/imoveis'] = 'Imovel';
$route['admin/cadastro-imovel'] = 'Imovel/Register';
$route['admin/editar-imovel'] = 'Imovel/Edit';
$route['admin/remover-imovel'] = 'Imovel/Remove';
$route['admin/imagem-perfil-imovel'] = 'Imovel/Recortar';
$route['admin/detalhes-imovel'] = 'Imovel/RegisterDetalhes';
$route['admin/galeria-imovel'] = 'Imovel/EnviarImagemGaleria';
$route['admin/galeria-remove'] = 'Imovel/RemoveImagemGaleria';

#Pedidos
$route['admin/pedidos'] = 'Pedido';
$route['admin/enviar-pedido'] = 'Pedido/EnviarPedido';
$route['admin/buscar-pedido'] = 'Pedido/BuscarPedido';
$route['admin/notificacao-pedido'] = 'Pedido/NotificacaoPedido';
$route['admin/visualizacao-pedido'] = 'Pedido/VisualizacaoPedido';
$route['admin/finalizar-pedido'] = 'Pedido/FinalizarPedido';

# API SITE
$route['api/bairros'] = 'ApiSite/Bairros';

#Cidades
$route['admin/cidades'] = 'Cidade/BuscarCidades';
$route['admin/cadastrar-cidade'] = 'Cidade/CadastrarCidade';
$route['admin/editar-cidade'] = 'Cidade/EditarCidade';
$route['admin/remover-cidade'] = 'Cidade/RemoverCidade';

#Bairros
$route['admin/bairros'] = 'Bairro/BuscarBairros';
$route['admin/cadastro-bairro'] = 'Bairro/CadastrarBairro';
$route['admin/editar-bairro'] = 'Bairro/EditarBairro';
$route['admin/remover-bairro'] = 'Bairro/RemoverBairro';

$route['api/imovel'] = 'ApiSite/Imovel';
$route['api/galeria-imovel'] = 'ApiSite/GaleriaImovel';
$route['api/conteudo-site'] = 'ApiSite/ConteudoSite';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
