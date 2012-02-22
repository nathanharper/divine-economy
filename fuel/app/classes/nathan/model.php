<?php
abstract class Nathan_Model extends Orm\Model {
	
	protected static $_observers = array(
		'Orm\\Observer_CreatedAt' => array('before_insert'),
		'Orm\\Observer_UpdatedAt' => array('before_save'),
	);
	
	//public static abstract function admin_config();
	
	public function get_image($params = array()) {
		$field = !empty($params['field']) ? $params['field'] : 'image';
		$dim = !empty($params['dimension']) ? $params['dimension'] : '';
		$secure = !empty($params['secure']);
		
		if(!$this->$field) {
			return FALSE;
		}
		
		$path = Config::get('image_dir', 'images') . DS;
		$path = $secure
			? Config::get('secure_dir') . $path
			: $path;
		
		if($dim && preg_match("/^([0-9]+)x([0-9]+)$/i", $dim)) {
			$filepath = $path . preg_replace("/^(.+)(\.[^\.]+)$/", '$1_'.strtolower($dim).'$2', $this->$field);
		}
		else {
			$filepath = $path . $this->$field;
		}
		
		if($secure) {
			$filepath = realpath($filepath);
			return file_exists($filepath) ? $filepath : FALSE;
		}
		return file_exists(realpath(DOCROOT . $filepath)) ? DS . $filepath : FALSE;
	}
	
	public function get_audio($params = array()) {
		$field = !empty($params['field']) ? $params['field'] : 'audio';
		$length = !empty($params['length']) ? intval($params['length']) : '';
		$secure = !empty($params['secure']);
		
		if(!$this->$field) {
			return FALSE;
		}
		
		$path = Config::get('audio_dir', 'audio') . DS;
		$path = $secure && !$length // if it's a truncated sample, assume it's not secure
			? Config::get('secure_dir') . $path
			: $path;
			
		$filepath = $length
			? $path . preg_replace("/^(.+)(\.[^\.]+)$/", '$1_sample_'.$length.'$2', $this->$field)
			: $path . $this->$field;
			
		if($secure && !$length) {
			$filepath = realpath($filepath);
			return file_exists($filepath) ? $filepath : FALSE;
		}
		return file_exists(realpath(DOCROOT . $filepath)) ? DS . $filepath : FALSE;
	}
}