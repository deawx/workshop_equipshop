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
		$mobile_number = $this->input->get('mobile_number');
		$this->form_validation->set_data(array(
			'qr_code' => $qr_code,
			'id_card' => $id_card,
			'mobile_number' => $mobile_number
		));
		if ($this->input->get())
		{
			$this->form_validation->set_rules('qr_code','คิวอาร์โค้ด','required');
			$this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|numeric|exact_length[13]');
			$this->form_validation->set_rules('mobile_number','หมายเลขโทรศัพท์มือถือ','required|numeric|exact_length[10]');
			if ($this->form_validation->run() == TRUE)
			{
				$exist_qr = $this->db
					->where('qr_code',$qr_code)
					->get('tb_order_detail_data');
				if ($exist_qr->num_rows())
				{
					$this->db->insert('tb_scan',array(
						'qr_code' => $qr_code,
						'id_card' => $id_card,
						'mobile_number' => $mobile_number,
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
			->where('tracking_number <>','')
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

	public function valid_idcard($id_card)
	{
		if ($id_card)
		{
			$sum = 0;
			for ($i=0; $i<12; $i++)
			{
				//Sum of each digit
				$digitValue = substr($id_card, $i, 1);
				$digitId = substr($id_card, $i, 1);
				$sum += (int)($digitValue) * (int)($digitId);
			}

			$digit13 = substr($id_card, 12, 1);
			if ( (11-($sum%11)) % 10 === (int)($digit13))
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('valid_idcard', 'ข้อมูล หมายเลขบัตรประชาชน ไม่ตรงตามมาตรฐานที่กำหนด');
				return FALSE;
			}

		}
	}

}
