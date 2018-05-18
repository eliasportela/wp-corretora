<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# Rotas do Tamplate
$route['default_controller'] = 'Site';
$route['api/solicitar-contato'] = 'Site/SolicitarContato';

# Rotas Do Dashboard
$route['admin'] = 'Dashboard';
$route['login'] = 'User/login';

#Usuario
$route['login'] = 'User/Login';
$route['logout'] = 'User/Logout';
$route['alterar-senha'] = 'User/UpdatePassw';
$route['profile-editar'] = 'User/EditarMyUser';
$route['profile/visualizacao'] = 'User/Visualizacao';

#CRUD  usuario
$route['admin/usuarios'] = 'User/ListarUser';
$route['admin/cadastro-usuario'] = 'User/Register';
$route['admin/editar-usuario'] = 'User/EditarUser';
$route['admin/remover-usuario'] = 'User/RemoverUser';

#Produtores
$route['admin/produtor'] = 'Produtor';
$route['admin/produtor/cadastro'] = 'Produtor/Cadastro';

$route['admin/api/produtor/(:num)']['get'] = 'Produtor/Get';
$route['admin/api/produtor']['post'] = 'Produtor/Register';
$route['admin/api/produtor/editar/(:num)']['post'] = 'Produtor/Edit';
$route['admin/api/produtor/remover/(:num)'] = 'Produtor/Remove';

#Propriedades
$route['admin/api/propriedade/(:num)']['get'] = 'Propriedade';
$route['admin/api/propriedade/']['post'] = 'Propriedade/Register';
$route['admin/api/propriedade/(:num)']['put'] = 'Propriedade/Edit';
$route['admin/api/propriedade/(:num)']['delete'] = 'Propriedade/Remove';

#Contato
$route['admin/contatos'] = 'Contato';
$route['admin/notificacao-contato'] = 'Contato/NotificacaoContato';
$route['admin/visualizacao-contato'] = 'Contato/VisualizacaoContato';

#Util
$route['admin/api/cidade'] = 'Util/GetCidades';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
