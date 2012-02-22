<?php
class Model_Gig extends Nathan_Model {
	protected static $_many_many = array('artists');
	protected static $_properties = array(
		'id',
		'date',
		'venue',
		'body',
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
			'date' => array(
				'type' => 'Admin\\Field_Date',
				'desc' => 'Date',
				'list' => true,
			),
			'venue' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Venue',
				'list' => true,
				'search' => true,
			),
			'body' => array(
				'type' => 'Admin\\Field_String',
				'desc' => 'Description',
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
		);
	}
}