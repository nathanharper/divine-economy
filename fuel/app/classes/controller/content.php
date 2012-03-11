<?php
class Controller_Content extends Controller_Rest {
	
	public function get_contact() {
		$html = 'mike@divine-economy.org';
		$this->response($html);
	}
}