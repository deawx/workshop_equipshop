<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$qr_code = $this->input->get('qr_code');
		$id_card = $this->input->get('id_card');
		$this->form_validation->set_data(array('qr_code'=>$qr_code,'id_card'=>$id_card));
		$this->form_validation->set_rules('qr_code','','required');
		$this->form_validation->set_rules('id_card','','required|integer|exact_length[13]');
		if ($this->form_validation->run() === TRUE)
		{
			$exist_qr = $this->db
				->where('qr_code',$qr_code)
				->get('tb_order_detail_data');
			if ($exist_qr->num_rows())
			{
				$this->db->insert('tb_scan',array(
					'qr_code' => $qr_code,
					'id_card' => $id_card,
					'datetime' => date('Y-m-d H:i:s')
				));
				if ($this->db->affected_rows())
				{
					$this->data['checkin_success'] = $this->db
						->where('qr_code',$qr_code)
						->get('tb_order_detail_data')
						->row_array();
				}
			}
			else
			{
				$this->data['message']['warning'] = 'ไม่พบข้อมูลรหัสคิวอาร์โค้ด';
			}
		}

		$this->data['tracking'] = $this->db
			->where('tracking_number IS NOT NULL')
			->where_in('status',array('2','3'))
			->get('tb_order',10)
			->result_array();

		$this->data['body'] = $this->load->view('welcome',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function tracking()
	{
		$this->load->library('pagination');
		$this->config->load('pagination',TRUE);
		$pagination = $this->config->item('pagination');
		$tracking = $this->db
			->where('tracking_number IS NOT NULL')
			->where('status >','1')
			->limit('25')
			->offset(($pagination['query_string_segment']) ? $pagination['query_string_segment'] : 0)
			->order_by('id DESC')
			->get('tb_order');
		$config	= array(
			'per_page' => '25',
			'total_rows' => $tracking->num_rows()
		);
		$this->pagination->initialize($config);
		$this->data['tracking'] = $tracking->result_array();

		$this->data['body'] = $this->load->view('tracking',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function howto()
	{
		$this->data['howtos'] = $this->db->get('tb_howto')->result_array();
		$this->data['body'] = $this->load->view('howto',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

	public function contact()
	{
		$this->data['contact'] = $this->db->get('tb_contact')->row_array();
		$this->data['body'] = $this->load->view('contact',$this->data,TRUE);
		$this->load->view('_layouts/fullwidth',$this->data);
	}

}
