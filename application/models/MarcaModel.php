<?php

class MarcaModel extends CI_Model {

	public function get_marca(){

		if(!empty($this->input->get("search"))){
			$this->db->like('marca_nome', $this->input->get("search"));
		}
		$query = $this->db->get("marca");
		return $query->result();
	}

	public function insert_marca()
    { 
		if(! $this->get_cnpj($this->input->post('cnpj'))) {
			$data = array(
				'nome_marca' => $this->input->post('nome_marca'),
				'cnpj' => $this->input->post('cnpj'),
				'rua' => $this->input->post('rua'),
				'bairro' => $this->input->post('bairro'),
				'numero' => $this->input->post('numero'),
				'telefone' => $this->input->post('telefone'),
				'email' => $this->input->post('email')
			);

			return $this->db->insert('marca', $data);
		} else {
			return FALSE;
		}  
    }
    public function update_marca($id_marca) 
    {
		if(! $this->get_cnpj($this->input->post('cnpj'), $id_marca)) {
			$data=array(
				'nome_marca' => $this->input->post('nome_marca'),
				'cnpj' => $this->input->post('cnpj'),
				'rua' => $this->input->post('rua'),
				'bairro' => $this->input->post('bairro'),
				'numero' => $this->input->post('numero'),
				'telefone' => $this->input->post('telefone'),
				'email' => $this->input->post('email')
			);
			$this->db->where('id_marca',$id_marca);
			return $this->db->update('marca',$data);
		}else {
			return FALSE;
		}
                
    }

	public function get_cnpj($cnpj, $id=NULL)
	{
		$result = $this->db->select('*')->from('marca');
		if($id_marca) {
			$result->where('id !=', $id);
		}

		$result->where('cnpj', $cnpj);

		return $result->get()->row();
	}

	public function validation()
	{    
		$this->form_validation->set_rules("nome_marca", "Nome_marca", "required|min_length[2]|max_length[50]");         
		$this->form_validation->set_rules("cnpj", "CNPJ", "required|min_length[14]|max_length[18]");         
		$this->form_validation->set_rules("rua", "Rua", "required|min_length[5]|max_length[100]");         
		$this->form_validation->set_rules("bairro", "Bairro", "required|min_length[5]|max_length[50]");         
		$this->form_validation->set_rules("numero", "numero", "required|min_length[1]|max_length[50]");
		$this->form_validation->set_rules("telefone", "telefone", "required|min_length[1]|max_length[50]");
		$this->form_validation->set_rules("email", "email", "required|min_length[1]|max_length[50]");
		$this->form_validation->set_error_delimiters("<label class='label label-danger'>", "</label>");         
		return $this->form_validation->run() ? true : false;     
	}
}
