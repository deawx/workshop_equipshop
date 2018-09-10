<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['body'] = $this->load->view('index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
