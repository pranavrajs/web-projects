<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tedx extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user');
    }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('front');
		$this->load->view('footer');
	}
	public function speaker()
	{
		$this->load->view('header');	
		$this->load->view('spkrside');
		$this->load->view('coming');
		$this->load->view('footer');	
	}
	public function crew()
	{
		$this->load->view('header');
		$this->load->view('crewside');
		
		$this->load->view('crew');			
		$this->load->view('footer');	
	}
	public function register()
	{
		$this->load->view('header');	
		$this->load->view('tkside');
		$this->load->view('regform');
		$this->load->view('footer');	
	}
	public function partner()
	{
		$this->load->view('header');	
		$this->load->view('ptside');
		$this->load->view('coming');
		$this->load->view('footer');	
	}
	public function contactus()
	{
		
		$this->load->view('header');	
		$this->load->view('ctside');
		$this->load->view('contact');	
		$this->load->view('footer');	
	}
	 public function reg()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[4]');		
		$this->form_validation->set_rules('age', 'age', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('sex', 'sex', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('q1', 'q1', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('q2', 'q2', 'trim');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run() == FALSE)
		{
			$this->register();
		}	
		else
		{
			$this->user->add_entry();
			$data['title']= 'Registration Success';
			$this->load->view('header',$data);
			$this->load->view('tkside',$data);
			$this->load->view('regsuc',$data);
			$this->load->view('footer',$data);
		}
	}
	
}