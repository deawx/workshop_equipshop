<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user_m');
	}

	public function index()
	{
		$user = $this->user_m->search_where();

		$this->data['user'] = $this->table->generate($user);
		$this->data['body'] = $this->load->view('admin/user',$this->data,TRUE);

		$this->load->view('_layouts/boxed',$this->data);
	}

}
