<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['navbar'] = '';
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

    $this->form_validation->set_rules('username','username','required');
    $this->form_validation->set_rules('password','password','required');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      $userdata = $this->user_m->login($post['username'],$post['password']);
      if ($userdata)
      {
        $this->data['session'] = $userdata;
        $this->data['session']['is_login'] = TRUE;
        $this->data['message']['success'] = '';
      }
      else
      {
      }
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

    $this->form_validation->set_rules('username','username','required');
    $this->form_validation->set_rules('password','password','required');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      $userdata = $this->user_m->login($post['username'],$post['password']);
      if ($userdata)
      {
        $this->data['session'] = $userdata;
        $this->data['session']['is_login'] = TRUE;
        $this->data['message']['success'] = '';
      }
      else
      {
      }
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

    $this->form_validation->set_rules('firstname','','required');
    $this->form_validation->set_rules('lastname','','required');
    $this->form_validation->set_rules('username','','required');
    $this->form_validation->set_rules('password','','required');
    if ($this->form_validation->run() === TRUE)
    {
      $post = $this->input->post();
      $userdata = $this->user_m->register($post);
      if ($userdata)
      {
      }
      else
      {
      }
    }
    $this->data['body'] = $this->load->view('auth/register',$this->data,TRUE);
    $this->load->view('_layouts/fullwidth',$this->data);
  }

  public function logout()
  {
    $this->user_m->logout();
  }

}
