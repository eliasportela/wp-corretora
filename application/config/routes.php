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
$route['admin/produtor/cadastro'] = 'Produtor/Register';
$route['admin/editar-produtor'] = 'Produtor/Edit';
$route['admin/remover-produtor'] = 'Produtor/Remove';

#Contato
$route['admin/contatos'] = 'Contato';
$route['admin/notificacao-contato'] = 'Contato/NotificacaoContato';
$route['admin/visualizacao-contato'] = 'Contato/VisualizacaoContato';

#Util
$route['admin/api/cidade'] = 'Util/GetCidades';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
