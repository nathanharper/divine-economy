<?php
class Controller_Content extends Controller_Rest {
	
	public function get_contact() {
		$html = '<img src="/assets/img/logo.jpg" />'.Html::mail_to('mike@divine-economy.org', null, 'mike@divine-economy.org');
		$this->response($html);
	}
}