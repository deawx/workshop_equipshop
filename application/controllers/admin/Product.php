<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->data['product_all'] = $this->product_m->search_where(array('category'=>$category_id))->result_array();
		$this->data['body'] = $this->load->view('admin/product/index',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function view($product_id)
	{
		// $this->data['product'] = $this->product_m->search_id($product_id)->row_array();
		$this->data['body'] = $this->load->view('admin/product/form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

}
