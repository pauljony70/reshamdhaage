<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('removeSpecialCharacters')) {

	function removeSpecialCharacters($value)
	{
		if (is_string($value)) {
			if (!is_JSON($value)) {

				$value = str_replace('"', '&quot;', $value);
				$value = str_replace("'", '&#039;', $value);
				$value = str_replace("\\", '', $value);
				$value = str_replace("<", '&lt;', $value);
				$value = str_replace(">", '&gt;', $value);
			} else {
				$value = str_replace("<", '&lt;', $value);
				$value = str_replace(">", '&gt;', $value);
			}
		}
		return trim($value);
	}
}

if (!function_exists('get_settings')) {

	function get_settings($type)
	{

		$CI = get_instance();
		$CI->load->database();
		$des = $CI->db->get_where('settings', array('type' => $type))->row('description');

		return $des;
	}
}

if (!function_exists('get_store_settings')) {

	function get_store_settings($type)
	{

		$CI = get_instance();
		$CI->load->database();
		$des = $CI->db->get('store_setting',)->row($type);

		return $des;
	}
}
