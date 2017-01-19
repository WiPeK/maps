<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model {

	public $rules = array(
		'login' => array(
			'field' => 'login',
			'label' => 'Login',
			'rules' => 'trim|xss_clean|required|min_length[4]'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]'
		),
	);

	public $rules_con = array(
		'email' => array(
			'field' => 'email',
			'label' => 'ADRES E-MAIL',
			'rules' => 'trim|xss_clean|required|valid_email'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'TREŚĆ WIADOMOŚCI',
			'rules' => 'trim|xss_clean|required|min_length[6]'
		),
	);

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$login = $this->input->post('login');
		$password = '*' . strtoupper(sha1(sha1($this->input->post('password'),true)));


		$query = $this->db->query("SELECT * FROM users WHERE login='$login' AND password='$password'");

		if($query->num_rows() === 1)
		{
			//log in user
			$data = array(
				'login' => $query->row('login'),
				'loggedin' => TRUE,
			);
			$this->last_log_in($login);
			$this->session->set_userdata($data);
			return TRUE;
		}
		else
			return FALSE;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_userdata('message_kat', 'Wylogowano pomyślnie.');
		redirect(site_url());
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function last_log_in($login)
	{
		$data = date('Y-m-d H:i:s');
		$query = "UPDATE users SET last_login = $data WHERE login='$login'";
	}

}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */