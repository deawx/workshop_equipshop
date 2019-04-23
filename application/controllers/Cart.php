<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Private_Controller {

	private $user_id;

	public function __construct()
	{
		parent::__construct();
		$this->user_id = $this->data['session']['id'];
		$this->load->model('Order_model','order_m');
		$this->load->model('Product_model','product_m');
	}

	public function index()
	{
		$this->form_validation->set_rules('qty','','integer|max_length[2]');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			foreach ($post as $_pd => $pd)
			{
				$this->cart->update(array(
					'rowid' => $pd['rowid'],
					'qty' => $pd['qty']
				));
			}
			redirect('cart');
		}
		// http request method get
		$get = $this->input->get();
		if (isset($get['method']))
		{
			switch ($get['method'])
			{
				case 'insert':
				if (intval($get['product_id']) > 0)
				{
					$this->cart_insert($get['product_id']);
				}
				break;
				case 'remove':
				if (strlen($get['rowid']) > 0)
				{
					$this->cart_remove($get['rowid']);
				}
				break;
				case 'destroy':
				$this->cart_destroy();
				break;
			}
			redirect('cart');
		}
		// load normal view
		$this->data['body'] = $this->load->view('cart/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function cart_detail()
	{
		if ($post = $this->input->post())
		{
			$options = array();
			foreach ($post as $_p => $p)
			{
				// $this->form_validation->set_rules('[lastname]','','required');
				// $this->form_validation->set_rules('[id_card]','','required|exact_length[13]');
				// $this->form_validation->set_rules('[phone]','','required');
				// $this->form_validation->set_rules('[d]','','required');
				// $this->form_validation->set_rules('[m]','','required');
				// $this->form_validation->set_rules('[y]','','required');
				// $this->form_validation->set_rules('[gender]','','required');
				// $this->form_validation->set_rules('[blood]','','required');
				// $this->form_validation->set_rules('[height]','','required');
				// $this->form_validation->set_rules('[weight]','','required');
				// $this->form_validation->set_rules('[latitude]','','required');
				// $this->form_validation->set_rules('[longtitude]','','required');
				// $this->form_validation->set_rules('[nationality]','','required');
				// $this->form_validation->set_rules('[religion]','','required');
				// $this->form_validation->set_rules('[hospital]','','required');
				// if ($this->form_validation->run() === TRUE)
				// {
					$rowid = $p['rowid'];
					$p['birthdate'] = $p['y'].'-'.$p['m'].'-'.$p['d'];
					$p['picture'] = $this->cart_upload('file'.$_p);
					unset($p['rowid']);
					unset($p['id']);
					unset($p['y']);
					unset($p['m']);
					unset($p['d']);
					$options[$rowid][] = $p;
				// }
				// else
				// {
				// 	$this->data['message']['warning'] = validation_errors();
				// }
			}
			foreach ($options as $_op => $op)
			{
				$this->cart->update(array(
					'rowid' => $_op,
					'options' => $op
				));
			}
			redirect('cart/cart_address');
			// die();
		}

		$this->data['body'] = $this->load->view('cart/cart_detail',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function cart_address()
	{
		$this->form_validation->set_rules('fullname','','required');
		$this->form_validation->set_rules('phone','','required|integer|exact_length[10]');
		$this->form_validation->set_rules('address','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			$post['user_id'] = $this->user_id;
			$post['total_quantity'] = $this->cart->total_items();
			$post['total_price'] = $this->cart->total();
			$post['created'] = date('Y-m-d H:i:s');
			$this->order_m->save($post,'tb_order');
			echo $this->db->last_query();
			echo '<br>';
			if ($order_id = $this->db->insert_id())
			{
				foreach ($this->data['cart'] as $_ct => $ct)
				{
					$product = array(
						'order_id' => $order_id,
						'product_id' => $ct['id'],
						'quantity' => $ct['qty'],
						'total_price' => $ct['subtotal']
					);
					$this->order_m->save($product,'tb_order_detail');
					echo $this->db->last_query();
					echo '<br>';
					if ($detail_id = $this->db->insert_id())
					{
						foreach ($ct['options'] as $_ot => $ot)
						{
							$ot['order_detail_id'] = $detail_id;
							if ($this->order_m->save($ot,'tb_order_detail_data'))
							{
								$insert_id = $this->db->insert_id();
								$this->order_m->save(array(
									'id' => $insert_id,
									'qr_code' => $insert_id.'-'.$ot['id_card']
								),'tb_order_detail_data');
							}
							echo $this->db->last_query();
							echo '<br>';
						}
					}
				}
			}
			// dump_debug($this->data['cart']);
			// die();
			$this->cart_destroy();
			redirect('cart/history');
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		$this->data['addresses'] = $this->db->select('address')->where('user_id',$this->user_id)->get('tb_order')->result_array();
		$this->data['banks'] = $this->order_m->get_bank();
		$this->data['body'] = $this->load->view('cart/cart_address',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function history($order_id=FALSE)
	{
		if (intval($order_id) > 0)
		{
			$this->data['order'] = $this->order_m->get_order($order_id);
			$this->data['body'] = $this->load->view('cart/view',$this->data,TRUE);
		}
		else
		{
			$history = $this->order_m->search_where(array('user_id'=>$this->user_id),'tb_order');
			$this->data['history'] = $history->result_array();
			$this->data['body'] = $this->load->view('cart/history',$this->data,TRUE);
		}
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function confirm()
	{
		$this->form_validation->set_rules('order_id','','required');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			if ($post['transfer_slip'] = $this->cart_upload('file'))
			{
				$this->db
					->set('transfer_slip',$post['transfer_slip'])
					->where('id',$post['order_id'])
					->update('tb_order');
				$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
				redirect('cart/history');
			}
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		$this->data['order'] = $this->db
			->where('user_id',$this->user_id)
			->get('tb_order')
			->result_array();

		$this->data['body'] = $this->load->view('cart/confirm',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function receipt($order_id)
	{
		$this->data['order'] = $this->order_m->get_order($order_id);
		$this->load->view('cart/receipt',$this->data);
	}

	protected function cart_insert($product_id)
	{
		$product = $this->product_m->search_id($product_id)->row_array();
		$this->cart->insert(array(
			'id'      => $product['id'],
			'qty'     => 1,
			'price'   => $product['price'],
			'name'    => $product['name'],
			'options' => array()
		));
	}

	protected function cart_remove($rowid)
	{
		$this->cart->remove($rowid);
	}

	protected function cart_destroy()
	{
		$this->cart->destroy();
	}

	protected function cart_upload($fileinput_name)
	{
		$upload = array(
			'allowed_types'	=> 'jpeg|jpg|png',
			'upload_path'	=> FCPATH.'uploads/order',
			'file_ext_tolower' => TRUE,
			'encrypt_name' => TRUE
		);
		$this->load->library('upload');
		$this->upload->initialize($upload);

		if ($this->upload->do_upload($fileinput_name))
		{
			return $this->upload->data('file_name');
		}
		else
		{
			$this->data['message']['info'] = $this->upload->display_errors();
		}

		return FALSE;
	}

}
