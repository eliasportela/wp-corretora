<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function index()
	{
	
		//Filtros dos pedidos novos
		if($this->input->get("visualizado") == 1){
			$data['optionVisualizado'] = 1;
			$visualizado = '1=1';
		}else{
			$data['optionVisualizado'] = 0;
			$visualizado = 'visualizado = 0';
		}

		//Filtros dos contatos (abertos / finalizados)
		if($this->input->get("finalizado") == 1){
			$data['optionFinalizado'] = 1;
		}else{
			$data['optionFinalizado'] = 0;
		}

		//Filtros da data do contatos
		if($this->input->get("data")){
			$data['optionData'] = $this->input->get('data');
			$dataFiltro = "DATE(data_contato) = '".$this->input->get('data')."'";
		}else{
			$data['optionData'] = '';
			$dataFiltro = "1=1";
		}

		//sql busca
		$sql = 'SELECT id_contato, DATE_FORMAT(data_contato, "%d-%m") as data_contato, DATE_FORMAT(data_contato, "%h:%i") as hora_contato, nome_contato, referencia_imovel, email FROM contato where fg_ativo = 1 and finalizado = '. $data['optionFinalizado'].' and '.$visualizado.' and '.$dataFiltro.' order by data_contato desc';

		$data['pedidos'] = $this->Crud_model->Query($sql);

		//die(var_dump($sql));

		$menu['id_page'] = 5;
		$header['title'] = 'Dash | Pedidos';
		$header['page'] = '1';

		$this->load->view('dashboard/template/commons/header',$header);
		$this->load->view('dashboard/template/commons/menu',$menu);
		$this->load->view('dashboard/pedido/home',$data);
		$this->load->view('dashboard/template/commons/footer');
	}

	//recebe os pedidos do site
	public function EnviarPedido()
	{
		if($this->input->post()){
			
			$dataRegister = $this->input->post();
			
			if ($dataRegister['nome'] or $dataRegister['telefone'] or $dataRegister['email'] or $dataRegister['mensagem']) {
				

				//Validacao da pagina "Contato" e "detalhes-imovel"
				//ASSUNTO
				if (isset($dataRegister['assunto'])) {
					$assunto = $dataRegister['assunto'];
				}
				else{
					$assunto = "Solicitação de contato";
				}

				//REFERENCIA IMOVEL
				if ($dataRegister['imovel']) {
					$referencia = $dataRegister['imovel'];
				}
				else{
					$referencia = 0;
				}

				#inserir no banco
				$dataModel = array('referencia_imovel' => $referencia,
									'assunto' =>  $assunto,
									'email' => $dataRegister['email'],
									'nome_contato' => $dataRegister['nome'],
									'telefone' => $dataRegister['telefone'],
									'texto' => $dataRegister['mensagem']
								);

				//print_r($dataModel);
				
				$res = $this->Crud_model->Insert('contato',$dataModel);
				
				if ($res) {
					$this->output->set_status_header('200');
				}else{
					$this->output->set_status_header('500');
				}	
			}
		}
	}

	public function BuscarPedido()
	{
		if($this->input->get('id')){
			$idContato = (int) $this->input->get('id');
			$sql = "SELECT c.id_contato, c.referencia_imovel, c.finalizado, c.assunto, c.nome_contato, c.telefone, c.texto, c.email, DATE_FORMAT(c.data_contato, '%d-%m') as data_contato, DATE_FORMAT(c.data_contato, '%h:%i') as hora_contato, i.img_imovel FROM contato c INNER JOIN imovel i ON (i.referencia_imovel = c.referencia_imovel) WHERE c.fg_ativo = 1 and c.id_contato = $idContato";
			$data = $this->Crud_model->Query($sql);
			if ($data) {
				$data = $data[0];
				$json = json_encode($data,JSON_UNESCAPED_UNICODE);
				echo $json;
			}else{
				$this->output->set_status_header('204');
			}
		}
		else{
			$this->output->set_status_header('500');
		}
	}

	public function NotificacaoPedido()
	{
		$sql = "SELECT COUNT(*) as qtd FROM contato WHERE visualizado = 0 and fg_ativo = 1";
		$data = $this->Crud_model->Query($sql);
		if ($data) {
		 	$data = $data[0];
		 	$json = json_encode($data,JSON_UNESCAPED_UNICODE);
			echo $json;
		 }else{
		 	$this->output->set_status_header('500');
		 }
	}

	public function VisualizacaoPedido()
	{
		if($this->input->get('id')){
			$idContato = (int) $this->input->get('id');
			$par = array('id_contato' => $idContato);
			$dataModel = array('visualizado' => 1);
			$data = $this->Crud_model->Update('contato',$dataModel,$par);
			if ($data) {
				$this->output->set_status_header('200');
			}
			else{
				$this->output->set_status_header('500');
			}
		}
		else{
			$this->output->set_status_header('500');
		}
	}

	public function finalizarPedido()
	{
		if($this->input->get('id')){	
			//id do contato
			$idContato = (int) $this->input->get('id');
			$par = array('id_contato' => $idContato);
			
			//1 para finalizar e o resto para reabrir contato
			$parametro = (int) $this->input->get('par');
			if ($parametro == 1) {
				$dataModel = array('finalizado' => 1);	
			}else{
				$dataModel = array('finalizado' => 0);	
			}

			$data = $this->Crud_model->Update('contato',$dataModel,$par);
			
			if ($data) {
				echo "1";
				$this->output->set_status_header('200');
			}
			else{
				$this->output->set_status_header('500');
			}
		}
		else{
			$this->output->set_status_header('500');
		}
	}

}