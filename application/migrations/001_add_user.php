<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_user extends CI_Migration {

  private $tb_name = 'user';

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 6,
        'unsigned' => TRUE,
        'auto_increment' =>TRUE,
        'null' => FALSE
      ),
      'fullname' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      ),
      'created' => array(
        'type' => 'DATETIME'
      ),
      'modified' => array(
        'type' => 'DATETIME'
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table($this->tb_name,TRUE);
  }

  public function down()
  {
    $this->dbforge->drop_table($this->tb_name);
  }

}
