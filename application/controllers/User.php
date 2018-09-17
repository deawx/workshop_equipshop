<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Private_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model','user_m');
  }

  public function index($profile_id=FALSE)
  {
    $this->data['user'] = $this->user_m->search_id($profile_id)->row_array();
    $this->data['body'] = $this->load->view('user/index',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

}
