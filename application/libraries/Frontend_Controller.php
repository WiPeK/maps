<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('place_m');
		$this->data['ustawienia'] = $this->place_m->get_ust();
	}

}

/* End of file Frontend_Controller.php */
/* Location: ./application/controllers/Frontend_Controller.php */