<?php
class Controller_Artists extends Nathan_Controller {
	
	public function action_index() {
		if($id = Input::get('id')) {
			return $this->load_artist($id);	
		}
		$this->data['artists'] = Model_Artist::find('all'); 
		$this->template->body = 'artists/index_artists.smarty';
	}
	
	public function load_artist($id) {
		$artist = Model_Artist::find($id);
		if(!$artist) {
			return $this->return_404('This artist does not exist.');
		}
		$this->data['artist'] = $artist;
	    $this->template->body = 'artists/artist_page.smarty';
	}
	
}