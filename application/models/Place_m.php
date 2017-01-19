<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place_m extends CI_Model {

	public $rules = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'Tytul', 
			'rules' => 'trim|required|xss_clean'
		), 
		'strona' => array(
			'field' => 'strona', 
			'label' => 'Strona www', 
			'rules' => 'trim|required'
		),
		'opis' => array(
			'field' => 'opis', 
			'label' => 'Opis', 
			'rules' => 'trim|required|xss_clean'
		),
	);

	public $rules_ust = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Nazwa', 
			'rules' => 'trim|required|xss_clean'
		), 
		'description' => array(
			'field' => 'description', 
			'label' => 'Opis', 
			'rules' => 'trim|xss_clean'
		),
		'keywords' => array(
			'field' => 'keywords', 
			'label' => 'Słowa kluczowe', 
			'rules' => 'trim|xss_clean'
		),
		'gmail_log' => array(
			'field' => 'gmail_log', 
			'label' => 'Login', 
			'rules' => 'trim|valid_email|xss_clean'
		),
		'gmail_pass' => array(
			'field' => 'gmail_pass', 
			'label' => 'Hasło', 
			'rules' => 'xss_clean'
		),
	);

	public function __construct()
	{
		parent::__construct();		
	}

	public function save($data)
	{

		$arr = array(
			'lat' => $this->input->post('lat'),
			'lng' => $this->input->post('lng'),
			'title' => $this->input->post('title'),
			'photo' => $data['logo'],
			'url' => $this->input->post('strona'),
			'opis' => $this->input->post('opis'),
			'ip' => $this->input->ip_address(),
			'icon' => $this->input->post('iconin'),
		);

		$this->db->insert('places', $arr);
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_icons()
	{
		$icons = array_diff(scandir(realpath(APPPATH . '../assets/icons/')), array('.', '..'));
		return $icons;
	}

	public function get_places()
	{
		$query = $this->db->query("SELECT * FROM places WHERE status = 1");
		return $query->result();
	}

	public function get_wait()
	{
		$query = $this->db->query("SELECT * FROM places WHERE status = 0");
		return $query->result();
	}

	public function get_place($id)
	{
		$query = $this->db->query("SELECT * FROM places WHERE id='$id' LIMIT 1");
		return $query->row();
	}

	public function delete($id)
	{
		$query = $this->db->query("DELETE FROM places WHERE id='$id'");
	}

	public function accept_place($id)
	{
		$query = $this->db->query("UPDATE places SET status = 1 WHERE id = $id");
	}

	public function dec_place($id)
	{
		$query = $this->db->query("UPDATE places SET status = 0 WHERE id = $id");
	}

	public function get_ust()
	{
		$query = $this->db->query("SELECT * FROM ustawienia");
		return $query->row();
	}

	public function save_ust()
	{
		if(!empty($pass = $this->input->post('gmail_pass'))){
			$pass = $this->input->post('gmail_pass');
		}
		else{
			$query = $this->db->query("SELECT gmail_pass FROM ustawienia");
			$a = $query->row('gmail_pass');
			if(!empty($a)){
				$pass = $a;
			}
			else{
				$pass = $this->input->post('gmail_pass');
			}	
		}

		$data  = array(
			'name' => $this->input->post('name'),
			'gmail_log' => $this->input->post('gmail_log'),
			'gmail_pass' => $pass,
			'description' => $this->input->post('description'),
			'keywords' => $this->input->post('keywords'),
		);

		$this->db->where('id', 1);
		$this->db->update('ustawienia', $data);
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else return false;
	}

}

/* End of file Place_m.php */
/* Location: ./application/models/Place_m.php */