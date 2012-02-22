<?php

class Controller_Shoppingcart extends Controller_Rest {
	
	public function post_add() {
		if($id = Input::post('rel_id', FALSE)) {
			if($release_id_list = Cookie::get('divec_cart')) {
				$release_id_array = explode('-', $release_id_list);
				if(!in_array($id, $release_id_array)) {
					$release_id_array[] = $id;
					$release_id_list = implode('-', $release_id_array);
				}
			}
			else {
				$release_id_list = $id;
			}
			Cookie::set('divec_cart', $release_id_list, 31536000); // 1 year
		}
		$this->response(array('success' => 'true'));
	}
	
	// remove an item 
	public function post_remove() {
		if($id = Input::post('rel_id')) {
			if($release_id_list = Cookie::get('divec_cart')) {
				$release_id_array = explode('-', $release_id_list);
				$index = array_search($id, $release_id_array);
				if($index !== FALSE) {
					unset($release_id_array[$index]);
					Cookie::set('divec_cart', implode('-', $release_id_array), 31536000); // 1 year
				}
			}
		}
		$this->response(array('success' => 'true'));
	}
	
	public function post_clear() {
		Cookie::delete('divec_cart');
		$this->response(array('success' => 'true'));
	}
	
	// Check to see if an item is in the cart
	public function get_check() {
		if($id = Input::get('rel_id')) {
			if($id_list = Cookie::get('divec_cart')) {
				if(in_array($id, explode('-', $id_list))) {
					$this->response(array('success' => 'true'));
				}
			}
		}
		$this->response(array('success' => 'false'));
	}
}