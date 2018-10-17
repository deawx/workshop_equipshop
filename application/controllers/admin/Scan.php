<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->config->load('pagination',TRUE);
		$pagination = $this->config->item('pagination');
		$config	= array(
			'base_url' => 'scan',
			'per_page' => $pagination['per_page'],
			'total_rows' => $this->db->count_all('tb_scan')
		);
		$this->pagination->initialize($config);
		$this->data['scan'] = $this->db
			->limit($pagination['per_page'])
			->offset(($this->input->get($pagination['query_string_segment'])) ? $this->input->get($pagination['query_string_segment']) : 0)
			->order_by('id DESC')
			->get('tb_scan')
			->result_array();

		$this->data['body'] = $this->load->view('admin/scan/index',$this->data,TRUE);
		$this->load->view('_layouts/admin',$this->data);
	}

}
