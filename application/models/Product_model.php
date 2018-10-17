<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

  public $table_name = 'tb_product';

  public function __construct()
  {
    parent::__construct();
  }

  public function delete($product_id)
  {
    $product = $this->db
      ->where('id',$product_id)
      ->get($this->table_name);
    if ($product->num_rows())
    {
      $product = $product->row_array();
      $this->delete_file('file1',$product['file1'],FALSE);
      $this->delete_file('file2',$product['file2'],FALSE);
      $this->delete_file('file3',$product['file3'],FALSE);
      $this->delete_file('file4',$product['file4'],FALSE);
      $this->db->delete($this->table_name,array('id' => $product_id));
    }
    return TRUE;
  }

  public function delete_file($field_name,$file_name,$update=TRUE)
  {
    unlink('uploads/product/'.$file_name);
    if ($update === TRUE)
    {
      $this->db
        ->set(array($field_name => ''))
        ->where($field_name,$file_name)
        ->update($this->table_name);
    }
    return TRUE;
  }

}
