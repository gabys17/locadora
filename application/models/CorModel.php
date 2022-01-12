<?php

class CorModel extends CI_Model {

	public function get_cor(){

		if(!empty($this->input->get("search"))){
			$this->db->like('nome_cor', $this->input->get("search"));
		}
		$query = $this->db->get("cor");
		return $query->result();
	}

	public function insert_cor()
    { 
		if(! $this->get_nome($this->input->post('nome_cor'))) {
			$data = array(
				'nome_cor' => $this->input->post('nome_cor')
			);
			return $this->db->insert('cor', $data);
		} else {
			return FALSE;
		}  
    }
    public function update_cor($id_cor) 
    {
		if(! $this->get_nome($this->input->post('nome_cor'))) {
			$data=array(
				'nome_cor' => $this->input->post('nome_cor'),
			);
			$this->db->where('id_cor', $id_cor);
			return $this->db->update('cor',$data);
		}else {
			return FALSE;
		}
                
    }

	public function get_nome($nome_cor, $id=NULL)
	{
		$result = $this->db->select('*')->from('cor');
		if($id) {
			$result->where('id !=', $id);
		}
		$result->where('nome_cor', $nome_cor);
		
		return $result->get()->row();
	}

	public function validation()
	{    
		$this->form_validation->set_rules("nome_cor", "Nome", "required|min_length[2]|max_length[50]");         
		$this->form_validation->set_error_delimiters("<label class='label label-danger'>", "</label>");         
		return $this->form_validation->run() ? true : false;     
	}
}
