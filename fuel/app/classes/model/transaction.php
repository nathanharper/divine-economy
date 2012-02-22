<?php
class Model_Transaction extends Nathan_Model {
	protected static $_properties = array(
		'id',
		'first',
		'last',
		'street',
		//'address2',
		'city',
		'zip',
		'state',
		'amount',
		'order_sent',
		'transaction_id',
		'created_at',
		'updated_at',
	);
	
	public static function admin_config() {
		return array(
			'first' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'First Name',
				'search' => true,
				'list' => true,
			),
			'last' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Last Name',
				'search' => true,
				'list' => true,
			),
			'street' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Address Line 1',
				'search' => false,
				'list' => false,
			),
			/*'address2' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Address Line 2',
				'search' => false,
				'list' => false,
			),*/
			'city' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'City',
				'search' => false,
				'list' => false,
			),
			'zip' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Zip Code',
				'search' => false,
				'list' => false,
			),
			'state' => array(
				'type' => 'Admin\\Field_Select',
				'desc' => 'State',
				'search' => false,
				'list' => false,
				'array' => Config::get('state_array'),
				'blank_opt' => true,
			),
			'amount' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Amount',
				'search' => false,
				'list' => true,
			),
			'order_sent' => array(
				'type' => 'Admin\\Field_Checkbox',
				'desc' => 'Order Sent?',
				'search' => true,
				'list' => true,
			),
			'releases' => array(
				'type' => '\\Field_Release',
				'desc' => 'Order Details',
				'search' => false,
				'list' => false,
			),
		);
	}
}