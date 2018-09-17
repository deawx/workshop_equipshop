<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['export'] = array();
		$this->data['body'] = $this->load->view('admin/export/index',$this->data,TRUE);

		$this->load->view('_layouts/admin',$this->data);
	}

}
