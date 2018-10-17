<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

  public $table_name = 'tb_user';

  public function __construct()
  {
    parent::__construct();
  }

  public function login($username,$password)
  {
    return $this->db
      ->where(array(
        'username' => $username,
        'password' => $password
      ))
      ->get('tb_user')
      ->row_array();
  }

  public function login_admin($username,$password)
  {
    return $this->db
      ->where(array(
        'username' => $username,
        'password' => $password
      ))
      ->get('tb_admin')
      ->row_array();
  }

  public function register($userdata,$tablename='tb_user')
  {
    $userdata['created'] = date('Y-m-d H:i:s');
    $this->db->insert($tablename,$userdata);
    return $this->db->affected_rows();
  }

  public function edit($userdata,$tablename='tb_user')
  {
    $this->db
      ->set($userdata)
      ->where('id',$userdata['id'])
      ->update($tablename);

    return $this->db->affected_rows();
  }

  public function delete($user_id,$tablename='tb_user')
  {
    if ($user_id === '1' && $tablename === 'tb_admin')
    {
      redirect('admin/user/admins');
    }
    $this->db->delete($tablename,array('id'=>$user_id));
  }

  public function logout()
  {
    $this->session->sess_destroy();
  }

}
