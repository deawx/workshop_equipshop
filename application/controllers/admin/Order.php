<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['order'] = array();
		$this->data['body'] = $this->load->view('admin/order/index',$this->data,TRUE);

		$this->load->view('_layouts/admin',$this->data);
	}

}
