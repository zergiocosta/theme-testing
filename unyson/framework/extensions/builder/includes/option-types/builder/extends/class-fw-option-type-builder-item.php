<?php if (!defined('FW')) die('Forbidden');

abstract class FW_Option_Type_Builder_Item
{
	/**
	 * Specify which builder type this item type belongs to
	 * @return string
	 */
	abstract public function get_builder_type();

	/**
	 * The item type
	 * @return string
	 */
	abstract public function get_type();

	/**
	 * The boxes that appear on top of the builder and can be dragged down or clicked to create items
	 * @return array(
	 *  array(
	 *      'html' =>
	 *          '<div class="item-type-icon-title">'.
	 *          '    <div class="item-type-icon"><span class="dashicons dashicons-smiley"></span></div>'.
	 *          '    <div class="item-type-title">Item Title</div>'.
	 *          '</div>',
	 *  ),
	 *  array(
	 *      'tab' => __('Tab Title', 'fw'),
	 *      'html' =>
	 *          '<div class="item-type-icon-title">'.
	 *          '    <div class="item-type-icon"><span class="dashicons dashicons-smiley"></span></div>'.
	 *          '    <div class="item-type-title">Item Title</div>'.
	 *          '</div>',
	 *  ),
	 *  ...
	 * )
	 */
	abstract public function get_thumbnails();

	/**
	 * Enqueue item type scripts and styles
	 */
	abstract public function enqueue_static();

	final public function __construct()
	{
		// Maybe in the future this method will have some functionality
	}

	/**
	 * @param FW_Access_Key $access_key
	 * @internal
	 * This must be called right after an instance of builder item type has been created
	 * and was added to the registered array, so it is available through
	 * builder->get_item_types()
	 */
	final public function _call_init($access_key)
	{
		if ($access_key->get_key() !== 'fw_ext_builder_option_type') {
			trigger_error('Method call not allowed', E_USER_ERROR);
		}

		if (method_exists($this, '_init')) {
			$this->_init();
		}
	}

	/**
	 * Overwrite this method if you want to change/fix attributes that comes from js
	 * @param $attributes array Backbone Item (Model) attributes
	 * @return mixed
	 */
	public function get_value_from_attributes($attributes)
	{
		return $attributes;
	}
}
