<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->data['errors'] = array();

		$this->load->driver('cache', array('adapter' => 'file'));
		$this->load->library('form_validation');
		$this->load->library('session');
		
	}

	//definicja skryptów

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */