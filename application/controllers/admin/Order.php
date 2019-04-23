<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model','order_m');
		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'));
	}

	public function index()
	{
		$this->config->load('pagination',TRUE);
		$pagination = $this->config->item('pagination');
		$config	= array(
			'base_url' => 'order',
			'per_page' => $pagination['per_page'],
			'total_rows' => $this->db->count_all('tb_order')
		);
		$this->pagination->initialize($config);
		$orders = $this->order_m->search_where(
			($this->input->get('status')) ? $this->input->get() : NULL,
			'tb_order',
			$pagination['per_page'],
			($this->input->get($pagination['query_string_segment'])) ? $this->input->get($pagination['query_string_segment']) : 0,
			'id DESC'
		)->result_array();

		$status = $this->db->distinct()->select('status')->get('tb_order')->result_array();
		$this->data['status'] = array_column($status,'status');
		$this->data['orders'] = $orders;
		$this->data['body'] = $this->load->view('admin/order/index',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function view($order_id)
	{
		$this->form_validation->set_rules('tracking_number','','alpha_numeric|max_length[20]');
		if ($this->form_validation->run() === TRUE)
		{
			$post = $this->input->post();
			if ($this->order_m->save($post,'tb_order'))
			{
				$this->data['message']['success'] = 'บันทึกข้อมูลเสร็จสิ้น';
				redirect('admin/order');
			}
			else
			{
				$this->data['message']['warning'] = 'บันทึกข้อมูลล้มเหลว ลองใหม่อีกครั้ง';
			}
		}
		else
		{
			$this->data['message']['warning'] = validation_errors();
		}

		$this->data['order'] = $this->order_m->get_order($order_id);
		$this->data['body'] = $this->load->view('admin/order/form',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

	public function print_qr($order_id)
	{
		$qrcode = array();
		$order = $this->db
			->select('id')
			->where_in('order_id',$order_id)
			->get('tb_order_detail');
		if ($order->num_rows())
		{
			$order = $order->result_array();
			$detail = array_column($order,'id');
			$qrcode = $this->db
				->select('qr_code,firstname,lastname')
				->where_in('order_detail_id',$detail)
				->get('tb_order_detail_data')
				->result_array();
		}

		$this->data['qrcode'] = $qrcode;
		$this->load->view('admin/order/print',$this->data);
	}

}
