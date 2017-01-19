<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addplace extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('place_m');
		$this->load->helper('string');
	}

	public function index()
	{
		$this->data['icons'] = $this->place_m->get_icons();

		$this->data['subview'] = 'front/include/addplace';
		$this->load->view('front/template', $this->data);
	}

	public function save_place()
	{
		$rules = $this->place_m->rules;
		$this->form_validation->set_rules($rules);
		
		if($this->input->post('submit'))
		{
			$title_ni = do_hash(random_string('alpha', 16));
			$config = array(
				'upload_path' => realpath(APPPATH . '../assets/place_photos/'),
				'allowed_types' => 'jpg|jpeg|gif|png',
				'max_size' => 3000,
				'remove_spaces' => true,
				'overwrite' => true,
				'quality' => '100',
				'file_name' => $title_ni,
			);

			$this->load->library('upload', $config);
			
			// Process the form
			if ($this->form_validation->run() == TRUE) 
			{

				if($this->upload->do_upload('placeph'))
				{
					$data_img = array('upload_data' => $this->upload->data());
					$file = $data_img['upload_data']['file_name'];
					$file_ext = $data_img['upload_data']['file_ext'];
					$data['logo'] = 'assets/place_photos/' . $title_ni . $data_img['upload_data']['file_ext'];
				}

				if($this->place_m->save($data)){
					$this->cache->clean();
					$this->session->set_userdata('message_kat', 'Miejsce zostało dodane. (Czekaj aż zostanie zaakceptowane przez administratora.)');
					redirect(site_url('Addplace'));
				}
				else{
					$this->session->set_userdata('message_kat', 'Miejsce nie zostało zapisane w bazie danych ;(');
					redirect(site_url('Addplace'));
				}	
			}
			else
			{
				$this->session->set_userdata('message_kat', 'Zdjęcie nie zostało dodane!');

				redirect(site_url('Addplace')); 
			}
		}
		else
			redirect(site_url('Addplace'));
	}

}

/* End of file Addplace.php */
/* Location: ./application/controllers/Addplace.php */