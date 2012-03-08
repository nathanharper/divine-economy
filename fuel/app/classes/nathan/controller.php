<?php
abstract class Nathan_Controller extends Controller_Template {
	
	public $template = 'template.smarty';
	public $data = array();
	
	public function before() {
		
		parent::before();
		
		if($this->auto_render === true) {
			// set up defaults
			$this->template->title = Config::get('project_name', '');
			$this->template->body = '';
			$this->template->headers = '';
			$this->template->css = array(
				'common'=>'common.css',
				'jqcustom' => 'jquery-custom.css',
				//'sc-style' => 'sc-player-standard.css',
			);
			$this->template->js = array(
				'jquery'=>'jquery-1.6.2.min.js',
				'jqcustom' => 'jquery-custom.min.js',
				//'jplay' => 'jquery.jplayer.min.js',
				//'soundcloud' => 'http://connect.soundcloud.com/sdk.js',
				'sc-api' => 'soundcloud.player.api.js',
				'sc-player' => 'sc-player.js',
				'global' => 'global.js',
			);
		}
		return true;
	}
	
	public function after() {
		if($this->template->body && is_string($this->template->body)) {
			$this->template->body = View::factory($this->template->body, $this->data, false); 
		}
		parent::after();
	}
	
	public function return_404($title = 'Oops.') {
		$this->response->status = 404;
		$this->template->title = $title;
		$this->template->body ='home/404.smarty';
	}
	
	public static function new_smarty($params = array()) {
		$smarty = Parser\View_Smarty::parser();
		if($params) {
			foreach($params as $key => $val) {
				$smarty->assign($key, $val);
			}
		}
		return $smarty;
	}
	
	public function add_body_class($class) {
		if(isset($this->data['body_class'])) {
			$this->template->body_class = $class;
		}
		else {
			$this->template->body_class = array($class);
		}
	}
} 