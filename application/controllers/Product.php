<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model','product_m');
	}

	public function index($category_id=FALSE)
	{
		// $this->data['product_all'] = $this->product_m->search_where(array('category'=>$category_id))->result_array();
		$this->data['body'] = $this->load->view('product/index',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function view($product_id=FALSE)
	{
		if ( ! $product_id)
		{
			redirect('product');
		}
		// $this->data['product'] = $this->product_m->search_id($product_id)->row_array();
		$this->data['body'] = $this->load->view('product/view',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function cart()
	{
		$get = $this->input->get();
		if ($get)
		{
		}
		$post = $this->input->post();
		if ($post)
		{
		}
		$this->data['body'] = $this->load->view('product/cart',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	protected function cart_insert()
	{
	}

	protected function cart_update($product_id)
	{
	}

	protected function cart_delete($product_id)
	{
	}

	protected function cart_confirm()
	{
	}

	protected function cart_cancel()
	{
	}

}
