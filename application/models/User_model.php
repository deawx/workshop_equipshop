<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function login($username,$password)
  {
    return FALSE;
  }

  public function login_admin($username,$password)
  {
    return FALSE;
  }

  public function register($userdata)
  {
  }

  public function edit($user_id)
  {
  }

  public function change_password($user_id,$old_password,$new_password)
  {
  }

  public function delete($user_id)
  {
  }

  public function logout()
  {
  }

}
