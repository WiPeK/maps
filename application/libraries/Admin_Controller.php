<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['subview'] = '';
		$this->load->model('user_m');

	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */