<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('admin/user/users');
	}

	public function users($user_id=FALSE)
	{
		if ($user_id)
		{
			$this->data['user'] = array();
			$this->data['body'] = $this->load->view('admin/user/form',$this->data,TRUE);
		}
		else
		{
			$this->data['users'] = array();
			$this->data['body'] = $this->load->view('admin/user/index',$this->data,TRUE);
		}
		$this->load->view('_layouts/admin',$this->data);
	}

	public function admins($user_id=FALSE)
	{
		if ($user_id)
		{
			$this->data['user'] = array();
			$this->data['body'] = $this->load->view('admin/user/form_admin',$this->data,TRUE);
		}
		else
		{
			$this->data['users'] = array();
			$this->data['body'] = $this->load->view('admin/user/index_admin',$this->data,TRUE);
		}
		$this->load->view('_layouts/admin',$this->data);
	}

}
