<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['body'] = $this->load->view('index',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function howto()
	{
		$this->data['body'] = $this->load->view('howto',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function status()
	{
		$this->data['body'] = $this->load->view('status',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function contact()
	{
		$this->data['body'] = $this->load->view('contact',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

}
