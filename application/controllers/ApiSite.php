<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiSite extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(['mycrud']);
	} 

	public function Bairros()
	{

		if ($this->input->get("id")){
			$dataModel = array('id_cidade' => $this->input->get("id"));

			$res = $this->mycrud->ReadPar('bairro',$dataModel);
			if ($res) {
				echo $this->mycrud->ReadPar('bairro',$dataModel);
			}

		}else{
			echo "Erro na estrutura do pedido. Consulte o manual da API";
		}

	}


	//imovel pela id
	public function Imovel()
	{

		if ($this->input->get("id")){
			$imovel = $this->input->get("id");	

			$sql = "SELECT i.id_imovel, i.referencia_imovel, i.id_endereco_imovel, i.preco_imovel, i.id_finalidade, i.id_tipo_imovel, i.img_imovel, i.disponibilidade, i.destaque_imovel, e.cep, e.id_logradouro, e.ds_logradouro, e.numero, e.complemento, c.id_cidade, d.detalhes, d.area, d.n_banheiro, d.n_cozinha, d.n_suite, d.n_dormitorio, d.n_vagas_garagem, d.n_sala, d.url_maps
				from imovel i
				JOIN endereco_imovel e ON (e.id_endereco_imovel = i.id_endereco_imovel)
				JOIN detalhes_imovel d ON (d.id_detalhes_imovel = i.id_detalhes_imovel)
                JOIN bairro b ON (b.id_bairro = e.id_bairro)
				JOIN cidade c ON (c.id_cidade = b.id_cidade)
				WHERE i.id_imovel = $imovel
				ORDER by i.id_imovel";

			$data = $this->Crud_model->Query($sql);
			
			if ($data) {
				$json = json_encode($data,JSON_UNESCAPED_UNICODE);
				echo $json;
			}else{
				echo "Nenhum imóvel encontrado";
			}

		}else{
			echo "Erro na estrutura do pedido. Consulte o manual da API";
		}

	}


	//galeria de imagens do imovel
	public function GaleriaImovel()
	{

		if ($this->input->get("id")){
			$imovel = $this->input->get("id");	

			$par = array('id_imovel' => $imovel);
			$data = $this->Crud_model->ReadPar('galeria_imagem',$par);
			
			if ($data) {
				$json = json_encode($data,JSON_UNESCAPED_UNICODE);
				echo $json;
			}else{
				echo "";
			}

		}else{
			echo "Erro na estrutura do pedido. Consulte o manual da API";
		}

	}

	//conteudo do site
	public function ConteudoSite()
	{

		if ($this->input->get("id")){
			$conteudo = $this->input->get("id");	

			$par = array('id_conteudo' => $conteudo);
			$data = $this->Crud_model->ReadPar('texto_conteudo',$par);
			
			if ($data) {
				$json = json_encode($data,JSON_UNESCAPED_UNICODE);
				echo $json;
			}else{
				echo "";
			}

		}else{
			echo "Erro na estrutura do pedido. Consulte o manual da API";
		}

	}

	

}