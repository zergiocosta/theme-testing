<?php if (!defined('FW')) die('Forbidden');

class _FW_Customizer_Setting_Option extends WP_Customize_Setting {
	/**
	 * @var array
	 * This is sent in args and set in parent construct
	 */
	protected $fw_option = array();

	public function get_fw_option() {
		return $this->fw_option;
	}

	public function sanitize($value) {
		$value = json_decode($value, true);

		if (is_null($value) || !is_array($value)) {
			return null;
		}

		$POST = array();

		foreach ($value as $var) {
			fw_aks(
				fw_html_attr_name_to_array_multi_key($var['name']),
				$var['value'],
				$POST
			);
		}

		$value = fw()->backend->option_type($this->fw_option['type'])->get_value_from_input(
			$this->fw_option,
			fw_akg(fw_html_attr_name_to_array_multi_key($this->id), $POST)
		);

		return $value;
	}
}
