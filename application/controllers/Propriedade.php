<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Propriedade extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(['upload','image_lib']);
	}

	//Select com Paginacao
	public function Get(){
		
		$produtor = $this->uri->segment(4);

		if ($produtor > 0):
			$sql = "SELECT * FROM propriedade
			WHERE id_produtor = $produtor and fg_ativo = 1";

			$res = $this->Crud_model->Query($sql);
			
			if ($res):
				$json = json_encode($res,JSON_UNESCAPED_UNICODE);
				echo $json;
				$this->output->set_status_header('200');
				return;
			endif;
		else:
			$this->output->set_status_header('500');
		endif;
	}

	//Inserindo registros
	public function Register() {

		$nivel_user = 1;
		$foto_propriedade = null;
		
		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):

		$dataRegister = $this->input->post();
		
		if ($dataRegister['nome_propriedade'] != NULL):


			//Config ambiente de upload
			$path = './uploads/docs/propriedades/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config['max_size'] = '5000';
			$config['encrypt_name']  = TRUE;
			$this->upload->initialize($config);

			//verifica se o path é válido, se não for cria o diretório
			if (!is_dir($path)) {
				mkdir($path, 0777, $recursive = true);
			}

			$logimg = null;

			//upload da imagem
			if (!$this->upload->do_upload('foto_file')) {
				$logimg = $this->upload->display_errors(null,null);
			} else {
				$dadosImagem = $this->upload->data();
				$foto_propriedade = $dadosImagem['file_name'];
			}

			$dataModel = array(
				'id_produtor' => trim($dataRegister['id_produtor']),
				'nome_propriedade' => trim($dataRegister['nome_propriedade']),
				'id_tipo_propriedade' => trim($dataRegister['id_tipo_propriedade']),
				'cnpj' => trim($dataRegister['cnpj']),
				'contato' => trim($dataRegister['contato']),
				'telefone' => trim($dataRegister['telefone']),
				'foto_propriedade' => $foto_propriedade,
				'latitude' => trim($dataRegister['latitude']),
				'longitude' => trim($dataRegister['longitude']),
				'altitude' => trim($dataRegister['altitude']),
				'area_total' => trim($dataRegister['area_total']),
				'area_plantada' => trim($dataRegister['area_plantada']),
				'area_irrigada' => trim($dataRegister['area_irrigada']),
				'arrendada' => trim($dataRegister['arrendada']),
				'prod_media_cafe' => trim($dataRegister['prod_media_cafe']),
				'p_eletricidade' => trim($dataRegister['p_eletricidade']),
				'p_familiar' => trim($dataRegister['p_familiar']),
				'p_analise_solo_folha' => trim($dataRegister['p_analise_solo_folha']),
				'p_adubacao_organica' => trim($dataRegister['p_adubacao_organica']),
				'p_fertilizacao' => trim($dataRegister['p_fertilizacao']),
				'p_analise_camada_expessura' => trim($dataRegister['p_analise_camada_expessura']),
				'p_sistema_tulhas' => trim($dataRegister['p_sistema_tulhas']),
				'p_protecao_chuva' => trim($dataRegister['p_protecao_chuva']),
				'tipo_terreiro' => trim($dataRegister['tipo_terreiro']),
				'tipo_processamento' => trim($dataRegister['tipo_processamento']),
				'processamento_via_umido' => trim($dataRegister['processamento_via_umido']),
				'logradouro' => trim($dataRegister['logradouro']),
				'numero_km' => trim($dataRegister['numero_km']),
				'id_cidade' => trim($dataRegister['id_cidade']),
				'obs' => trim($dataRegister['obs']));
			
			$res = $this->Crud_model->InsertID('propriedade',$dataModel);

			if($res):

				//Safras Geral
				if($dataRegister['safraQtd'] != NULL):

					for ($i=0; $i < count($dataRegister['safraQtd']); $i++) {
						
						$safraModel = array('safra_ano_inicio' => $dataRegister['safraAnoInicio'][$i],
							'safra_ano_fim' => $dataRegister['safraAnoFim'][$i],
							'valor_safra' => $dataRegister['safraQtd'][$i],
							'id_propriedade' => $res);

						$res = $this->Crud_model->Insert('safra_geral',$safraModel);
					}

				endif;

				//Safras Cafés
				if($dataRegister['safraCafeQtd'] != NULL):

					for ($i=0; $i < count($dataRegister['safraCafeQtd']); $i++) {
						
						$safraModel = array(
							'safra_ano_inicio' => $dataRegister['safraCafeAnoInicio'][$i],
							'safra_ano_fim' => $dataRegister['safraCafeAnoFim'][$i],
							'variedade' => $dataRegister['safraCafeVariedade'][$i],
							'area_plantada' => $dataRegister['safraCafeArea'][$i],
							'valor_safra' => $dataRegister['safraCafeQtd'][$i],
							'id_propriedade' => $res);

						$res = $this->Crud_model->Insert('safra_geral',$safraModel);
					}

				endif;

				$this->output->set_status_header('200');

			endif;
			
		endif;

		else:
			$this->output->set_status_header('404');
		endif;
	}

	//Inserindo registros
	public function Edit() {

		$nivel_user = 2;

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
			
			$dataId = (int)$this->uri->segment(5);
			$dataRegister = $this->input->post();

			if (($dataId > 0) AND ($dataRegister != NULL) AND ($dataRegister['nome_produtor'] != NULL)):

				$dataModel = array(
					'nome_produtor' => trim($dataRegister['nome_produtor']),
					'id_tipo_pessoa' => trim($dataRegister['id_tipo_pessoa']),
					'cpf_cnpj' => trim($dataRegister['cpf_cnpj']),
					'rg_inscricao_estadual' => trim($dataRegister['rg_inscricao_estadual']),
					'data_nascimento' => trim($dataRegister['data_nascimento']),
					'escolaridade' => trim($dataRegister['escolaridade']),
					'membros_familia' => trim($dataRegister['membros_familia']),
					'email' => trim($dataRegister['email']),
					'telefone' => trim($dataRegister['telefone']),
					'foto_produtor' => trim($dataRegister['foto_produtor']),
					'endereco' => trim($dataRegister['endereco']),
					'numero' => trim($dataRegister['numero']),
					'complemento' => trim($dataRegister['complemento']),
					'cep' => trim($dataRegister['cep']),
					'bairro' => trim($dataRegister['bairro']),
					'id_cidade' => trim($dataRegister['id_cidade']),
					'comprovante_bancario' => trim($dataRegister['comprovante_bancario']),
					'certificados' => trim($dataRegister['certificados']));
				
				$res = $this->Crud_model->Update('produtor',$dataModel, array('id_produtor' => $dataId));
				
				if($res):
					$this->output->set_status_header('200');
					return;
				endif;
			endif;

		else:
			$this->output->set_status_header('400');
		endif;

	}

	//Delete registro
	public function Remove(){
		
		$nivel_user = 2;

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
			
			$dataId = (int)$this->uri->segment(5);
			
			if ($dataId > 0):

				$res = $this->Crud_model->Delete('produtor',array('id_produtor' => $dataId));
				
				if($res):
					$res = $this->Crud_model->Delete('propriedade',array('id_produtor' => $dataId));
					
					$this->output->set_status_header('200');
					
					return;
				endif;
			endif;

		else:
			$this->output->set_status_header('400');
		endif;

	}

}