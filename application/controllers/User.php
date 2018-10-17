<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Private_Controller {

  private $user_id;

  public function __construct()
  {
    parent::__construct();
    $this->user_id = $this->data['session']['id'];
    $this->load->model('User_model','user_m');
  }

  public function index()
  {
    $this->form_validation->set_rules('firstname','ชื่อ','required');
    $this->form_validation->set_rules('lastname','นามสกุล','required');
    $this->form_validation->set_rules('password','รหัสผ่าน','alpha_numeric|max_length[8]');
    $this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','matches[password]');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      if ($post['password'] === '')
      {
        unset($post['password']);
      }
      unset($post['password_confirm']);
      if (isset($this->data['session']['is_admin']))
      {
        if ($post)
        {
          $post['id'] = $this->user_id;
          $this->user_m->edit($post,'tb_admin');
          $this->data['message']['primary'] = 'บันทึกข้อมูลเรียบร้อย';
        }
      }
      else
      {
        if ($post)
        {
          $post['id'] = $this->user_id;
          $this->user_m->edit($post);
          $this->data['message']['primary'] = 'บันทึกข้อมูลเรียบร้อย';
        }
      }
    }
    else
    {
      $this->data['message']['primary'] = validation_errors();
    }

    if (isset($this->data['session']['is_admin']))
    {
      $user = $this->user_m->search_id($this->user_id,'tb_admin')->row_array();
    }
    else
    {
      $user = $this->user_m->search_id($this->user_id,'tb_user')->row_array();
    }
    $this->data['user'] = $user;
    $this->data['body'] = $this->load->view('user/index',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

}
