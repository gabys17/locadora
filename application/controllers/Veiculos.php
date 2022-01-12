<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculos extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('VeiculosModel', 'MarcaModel', 'CorModel'));
		$this->load->library("form_validation");
	}

	public function index() 
	{
		$veiculos=new VeiculosModel;
		$data['data']=$veiculos->get_veiculos();
		$this->load->view('veiculos/list', $data);

	}

	public function create()
	{
		if($this->input->post()) {
			$this->store();
		}
		$marca=new MarcaModel;
		$cor=new CorModel;
		$data['marca']=$marca->get_marca();
		$data['cor']=$cor->get_cor();
		$this->load->view('veiculos/create', $data);
	}

	private function store()
	{
		if (!$this->VeiculosModel->validation() == false) {
			$this->session->set_flashdata("erro", "Erro de validação");
			redirect(base_url('veiculos/create'));
			
		} else {
			
			$id = $this->input->post('id');
			$data = array(
			
				"id_marca" => $this->input->post('id_marca'),
				"chassi" => $this->input->post('chassi'),
				"placa" => $this->input->post('placa'),
				"numero_portas" => $this->input->post('numero_portas'),
				"id_cor" => $this->input->post('id_cor')
			
			);
			if ($this->VeiculosModel->insert_veiculos($data, $id)) {
				redirect(base_url('veiculos'));

			} else {
				$this->load->view('veiculos/create');
			}	
		}

	}

	public function edit($id)
   {
       	$data['veiculo'] = $this->db->get_where('veiculos', array('id' => $id))->row();
	   	$marca=new MarcaModel;
		$cor=new CorModel;
		$data['marca']=$marca->get_marca();
		$data['cor']=$cor->get_cor();
       	$this->load->view('veiculos/edit', $data);
   }

   public function update($id)
   {
		$data=array(
			'id_marca' => $this->input->post('id_marca'),
			'chassi'=> $this->input->post('chassi'),
			'placa' => $this->input->post('placa'),
			'numero_portas' => $this->input->post('numero_portas'),
			'id_cor' => $this->input->post('id_cor')
		);

       $veiculos=new VeiculosModel;
       $veiculos->update_veiculos($id, $data);
       redirect(base_url('veiculos'));
   }

   public function delete()
   {
	   if($this->input->post()){
		   $this->db->where('id', $this->input->post('id'));
		   $this->db->delete('veiculos');
		   $result=$this->db->affected_rows()>0 ? true : false;
		   echo json_encode(array('status' => $result));
	   }
   }
}
