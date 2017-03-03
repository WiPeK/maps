<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->user_m->loggedin() == FALSE) redirect(site_url());

		$this->data['admin'] = true;
	}

	public function manage_place()
	{	
		$this->data['adminmap'] = true;
		$this->data['places_wait'] = $this->place_m->get_wait();
		$this->data['places_acc'] = $this->place_m->get_places();
		$this->data['subview'] = 'front/include/manage';
		$this->load->view('front/template', $this->data);
	}

	public function delete_place($id)
	{
		$place = $this->place_m->get_place($id);
		
		//unlink(realpath(APPPATH) . '../' . $place->photo);
		unlink($place->photo);
		
		$this->place_m->delete($id);
		$this->cache->clean();
		$this->session->set_userdata('message_kat', 'Miejsce: ' . $place->title . ' zostało usunięte.');
		redirect('admin/manage_place/');
	}

	public function accept_place($id)
	{
		$this->place_m->accept_place($id);
		$this->session->set_userdata('message_kat', 'Miejsce zostało zaakceptowane.');
		redirect('admin/manage_place/');
	}

	public function dec_place($id)
	{
		$this->place_m->dec_place($id);
		$this->session->set_userdata('message_kat', 'Miejsce zostało przeniesione do oczekujących.');
		redirect('admin/manage_place/');
	}

	public function show_place($id)
	{
		$this->data['place'] = $this->place_m->get_place($id);
		$this->data['subview'] = 'front/include/admin_map';
		$this->load->view('front/template', $this->data);
	}

	public function ustawienia()
	{
		$this->data['adminmap'] = true;
		$this->data['subview'] = 'front/include/ustawienia';
		$this->load->view('front/template', $this->data);
	}

	public function save_ust()
	{
		$rules = $this->place_m->rules_ust;
		$this->form_validation->set_rules($rules);

		$this->load->helper('security');

			if($this->form_validation->run() == TRUE)
			{
				if($this->place_m->save_ust() === true)
				{
					$this->session->set_userdata('message_kat', 'Zapisano nowe ustawienia!');
					redirect(site_url('admin/ustawienia'));
				}
				else
				{
					$this->session->set_userdata('message_kat', 'Nie zapisano nowych ustawień!');
					redirect(site_url('admin/ustawienia'));
				}
			}
			else
			{
				$this->session->set_userdata('message_kat', 'Ustawienie nie zostały zapisane!');
		        redirect(site_url('admin/ustawienia'));
			}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
