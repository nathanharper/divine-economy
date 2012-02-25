<?php

class Controller_Splash extends Nathan_Controller {
	public function action_index() {
		$this->add_body_class('splash');
		$this->template->body = 'home/splash.smarty';
	}
}