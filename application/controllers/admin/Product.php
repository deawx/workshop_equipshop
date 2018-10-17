<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model','product_m');
	}

	public function index()
	{
		$method = $this->input->get('method');
		if ($method === 'delete')
		{
			$product_id = $this->input->get('id');
			if ($product_id)
			{
				$this->product_m->delete($product_id);
			}
			$field_name = $this->input->get('field');
			$file_name = $this->input->get('file');
			if ($field_name && $file_name)
			{
				$this->product_m->delete_file($field_name,$file_name);
			}
			redirect('admin/product');
		}
		$this->data['products'] = $this->product_m->search_where('','tb_product')->result_array();
		$this->data['body'] = $this->load->view('admin/product/index',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function add_product($product_id=FALSE)
	{
		$this->form_validation->set_rules('name','','required|alpha_numeric');
		$this->form_validation->set_rules('price','','required|numeric|max_length[4]');
		$this->form_validation->set_rules('detail','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			if ($_FILES['file1']['error'] === UPLOAD_ERR_OK)
			{
				$post['file1'] = $this->do_upload('file1');
			}
			if ($_FILES['file2']['error'] === UPLOAD_ERR_OK)
			{
				$post['file2'] = $this->do_upload('file2');
			}
			if ($_FILES['file3']['error'] === UPLOAD_ERR_OK)
			{
				$post['file3'] = $this->do_upload('file3');
			}
			if ($_FILES['file4']['error'] === UPLOAD_ERR_OK)
			{
				$post['file4'] = $this->do_upload('file4');
			}
			$this->product_m->save($post);
			redirect('admin/product');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		if ($product_id)
		{
			$this->data['product'] = $this->product_m->search_id($product_id)->row_array();
		}
		$this->data['body'] = $this->load->view('admin/product/form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	protected function do_upload($input_name)
	{
		if ( ! $input_name)
		{
			return FALSE;
		}

		$upload = array(
			'allowed_types'	=> 'jpg|jpeg|png',
			'upload_path'	=> FCPATH.'uploads/product',
			'file_ext_tolower' => TRUE,
			'encrypt_name' => TRUE
		);
		$this->load->library('upload');
		$this->upload->initialize($upload);

		if ($this->upload->do_upload($input_name))
		{
			return $this->upload->data('file_name');
		}
		else
		{
			$this->data['message']['warning'] = $this->upload->display_errors();
		}
	}

}
