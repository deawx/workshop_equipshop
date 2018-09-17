<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['dashboard'] = array();
		$this->data['body'] = $this->load->view('admin/index',$this->data,TRUE);

		$this->load->view('_layouts/admin',$this->data);
	}

}
