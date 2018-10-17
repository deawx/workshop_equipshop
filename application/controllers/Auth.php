<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->data['navbar'] = $this->load->view('_partials/navbar_blank',$this->data,TRUE);
    $this->load->model('User_model','user_m');
  }

  public function index()
  {
    $this->login();
  }

  public function login()
  {
    if (isset($this->data['session']['is_login']))
    {
      redirect();
    }

    $this->form_validation->set_rules('username','ชื่อผู้ใช้','required');
    $this->form_validation->set_rules('password','รหัสผ่าน','required');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      unset($post['password_confirm']);
      $userdata = $this->user_m->login($post['username'],$post['password']);
      if ($userdata)
      {
        $userdata['is_login'] = TRUE;
        $this->session->set_userdata($userdata);
        $this->data['message']['success'] = 'Login success.';
        redirect();
      }
      else
      {
        $this->data['message']['info'] = 'ไม่พบข้อมูล';
      }
    }
    else
    {
      $this->data['message']['warning'] = validation_errors();
    }
    $this->data['body'] = $this->load->view('auth/login',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

  public function login_admin()
  {
    if (isset($this->data['session']['is_login']))
    {
      redirect();
    }

    $this->form_validation->set_rules('username','ชื่อผู้ใช้','required');
    $this->form_validation->set_rules('password','รหัสผ่าน','required');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      $userdata = $this->user_m->login_admin($post['username'],$post['password']);
      if ($userdata)
      {
        $userdata['is_login'] = TRUE;
        $userdata['is_admin'] = TRUE;
        $this->session->set_userdata($userdata);
        $this->data['message']['success'] = 'Admin login success.';
        redirect();
      }
      else
      {
        $this->data['message']['info'] = 'ไม่พบข้อมูล';
      }
    }
    else
    {
      $this->data['message']['warning'] = validation_errors();
    }
    $this->data['body'] = $this->load->view('auth/login_admin',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

  public function register()
  {
    if (isset($this->data['session']['is_login']))
    {
      redirect();
    }

    $this->form_validation->set_rules('firstname','ชื่อ','required');
    $this->form_validation->set_rules('lastname','นามสกุล','required');
    $this->form_validation->set_rules('username','ชื่อผู้ใช้','required|is_unique[tb_user.username]');
    $this->form_validation->set_rules('password','รหัสผ่าน','required|alpha_numeric|max_length[8]');
    $this->form_validation->set_rules('password_confirm','รหัสผ่าน(ยืนยัน)','required|matches[password]');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      unset($post['password_confirm']);
      $userdata = $this->user_m->register($post);
      if ($userdata)
      {
        $this->data['message']['success'] = 'Register success';
      }
      redirect('auth/login');
    }
    else
    {
      $this->data['message']['warning'] = validation_errors();
    }
    $this->data['body'] = $this->load->view('auth/register',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

  public function logout()
  {
    $this->user_m->logout();
    redirect();
  }

}
