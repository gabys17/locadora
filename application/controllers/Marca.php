<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MarcaModel");
		$this->load->library("form_validation");
	}

	public function index() 
	{
		$marca=new MarcaModel;
		$data['marca']=$marca->get_marca();
		$this->load->view('marca/list', $data);

	}

	public function create()
	{
		if($this->input->post()) {
			$this->store();
		}
		$this->load->view('marca/create');
	}

	private function store()
	{
		if ($this->MarcaModel->validation() == false) {
			$this->session->set_flashdata("erro", "Erro de validação");
			redirect(base_url('marca/create'));
			
		} else {
			
			$id_marca = $this->input->post('id_marca');
			
			$data = array(
				'nome_marca' => $this->input->post('nome_marca'),
				'cnpj' => $this->input->post('cnpj'),
				'rua' => $this->input->post('rua'),
				'bairro' => $this->input->post('bairro'),
				'numero' => $this->input->post('numero'),
				'telefone' => $this->input->post('telefone'),
				'email' => $this->input->post('email')
			);

			if ($this->MarcaModel->insert_marca($data, $id_marca)) {
				redirect(base_url('marca'));

			} else {
				$this->load->view('marca/create');
			}	
		}

	}

	public function edit($id_marca)
   {
       $marca = $this->db->get_where('marca', array('id_marca' => $id_marca))->row();
       $this->load->view('marca/edit',array('marca'=>$marca));
   }

   public function update($id_marca)
   {
       $veiculos=new MarcaModel;
       $veiculos->update_marca($id_marca);
       redirect(base_url('marca'));
   }

   public function delete()
   {
	   if($this->input->post()){
		   $this->db->where('id_marca', $this->input->post('id_marca'));
		   $this->db->delete('marca');
		   $result=$this->db->affected_rows()>0 ? true : false;
		   echo json_encode(array('status' => $result));
	   }
   }
}
