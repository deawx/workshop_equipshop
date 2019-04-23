<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$qr_code = ($this->input->get('qr_code')) ? $this->input->get('qr_code') : '';
		// $start = ($this->input->get('start')) ? $this->input->get('start') : '';
		// $end = ($this->input->get('end')) ? $this->input->get('end') : date('Y-m-d');

		$scan = $this->db
			->like('qr_code',$qr_code);
			// ->where('date(datetime) >=',date('Y-m-d',strtotime($start)))
			// ->where('date(datetime) <=',date('Y-m-d',strtotime($end)));

		$this->config->load('pagination',TRUE);
		$pagination = $this->config->item('pagination');
		$config	= array(
			'base_url' => "scan?qr_code=".$qr_code,
			// 'base_url' => "scan?start=$start&end=$end",
			'per_page' => $pagination['per_page'],
			'total_rows' => $scan->count_all_results('tb_scan')
		);
		$this->pagination->initialize($config);

		$this->data['scan'] = $this->db
			->like('qr_code',$qr_code)
			// ->where('date(datetime) >=',date('Y-m-d',strtotime($start)))
			// ->where('date(datetime) <=',date('Y-m-d',strtotime($end)))
			->limit($pagination['per_page'])
			->offset(($this->input->get($pagination['query_string_segment'])) ? $this->input->get($pagination['query_string_segment']) : 0)
			->order_by('id DESC')
			->get('tb_scan')
			->result_array();

		$this->data['body'] = $this->load->view('admin/scan/index',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

}
