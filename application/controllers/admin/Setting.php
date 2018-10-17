<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model','setting_m');
	}

	public function index()
	{
	}

	public function bank_form($bank_id=FALSE)
	{
		$this->form_validation->set_rules('bank','','required');
		$this->form_validation->set_rules('name','','required');
		$this->form_validation->set_rules('account','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			if ($_FILES['picture']['error'] === UPLOAD_ERR_OK)
			{
				$post['picture'] = $this->do_upload('bank','picture');
			}
			$this->setting_m->save($post,'tb_bank');
			$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
			redirect('admin/setting/bank');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		if (is_numeric($bank_id))
		{
			$this->data['bank'] = $this->db
				->where('id',$bank_id)
				->get('tb_bank')
				->row_array();
		}

		$this->data['body'] = $this->load->view('admin/setting/bank_form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function bank()
	{
		$method = $this->input->get('method');
		if ($method === 'delete')
		{
			$bank_id = $this->input->get('id');
			if ($bank_id)
			{
				$this->setting_m->remove($bank_id,'tb_bank');
			}
			$file_name = $this->input->get('file');
			if ($file_name)
			{
				$this->db
					->set(array('picture' => ''))
					->where('picture',$file_name)
					->update('tb_bank');
			}
			redirect('admin/setting/bank');
		}

		$this->data['banks'] = $this->db
			->order_by('id','DESC')
			->get('tb_bank')
			->result_array();
		$this->data['body'] = $this->load->view('admin/setting/bank',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function howto_form($howto_id=FALSE)
	{
		$this->form_validation->set_rules('title','','required|is_unique[tb_howto.title]');
		$this->form_validation->set_rules('description','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			if ($_FILES['picture']['error'] === UPLOAD_ERR_OK)
			{
				$post['picture'] = $this->do_upload('howto','picture');
			}
			$this->setting_m->save($post,'tb_howto');
			$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
			redirect('admin/setting/howto');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		if (is_numeric($howto_id))
		{
			$this->data['howto'] = $this->db
			->where('id',$howto_id)
			->get('tb_howto')
			->row_array();
		}

		$this->data['body'] = $this->load->view('admin/setting/howto_form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function howto()
	{
		$method = $this->input->get('method');
		if ($method === 'delete')
		{
			$howto_id = $this->input->get('id');
			if ($howto_id)
			{
				$this->setting_m->remove($howto_id,'tb_howto');
			}
			$file_name = $this->input->get('file');
			if ($file_name)
			{
				$this->db
				->set(array('picture' => ''))
				->where('picture',$file_name)
				->update('tb_howto');
			}
			redirect('admin/setting/howto');
		}

		$this->data['howtos'] = $this->db
			->order_by('id','DESC')
			->get('tb_howto')
			->result_array();

		$this->data['body'] = $this->load->view('admin/setting/howto',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function contact()
	{
		$this->form_validation->set_rules('address','','required');
		$this->form_validation->set_rules('email','','required|valid_email');
		$this->form_validation->set_rules('phone','','required|integer|exact_length[10]');
		$this->form_validation->set_rules('facebook','','required');
		$this->form_validation->set_rules('line','','required');
		$this->form_validation->set_rules('latitude','','required');
		$this->form_validation->set_rules('longtitude','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			$this->setting_m->save($post,'tb_contact');
			$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
			redirect('admin/setting/contact');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		$this->data['contact'] = $this->db->get('tb_contact')->row_array();
		$this->data['body'] = $this->load->view('admin/setting/contact',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	protected function do_upload($folder,$input_name)
	{
		if ( ! $input_name)
		{
			return FALSE;
		}

		$upload = array(
			'allowed_types'	=> 'jpg|jpeg|png',
			'upload_path'	=> FCPATH.'uploads/'.$folder,
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
