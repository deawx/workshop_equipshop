<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends MY_Model {

  public $table_name = 'tb_order';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_order($order_id)
  {
    $order = $this->db
      ->where('id',$order_id)
      ->order_by('id','desc')
      ->get('tb_order')
      ->row_array();
    $order['order_detail'] = $this->db
      ->select('odd.*,odd.id AS detail_id,pd.*,pd.id AS product_id')
      ->where('odd.order_id',$order_id)
      ->join('tb_product AS pd','pd.id=odd.product_id')
      ->get('tb_order_detail AS odd')
      ->result_array();
    foreach ($order['order_detail'] as $_odd => $odd)
    {
      $order['order_detail'][$_odd]['order_detail_data'] = $this->db
        ->where('order_detail_id',$odd['detail_id'])
        ->get('tb_order_detail_data')
        ->result_array();
    }

    return $order;
  }

  public function get_bank()
  {
    return $this->db->get('tb_bank')->result_array();
  }

}
