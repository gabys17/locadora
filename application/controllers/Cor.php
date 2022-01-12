<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cor extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CorModel");
		$this->load->library("form_validation");
	}

	public function index() 
	{
		$veiculos=new CorModel;
		$data['data']=$veiculos->get_cor();
		$this->load->view('cor/list', $data);

	}

	public function create()
	{
		if($this->input->post()) {
			$this->store();
		}
		$this->load->view('cor/create');
	}

	private function store()
	{
		if ($this->CorModel->validation() == false) {
			$this->session->set_flashdata("erro", "Erro de validação");
			redirect(base_url('cor/create'));

		} else {
			
			$id = $this->input->post('id_cor');
			
			$data = array(
				'nome_cor' => $this->input->post('nome_cor')
			);

			if ($this->CorModel->insert_cor($data, $id)) {
				redirect(base_url('cor'));

			} else {
				$this->load->view('cor/create');
			}	
		}

	}

	public function edit($id_cor)
   {
       $cor = $this->db->get_where('cor', array('id_cor' => $id_cor))->row();
       $this->load->view('cor/edit',array('cor'=>$cor));
   }

   public function update($id_cor)
   {
       $cor=new CorModel;
       $cor->update_cor($id_cor);
       redirect(base_url('cor'));
   }

   public function delete()
   {
	   if($this->input->post()){
		   $this->db->where('id_cor', $this->input->post('id_cor'));
		   $this->db->delete('cor');
		   $result=$this->db->affected_rows()>0 ? true : false;
		   echo json_encode(array('status' => $result));
	   }
   }
}
