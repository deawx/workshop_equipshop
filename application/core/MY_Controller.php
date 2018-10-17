<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data['session'] = $this->session->userdata();

    // $this->data['css'] = array(link_tag('assets/css/datepicker.min.css'));
    // $this->data['js'] = array(script_tag('assets/js/datepicker.min.js'),script_tag('assets/js/datepicker.th.min.js'));
  }

}

class Public_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('cart');
    $this->data['cart'] = $this->cart->contents();

    $this->data['js'] = array(script_tag('assets/js/common.js'));
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
    $this->data['footer'] = $this->load->view('_partials/footer',NULL,TRUE);
  }

}

class Private_Controller extends Public_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( ! $this->data['session']['is_login'])
    {
      redirect('auth/logout');
    }
    $this->data['navbar'] = $this->load->view('_partials/navbar_blank',$this->data,TRUE);
  }

}

class Admin_Controller extends Private_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( ! $this->data['session']['is_admin'])
    {
      redirect('auth/logout');
    }
    $this->load->library('pagination');
  }

}
