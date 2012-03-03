<?php
class Model_Artist extends Nathan_Model {
	protected static $_many_many = array('releases', 'gigs');
	protected static $_properties = array(
		'id',
		'name',
		'photo',
		'description',
		'audio',
		'created_at',
		'updated_at',
	);
	
	public static function admin_config() {
		return array(
			'name' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Name',
				'search' => true,
				'list' => true,
			),
			'description' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Description',
				'search' => true,
				'list' => true,
			),
			'photo' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'Image',
				'upload_type' => 'image',
				'search' => false,
				'list' => false,
				'dimension' => array('230x230', '400x400'),
			),
			'audio' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'Sample Audio',
				'upload_type' => 'audio',
				'search' => false,
				'list' => false,
			),
		);
	}
}