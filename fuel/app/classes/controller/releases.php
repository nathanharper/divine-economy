<?php
class Controller_Releases extends Controller_Rest {
	
	public function post_one() {
		$release = Model_Release::query()
			->where('id', Input::post('id'))
			->related('tracks')
			->order_by('tracks.track_num')
			->get_one();
			
		$smarty = Nathan_Controller::new_smarty(array('release' => $release));
		$html = $smarty->fetch(APPPATH . 'views/releases/releases.smarty');
		$this->response($html);
	}
	
	public function post_all() {
		$releases = Model_Release::query()
			->order_by('name')
			->get();
			
		$smarty = Nathan_Controller::new_smarty(array('releases' => $releases));
		$html = $smarty->fetch(APPPATH . 'views/releases/releases.smarty');
		$this->response($html);
	}
	
	/*public function action_index() {
		if($id = Input::get('id')) {
			return $this->load_release($id);
		}
		return $this->return_404();
	}
	
	public function load_release($id) {
		$release = Model_Release::query()
			->where('id',$id)
			->related('tracks')
			->order_by('tracks.track_num')
			->get_one();
		
		if(!$release) {
			return $this->return_404('This release does not exist.');
		}
		
		$this->data['release'] = $release;
		//$this->template->js['jplayer'] = 'jquery.jplayer.min.js';
		$this->template->body = 'releases/index_releases.smarty';
	}*/
}