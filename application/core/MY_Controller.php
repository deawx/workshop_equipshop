<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data['session'] = $this->session->userdata();
    // $this->data['message'] = array();
  }

}

class Public_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->data['navbar'] = $this->load->view('_partials/navbar',NULL,TRUE);
    $this->data['footer'] = $this->load->view('_partials/footer',NULL,TRUE);
  }

}

class Private_Controller extends Public_Controller {

  public function __construct()
  {
    parent::__construct();
  }

}

class Admin_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $table_config = array(
      'table_open' => '<table class="table table-hover">',
      'thead_open' => '<thead class="thead-light">'
    );
    $this->load->library('table',$table_config);
  }

}
