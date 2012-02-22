<?php

class Model_Audiofile extends Nathan_Model {
	protected static $_properties = array(
		'id',
		'filename',
		'created_at',
		'updated_at',
	);
	
	public static function admin_config() {
		return array(
			'filename' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'File',
				'upload_type' => 'audio',
				'list' => true,
				'search' => true,
				'secure' => true,
			),
		);
	}
}