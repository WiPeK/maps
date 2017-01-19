<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('place_m');
		$this->load->model('user_m');
		$this->load->library('email', array(
    		'mailtype' => 'html',
    		'protocol' => 'smtp',
    		'smtp_host' => 'ssl://smtp.gmail.com',
    		'smtp_port' => '465',
    		'smtp_timeout' => '7',
    		'smtp_user' => 'fchgcvghv',
    		'smtp_pass' => 'hjghjghhj',
    		'charset' => 'utf-8',
    		'newline' => "\r\n",
    	));
	}

	public function index()
	{
		$this->data['places'] = $this->place_m->get_places();
		$this->data['home'] = true;
		$this->data['subview'] = 'front/include/home';
		$this->load->view('front/template', $this->data);
	}

	public function logowanie()
	{
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);

		$this->load->helper('security');

			if($this->form_validation->run() == TRUE)
			{
				if($this->user_m->login() === true)
				{
					$this->session->set_userdata('message_kat', 'Zalogowano pomyślnie!');
					redirect(site_url());
				}
				else
				{
					$this->session->set_userdata('message_kat', 'Coś poszło nie tak!');
					redirect(site_url());
				}
			}
			else
			{
				$this->session->set_userdata('message_kat', 'Logowanie zakończone niepowodzeniem.');
		        redirect(site_url());
			}
	}

	public function logout()
	{
		$this->user_m->logout();
	}

	public function kontakt()
	{
		$rules = $this->user_m->rules_con;
		$this->form_validation->set_rules($rules);

		$this->load->helper('security');

			if($this->form_validation->run() == TRUE)
			{
					//wyslanie emaila
		    		$this->email->from($this->input->post('email'), $this->data['ustawienia']->name);
		    		$this->email->to($this->data['ustawienia']->email);
		    		$this->email->subject($this->data['ustawienia']->name . " - Formularz kontaktowy");
		    		$message = 'E-MAIL: ' . $this->input->post('email') . '<br>';
		    		$message .= 'TREŚC WIADOMOŚCI: <br>' . $this->input->post('body') . '<br>';
		    		$this->email->message($message);

		    		if($this->email->send())
		    		{
						$this->session->set_userdata('message_kat', 'Email został wysłany pomyślnie. Dziękujemy za kontakt i postaramy się odpowiedzieć tak szybko jak to możliwe.');
						redirect(site_url('home/kontakt'));
		    		}
		    		else
		    		{
		    			$this->session->set_userdata('message_kat', 'Coś poszło nie tak. Spróbuj ponownie.');
						redirect(site_url('home/kontakt'));
		    		}
			}
			else
			{
				$this->data['subview'] = 'front/include/kontakt';
				$this->load->view('front/template', $this->data);
			}

	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */