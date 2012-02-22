<?php
class Model_Track extends Nathan_Model {
	protected static $_belongs_to = array('release','audiofile');
	protected static $_properties = array(
		'id',
		'name',
		'track_num',
		'audiofile_id',
		'release_id',
		'description',
		'created_at',
		'updated_at',
	);
	
	public static function admin_config() {
		return array();
	}
}