<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Product_model','product_m');
	}

	public function index()
	{
		$this->data['products'] = $this->product_m->search_where('','tb_product')->result_array();
		$this->data['body'] = $this->load->view('product/index',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function view($product_id=FALSE)
	{
		if ( ! $product_id)
		{
			redirect('product');
		}
		$this->data['product'] = $this->product_m->search_id($product_id)->row_array();
		$this->data['product_other'] = $this->product_m->search_where('','tb_product','4','','RAND(4)')->result_array();
		$this->data['body'] = $this->load->view('product/view',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

}
