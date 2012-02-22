<?php

class Controller_Checkout extends Nathan_Controller {
	
	public function action_index() {
		if($this->data['rels'] = explode('-', Cookie::get('divec_cart', ''))) {
			$this->data['rels'] = Model_Release::find()
				->where('id', 'IN', $this->data['rels'])
				->get();
		}
		
		// TODO: just calculate the final amount in the paypal plugin
		// Also, allow for multiples of a particular item to be calculated
		/*$amt = 0;
		foreach($this->data['rels'] as $rel) {
			$amt += $rel->price;
		}
		$this->data['amt'] = $amt;*/
		
		$this->template->body = 'checkout/index_checkout.smarty';
	}
}