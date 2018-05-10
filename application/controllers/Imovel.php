<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imovel extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library(['form_validation','upload','image_lib']);
	} 
	
	public function index(){

	$nivel_user = 1; //Nivel requirido para visualizar a pagina

	if (($this->session->userdata('logged')) and ($this->session->userdata('id_tipo_usuario') <= $nivel_user)) {
		
		#finalidade imoveis
		$data['finalidadeImoveis'] = $this->Crud_model->ReadAll('finalidade_imovel');
		#tipo Imoveis
		$data['tipoImoveis'] = $this->Crud_model->ReadAll('tipo_imovel');
		//cidades
		$data['cidades'] = $this->Crud_model->ReadAll('cidade');
		#logradouros
		$data['logradouros'] = $this->Crud_model->ReadAll('logradouro');
		#Indices de pesquisas
		$data['tipoPesquisa'] = 0;
		$data['finalidadePesquisa'] = 0;
		$data['referenciaPesquisa'] = '';
		$data['cidadePesquisa'] = 0;
		$data['imoveis'] = FALSE;
		$data['qtdImoveis'] = FALSE;
		$data['pesquisa'] = FALSE;

		// se esta usando o campo pesquisa
		if (($this->input->get("cidade")) and ($this->input->get("tipo")) and ($this->input->get("finalidade"))) {
			
			$data['pesquisa'] = TRUE;
			$cidade = $this->input->get("cidade");
			$tipo = $this->input->get("tipo");
			$finalidade = $this->input->get("finalidade");
			$referencia = $this->input->get("ref");

			//caso tiver informado a referencia
			if ($referencia != '') {
				$sql = "SELECT i.id_imovel, i.referencia_imovel, i.img_imovel, t.ds_tipo, f.ds_fi, b.nome_bairro, c.nome_cidade
				from imovel i
				JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
				JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
				JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
				JOIN bairro b ON (b.id_bairro = e.id_bairro)
				JOIN cidade c ON (c.id_cidade = b.id_cidade)
				WHERE i.referencia_imovel = '$referencia'
				ORDER by i.id_imovel";

				//qtd de imoveis
				$sql2 = "SELECT count(*) as qtdImoveis 
					from imovel i
					JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
					JOIN bairro b ON (b.id_bairro = e.id_bairro)
					JOIN cidade c ON (c.id_cidade = b.id_cidade)
					WHERE i.referencia_imovel = '$referencia'";				

			}else{

				$sql = "SELECT i.id_imovel, i.referencia_imovel, i.img_imovel, t.ds_tipo, f.ds_fi, b.nome_bairro, c.nome_cidade
				from imovel i
				JOIN tipo_imovel t ON (t.id_tipo = i.id_tipo_imovel)
				JOIN finalidade_imovel f ON (f.id_fi = i.id_finalidade)
				JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
				JOIN bairro b ON (b.id_bairro = e.id_bairro)
				JOIN cidade c ON (c.id_cidade = b.id_cidade)
				WHERE c.id_cidade = $cidade and
				i.id_tipo_imovel = $tipo and
				i.id_finalidade = $finalidade
				ORDER by i.id_imovel";

				//qtd de imoveis
				$sql2 = "SELECT count(*) as qtdImoveis 
					from imovel i
					JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
					JOIN bairro b ON (b.id_bairro = e.id_bairro)
					JOIN cidade c ON (c.id_cidade = b.id_cidade)
					WHERE c.id_cidade = $cidade and
					i.id_tipo_imovel = $tipo and
					i.id_finalidade = $finalidade";

			}

			$data['imoveis'] = $this->Crud_model->Query($sql);
			$qtdImoveis = $this->Crud_model->Query($sql2);
			$data['qtdImoveis'] = $qtdImoveis[0]->qtdImoveis; 
			#indices da pesquisa
			$data['cidadePesquisa'] = $cidade;
			$data['tipoPesquisa'] = $tipo;
			$data['finalidadePesquisa'] = $finalidade;
			$data['referenciaPesquisa'] = $referencia;

		}

		$header['title'] = "Dash | Imóveis";
		$menu['id_page'] = 3;

		$this->load->view('dashboard/template/commons/header',$header);
		$this->load->view('dashboard/template/commons/menu',$menu);
		$this->load->view('dashboard/imovel/home',$data);
		$this->load->view('dashboard/template/commons/footer');
		
			}else{
			redirect(base_url('login'));
		}
	}

	//Inserindo registros
	public function Register() {

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)){

			if($this->input->post()){

				$dataRegister = $this->input->post();

				
				//insere na tabela endereco
				$dataModelEndereco = array('id_bairro' => $dataRegister['bairroImovel'],
											'id_logradouro' => $dataRegister['logradouroImovel'],
											'ds_logradouro' => $dataRegister['descricaoLogradouroImovel'],
											'complemento' => $dataRegister['complementoImovel'],
											'numero' => $dataRegister['numeroImovel'],
											'cep' => $dataRegister['cepImovel']
										);

				//inserindo registro tabela enderenco imovel
				$res = $this->Crud_model->InsertId('endereco_imovel',$dataModelEndereco);
				
				
				//Cria a tabela detalhes do imovel vazia
				$dataModelDetalhes = array('detalhes' => '');
				$res2 = $this->Crud_model->InsertId('detalhes_imovel',$dataModelDetalhes); 

				if(($res)and($res2)):
				//inserindo registros na tabela imovel
					$referencia = 'R' . date('d') . $res; 
					$dataModel = array('referencia_imovel' => $referencia,
									'preco_imovel' => $dataRegister['precoImovel'],
									'id_finalidade' => $dataRegister['finalidadeImovel'],
									'id_tipo_imovel' => $dataRegister['tipoImovel'],
									'id_endereco_imovel' => $res, //endereco ja cadastrado na tabela a cima
									'id_detalhes_imovel' => $res2 //detalhes ja cadastrado na tabela a cima
								);

					$res3 = $this->Crud_model->Insert('imovel',$dataModel);

					//inserindo a log
					date_default_timezone_set('America/Sao_Paulo');
					$datalog = array('tabela' => 'imovel', 'comando' => 'INSERT', 'data' => date("Y-m-d H:i:s"), 'user' => $this->session->userdata('user'));
					$res4 = $this->Crud_model->Insert('log_sql',$datalog);
				
				endif;

				if($res3){
					echo "1";
				}else{
					echo "2";
				}

			}else{
				echo "2";
			}
					
		}else{
			//erro de permissao
			echo "3";
		}

	}

	//Inserindo registros
	public function Edit() {

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)){

			//if($this->input->post()){

				$dataRegister = $this->input->post();

				//die(var_dump($dataRegister));

				//insere na tabela endereco
				$id_imovel = array('id_imovel' => $dataRegister['idImovel']);
				$id_endereco_imovel = array('id_endereco_imovel' => $dataRegister['idEnderecoImovel']);

				$dataModelEndereco = array('id_bairro' => $dataRegister['bairroImovel'],
											'id_logradouro' => $dataRegister['logradouroImovel'],
											'ds_logradouro' => $dataRegister['descricaoLogradouroImovel'],
											'complemento' => $dataRegister['complementoImovel'],
											'numero' => $dataRegister['numeroImovel'],
											'cep' => $dataRegister['cepImovel']
										);

				//editando registros na tabela enderenco imovel
				$res = $this->Crud_model->Update('endereco_imovel',$dataModelEndereco,$id_endereco_imovel);
				
				//verifica 
				if ($dataRegister['disponibilidadeImovel'] == 0) {
					$disponibilidade = 0;
					$destaque_imovel = 0;
				}elseif($dataRegister['disponibilidadeImovel'] == 1){
					$disponibilidade = 1;
					$destaque_imovel = 0;
				}elseif ($dataRegister['disponibilidadeImovel'] == 2) {
					$disponibilidade = 1;
					$destaque_imovel = 1;
				}

				if($res):
				//editnado registros na tabela imovel
					$dataModel = array(
									'disponibilidade' => $disponibilidade,
									'destaque_imovel' => $destaque_imovel,
									'preco_imovel' => $dataRegister['precoImovel'],
									'id_finalidade' => $dataRegister['finalidadeImovel'],
									'id_tipo_imovel' => $dataRegister['tipoImovel']
								);

					$res2 = $this->Crud_model->Update('imovel',$dataModel,$id_imovel);

					//inserindo a log
					date_default_timezone_set('America/Sao_Paulo');
					$datalog = array('tabela' => 'imovel', 'comando' => 'Update', 'data' => date("Y-m-d H:i:s"), 'user' => $this->session->userdata('user'));
					$res3 = $this->Crud_model->Insert('log_sql',$datalog);
				
				endif;

				if($res2){
					echo "1";
				}else{
					echo "2";
				}


			//}else{
			//	echo "2";
			//}
					
		}else{
			//erro de permissao
			echo "3";
		}

	}
	
	/// editar os detalhes do imovel
	public function RegisterDetalhes() {

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)){

				$dataRegister = $this->input->post();

				//verifica o id da tabela onde ira inserir
				$res = $this->Crud_model->Query("SELECT id_detalhes_imovel FROM imovel where id_imovel =".$dataRegister['idImovelDetalhes']); 

				$id_detalhes = array('id_detalhes_imovel' => $res[0]->id_detalhes_imovel);


				//insere na tabela detalhes imovel
				$dataModelDetalhes = array('detalhes' => $dataRegister['detalhes'],
											'area' => $dataRegister['area'],
											'n_banheiro' => $dataRegister['n_banheiro'],
											'n_cozinha' => $dataRegister['n_cozinha'],
											'n_suite' => $dataRegister['n_suite'],
											'n_vagas_garagem' => $dataRegister['n_vagas_garagem'],
											'n_dormitorio' => $dataRegister['n_dormitorio'],
											'n_sala' => $dataRegister['n_sala'],
											'url_maps' => $dataRegister['url_maps']
										);

				//editando registros na tabela enderenco imovel
				$res2 = $this->Crud_model->Update('detalhes_imovel',$dataModelDetalhes,$id_detalhes);
				
				if($res2):
					//inserindo a log
					date_default_timezone_set('America/Sao_Paulo');
					$datalog = array('tabela' => 'Detalhes Imovel', 'comando' => 'Update', 'data' => date("Y-m-d H:i:s"), 'user' => $this->session->userdata('user'));
					$res3 = $this->Crud_model->Insert('log_sql',$datalog);
				
				endif;

				if($res2){
					echo $dataRegister['idImovelDetalhes'];
				}
			}

	}

	
	public function Remove(){
		
		
		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)) {
			
			//Se a url nao tiver o parametro de consulta
			if ($this->input->get('id')) {
				// Id recebe o paramentro da url
				$id = (int) $this->input->get('id');
				$par = array('id_imovel' => $id);
				$res = $this->Crud_model->Read('imovel',$par);
				if ($res) {
					
					$resDetalhe = $this->Crud_model->Delete('detalhes_imovel', array('id_detalhes_imovel' => $res->id_detalhes_imovel));
					$resEndereco = $this->Crud_model->Delete('endereco_imovel', array('id_endereco_imovel' => $res->id_endereco_imovel));
					$resGaleria = $this->Crud_model->Delete('galeria_imagem', array('id_imovel' => $res->id_imovel));
					$resImovel = $this->Crud_model->Delete('imovel', array('id_imovel' => $res->id_imovel));
					//removendo as pastas
					if ($resDetalhe and $resEndereco and $resImovel) {
						# code...
						$path = './assets/img/imoveis/galeria/'.$res->referencia_imovel.'/';

						if(is_dir($path)) {

							array_map('unlink', glob("$path/*.*"));
						  	rmdir($path);
						
						}
					}
					
				}

				//Se ocorrer a remocao
				if ($resImovel) {
					$this->output->set_status_header('200');
				}else{
					$this->output->set_status_header('400');
				}
			}

		}else{
			$this->output->set_status_header('400');
		}
	}



	public function RemoveImagemGaleria(){
		
		
		$nivel_user = 2; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)) {
			
			//Se a url nao tiver o parametro de consulta
			if ($this->input->get('id')) {
				// Id recebe o paramentro da url
				$id = (int) $this->input->get('id');
				$par = array('id_img' => $id);
				$res = $this->Crud_model->Read('galeria_imagem',$par);
				if ($res) {
					
					$ref = $this->Crud_model->Read('imovel', array('id_imovel' => $res->id_imovel));
					

					//removendo as pastas
					if ($ref) {
						# code...
						$path = './assets/img/imoveis/galeria/'.$ref->referencia_imovel.'/'.$res->name_file;

						if(is_file($path)) {

							unlink($path);
							$resImagem = $this->Crud_model->Delete('galeria_imagem',$par);
						
					
				
							//Se ocorrer a remocao
							if ($resImagem) {
								$this->output->set_status_header('200');
								echo "Removiod";
							}else{
								$this->output->set_status_header('400');
							}

						}
					}

				}

				
			}

		}else{
			$this->output->set_status_header('400');
		}
	}

	
	public function Recortar()
	{
		
		// Configurações para o upload da imagem
        // Diretório para gravar a imagem
        $configUpload['upload_path']   = './uploads/';
        // Tipos de imagem permitidos
        $configUpload['allowed_types'] = 'jpg|png';
        // Usar nome de arquivo aleatório, ignorando o nome original do arquivo
        $configUpload['encrypt_name']  = TRUE;
 
        // Aplica as configurações para a library upload
        $this->upload->initialize($configUpload);
 
        // Verifica se o upload foi efetuado ou não
        // Em caso de erro carrega a home exibindo as mensagens
        // Em caso de sucesso faz o processo de recorte
        if ( ! $this->upload->do_upload('imgImovel'))
        {
            // Recupera as mensagens de erro e envia o usuário para a home
            $data= array('error' => $this->upload->display_errors());
			
			die(var_dump($data));

        }
        else
        {
            // Recupera os dados da imagem
            $dadosImagem = $this->upload->data();
 
            // Calcula os tamanhos de ponto de corte e posição
            // de forma proporcional em relação ao tamanho da
            // imagem original
            

            $tamanhos = $this->CalculaPercetual($this->input->post());
 
            // Define as configurações para o recorte da imagem
            // Biblioteca a ser utilizada
            $configCrop['image_library'] = 'gd2';
            //Path da imagem a ser recortada
            $configCrop['source_image']  = $dadosImagem['full_path'];
            // Diretório onde a imagem recortada será gravada
            $configCrop['new_image']     = './assets/img/imoveis/';
            // Proporção
            $configCrop['maintain_ratio']= FALSE;
            // Qualidade da imagem
            $configCrop['quality']             = 100;
            // Tamanho do recorte
            $configCrop['width']         = $tamanhos['wcrop'];
            $configCrop['height']        = $tamanhos['hcrop'];
            // Ponto de corte (eixos x e y)
            $configCrop['x_axis']        = $tamanhos['x'];
            $configCrop['y_axis']        = $tamanhos['y'];
 
            // Aplica as configurações para a library image_lib
            $this->image_lib->initialize($configCrop);
 
            // Verifica se o recorte foi efetuado ou não
            // Em caso de erro carrega a home exibindo as mensagens
            // Em caso de sucesso envia o usuário para a tela
            // de visualização do recorte
            if ( ! $this->image_lib->crop())
            {
                // Recupera as mensagens de erro e envia o usuário para a home
                $data = array('error' => $this->image_lib->display_errors());
                	die($data);

            }
            else
            {
            	//=====Dados da tabela ========
            	$id_imovel = $this->input->post("idImovelImagem");
           		//=============================
                // Define a URL da imagem gerada após o recorte
                $imagem = $dadosImagem['file_name'];
                // seleciona imagem antiga para ser excluida
				$img_antiga = $this->Crud_model->Query("SELECT img_imovel from imovel where id_imovel = $id_imovel");

                $par = array('id_imovel' => $id_imovel);
                $dataModel = array('img_imovel' => $imagem);
                $result = $this->Crud_model->Update('imovel',$dataModel,$par);
                
                if ($result) {
                	$this->load->helper("file");
					
					//deletando arquivos da pasta upload
					delete_files('./uploads/');
                	//Deletando imagem antiga
                	$nameFileDelete = $img_antiga[0]->img_imovel;
                	if ($nameFileDelete == 'default.jpg') {
                		echo $id_imovel;
                	}else{
                		$file_delete = "./assets/img/imoveis/".$img_antiga[0]->img_imovel;
                		if (!unlink($file_delete)): echo ""; endif;
                		echo $id_imovel;
                	}
                }
            }
        }
	}

	 private function CalculaPercetual($dimensoes){
        // Verifica se a largura da imagem original é
        // maior que a da área de recorte, se for calcula o tamanho proporcional
        if($dimensoes['woriginal'] > $dimensoes['wvisualizacao']){
            $percentual = $dimensoes['woriginal'] / $dimensoes['wvisualizacao'];
 
            $dimensoes['x'] = round($dimensoes['x'] * $percentual);
            $dimensoes['y'] = round($dimensoes['y'] * $percentual);
            $dimensoes['wcrop'] = round($dimensoes['wcrop'] * $percentual);
            $dimensoes['hcrop'] = round($dimensoes['hcrop'] * $percentual);
        }
 
        // Retorna os valores a serem utilizados no processo de recorte da imagem
        return $dimensoes;
    }


	public function EnviarImagemGaleria()
	{
		$nivel_user = 2;
		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tipo_usuario') <= $nivel_user)) {
			
			//Id do imovel
			$dataRegister = $this->input->post('additionaldata');
			$referencia = $this->input->post('referenciaImovel');
			//$this->output->set_status_header($dataRegister);
			

			$this->load->library('upload');
			//define o caminho para salvar as imagens
			$path = './assets/img/imoveis/galeria/'.$referencia.'/';
			//Configuração do upload
			//informa o diretorio para salvar as imagens
			$config['upload_path'] = $path;
			//define os tipos de arquivos suportados
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			//define o tamanho máximo do arquivo (em Kb)
			$config['max_size'] = '5000';
			//nome aleatorio
			$config['encrypt_name']  = TRUE;
 			
			//verifica se o path é válido, se não for cria o diretório
			if (!is_dir($path)) {
				mkdir($path, 0777, $recursive = true);
			}
			//Inicializa o método de upload
			$this->upload->initialize($config);
			//processa o upload e verifica o status
			if (!$this->upload->do_upload('file')) {
				//Determina o status do header
				$this->output->set_status_header('400');
				//Retorna a mensagem de erro a ser exibida
				echo $this->upload->display_errors(null,null);
			} else {
				//recupera os dados da imagem
				$dadosImagem = $this->upload->data();
				$dataModel = array('name_file' => $dadosImagem['file_name'],'id_imovel' => $dataRegister);
				//paremetro
				$res = $this->Crud_model->Insert('galeria_imagem',$dataModel);
				//Determina o status do header
				$this->output->set_status_header('200');

			}
		
		}

	}
	         



}