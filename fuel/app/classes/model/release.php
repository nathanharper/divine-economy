<?php
class Model_Release extends Nathan_Model {
	protected static $_many_many = array('artists');
	protected static $_has_many = array('tracks');
	protected static $_properties = array(
		'id',
		'name',
		'artwork',
		'description',
		'audio',
		'price',
		'created_at',
		'updated_at',
	);
	
	public function artist_list() {
		return implode(
			' and ',
			array_map(
				create_function('$a', 'return $a->name;'),
				$this->artists
			)
		);
	}
	
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
			'price' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Price',
				'search' => false,
				'list' => true,
			),
			'artists' => array(
				'type' => 'Admin\\Field_Foreignselect',
				'desc' => 'Artist(s)',
				'multiple' => true,
				'fmodel' => '\\Model_Artist',
				'fval' => 'id',
				'fdesc' => 'name',
				'list' => true,
				'search' => true,
			),
			'artwork' => array(
				'type' => 'Admin\\Field_Upload',
				'desc' => 'Artwork',
				'upload_type' => 'image',
				'dimension' => array('230x230', '400x400'),
			),
			'tracks' => array(
				'type' => '\\Field_Track',
				'desc' => 'Tracks',
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