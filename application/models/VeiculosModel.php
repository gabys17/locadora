<?php

class VeiculosModel extends CI_Model {

	public function get_veiculos(){

		$this->db->select('*');
		$this->db->from('veiculos');
		$this->db->join('marca', 'marca.id_marca = veiculos.id_marca', 'left');
		$this->db->join('cor', 'cor.id_cor = veiculos.id_cor', 'left');
		$query = $this->db->get();


		if(!empty($this->input->get("search"))){
			$this->db->like('nome', $this->input->get("search"));
		}
		return $query->result();
	}

	public function insert_veiculos($data, $id)
    { 
		if(! $this->get_chassiEplaca($this->input->post('chassi'), $this->input->post('placa'))) {
			return $this->db->insert('veiculos', $data);
		} else {
			return FALSE;
		}  
    }
	
    public function update_veiculos($id, $data) 
    {
		if(! $this->get_chassiEplaca($this->input->post('chassi'), $this->input->post('placa'), $id)) {
			
			$this->db->where('id',$id);
			return $this->db->update('veiculos',$data);
		}else {
			return FALSE;
		}
                
    }

	public function get_chassiEplaca($chassi, $placa, $id=NULL)
	{
		$result = $this->db->select('*')->from('veiculos');
		if($id) {
			$result->where('id !=', $id);
		}
		$result->group_start();
		$result->where('chassi', $chassi);
		$result->or_where('placa', $placa);
		$result->group_end();
		return $result->get()->row();
	}

	public function validation()
	{    
		$this->form_validation->set_rules("nome_marca", "Marca", "required|min_length[2]|max_length[50]");         
		$this->form_validation->set_rules("chassi", "Chassi", "required|min_length[17]|max_length[50]");         
		$this->form_validation->set_rules("placa", "Placa", "required|min_length[7]|max_length[50]");         
		$this->form_validation->set_rules("numero_portas", "Numero de portas", "required|min_length[1]|max_length[50]");         
		$this->form_validation->set_rules("nome_cor", "Cor", "required|min_length[2]|max_length[50]");
		$this->form_validation->set_error_delimiters("<label class='label label-danger'>", "</label>");         
		return $this->form_validation->run() ? true : false;     
	}
}
