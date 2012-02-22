<?php

class Model_Blogpost extends Nathan_Model {
	protected static $_properties = array(
		'id',
		'date',
		'title',
		'body',
		'image',
		'audio',
		'created_at',
		'updated_at',
	);
	
	public static function admin_config() {
		return array(
			'date' => array(
				'type' => 'Admin\\Field_Date',
				'desc' => 'Post Date',
				'list' => true,
			),
			'title' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Title',
				'search' => true,
				'list' => true,
			),
			'body' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Body',
			),
			'image' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'Image',
				'upload_type' => 'image',
				'dimension' => array('230x230'),
			),
			'audio' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'Audio',
				'upload_type' => 'audio',
			),
		);
	}
}