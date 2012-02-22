<?php
class Controller_Home extends Nathan_Controller {
	
	public function action_index() {
		$this->data['releases'] = Model_Release::find('all');
		$this->template->body = 'home/index_home.smarty';
	}
	
	public function action_contact() {
		$this->data['primary_contact'] = 'mikep@fake.com';
		$this->template->body = 'home/contact.smarty';
	}
	
	public function action_404($title = 'OH SHIT.')
	{
		$this->data['title'] = $title;

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->template->body = 'home/404.smarty';
	}
}