<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user_m');
	}

	public function index()
	{
		redirect('admin/user/users');
	}

	public function add_user()
	{
		$this->form_validation->set_rules('firstname','ชื่อ','required');
		$this->form_validation->set_rules('lastname','นามสกุล','required');
		$this->form_validation->set_rules('username','ชื่อผู้ใช้','required|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password','รหัสผ่าน','required|alpha_numeric|exact_length[8]');
		$this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','required|matches[password]');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			unset($post['password_confirm']);
			$this->user_m->register($post);
			$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
			redirect('admin/user/users');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}
		$this->data['body'] = $this->load->view('admin/user/form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function add_admin()
	{
		$this->form_validation->set_rules('firstname','ชื่อ','required');
		$this->form_validation->set_rules('lastname','นามสกุล','required');
		$this->form_validation->set_rules('username','ชื่อผู้ใช้','required|is_unique[tb_admin.username]');
		$this->form_validation->set_rules('password','รหัสผ่าน','required|alpha_numeric|exact_length[8]');
		$this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','required|matches[password]');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			unset($post['password_confirm']);
			$this->user_m->register($post,'tb_admin');
			$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
			redirect('admin/user/admins');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}
		$this->data['body'] = $this->load->view('admin/user/form_admin',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function users($user_id=FALSE)
	{
		$delete = $this->input->get('method');
		if ($delete === 'delete')
		{
			$delete_id = $this->input->get('id');
			$this->user_m->delete($delete_id,'tb_user');
			redirect('admin/user/users');
		}
		if ($user_id)
		{
			$this->form_validation->set_rules('firstname','ชื่อ','required');
			$this->form_validation->set_rules('lastname','นามสกุล','required');
			$this->form_validation->set_rules('password','รหัสผ่าน','alpha_numeric|exact_length[8]');
			$this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','matches[password]');
			if ($this->form_validation->run() === TRUE)
			{
				$post = $this->input->post();
				if ($post['password'] === '')
				{
					unset($post['password']);
				}
				unset($post['password_confirm']);
				$this->user_m->edit($post);
				redirect('admin/user/users');
			}
			$this->data['user'] = $this->user_m->search_where(array('id'=>$user_id),'tb_user')->row_array();
			$this->data['body'] = $this->load->view('admin/user/form',$this->data,TRUE);
		}
		else
		{
			$this->data['users'] = $this->user_m->search_where('','tb_user')->result_array();
			$this->data['body'] = $this->load->view('admin/user/index',$this->data,TRUE);
		}
		$this->load->view('_layouts/admin',$this->data);
	}

	public function admins($user_id=FALSE)
	{
		$delete = $this->input->get('method');
		if ($delete === 'delete')
		{
			$delete_id = $this->input->get('id');
			$this->user_m->delete($delete_id,'tb_admin');
			redirect('admin/user/admins');
		}
		if ($user_id)
		{
			$this->form_validation->set_rules('firstname','ชื่อ','required');
			$this->form_validation->set_rules('lastname','นามสกุล','required');
			$this->form_validation->set_rules('password','รหัสผ่าน','alpha_numeric|exact_length[8]');
			$this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','matches[password]');
			if ($this->form_validation->run() === TRUE)
			{
				$post = $this->input->post();
				if ($post['password'] === '')
				{
					unset($post['password']);
				}
				unset($post['password_confirm']);
				$this->user_m->edit($post,'tb_admin');
				redirect('admin/user/admins');
			}
			$this->data['admin'] = $this->user_m->search_where(array('id'=>$user_id),'tb_admin')->row_array();
			$this->data['body'] = $this->load->view('admin/user/form_admin',$this->data,TRUE);
		}
		else
		{
			$this->data['admins'] = $this->user_m->search_where('','tb_admin')->result_array();
			$this->data['body'] = $this->load->view('admin/user/index_admin',$this->data,TRUE);
		}
		$this->load->view('_layouts/admin',$this->data);
	}

}
