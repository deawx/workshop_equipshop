<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_number'))
{
	function form_number($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'number',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('dropdown_title'))
{
	function dropdown_title()
	{
		$title = array(
			'นาย'=>'นาย',
			'นาง'=>'นาง',
			'นางสาว'=>'นางสาว'
		);

		return $title;
	}
}

if ( ! function_exists('dropdown_month'))
{
	function dropdown_month($key='')
	{
		$months = array(
			'1' => 'มกราคม','2' => 'กุมภาพันธ์',
			'3' => 'มีนาคม','4' => 'เมษายน',
			'5' => 'พฤษภาคม','6' => 'มิถุนายน',
			'7' => 'กรกฎาคม','8' => 'สิงหาคม',
			'9' => 'กันยายน','10' => 'ตุลาคม',
			'11' => 'พฤศจิกายน','12' => 'ธันวาคม'
		);

		$key = ltrim($key,'0');

		if (intval($key) > 0)
			return $months[$key];

		return $months;
	}
}

if ( ! function_exists('dropdown_province'))
{
	function dropdown_province($key='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$provinces = $_ci->db->get('province')->result_array();
		$province = array(''=>'เลือกจังหวัด');
		foreach ($provinces as $_p => $p)
		{
		  $province[$p['id']] = $p['name'];
		}

		$key = ltrim($key,'0');

		if (intval($key) > 0)
			return $province[$key];

		return $province;
	}
}

if ( ! function_exists('dropdown_amphur'))
{
	function dropdown_amphur($province_id='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$amphurs = $_ci->db->get('amphur')->result_array();
		$amphur = array(''=>'เลือกอำเภอ');
		foreach ($amphurs as $_a => $a)
		{
		  $amphur[$a['id']] = $a['name'];
		}

		$province_id = ltrim($province_id,'0');

		if (intval($province_id) > 0)
			return $amphur[$province_id];

		return $amphur;
	}
}

if ( ! function_exists('dropdown_district'))
{
	function dropdown_district($amphur_id='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$districts = $_ci->db->get('district')->result_array();
		$district = array(''=>'เลือกตำบล');
		foreach ($districts as $_a => $a)
		{
		  $district[$a['id']] = $a['name'];
		}

		$amphur_id = ltrim($amphur_id,'0');

		if (intval($amphur_id) > 0)
			return $district[$amphur_id];

		return $district;
	}
}
