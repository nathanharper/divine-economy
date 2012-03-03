<?php

class Field_Release extends Admin\Adminfield {
	
	public function item_view() {
		$rel_trans = DB::select('release_id', 'quantity')
			->from('releases_transactions')
			->where('transaction_id', $this->item->id)
			->execute()
			->as_array();
		
		if($rel_trans) {
			$header = html_tag(
				'tr', 
				array('class'=>'table-header'), 
				html_tag('th', array(), 'Release') . html_tag('th', array(), 'Quantity')
			);

			$body = '';
			foreach($rel_trans as $rt) {
				if($rel = Model_Release::find($rt['release_id'])) {
					$name = html_tag('a', array('href'=>"/admin/item/releases?id=$rel->id"), $rel->name);
				}
				else {
					$name = "Error: Release #{$rt['release_id']} no longer exists.";
				}
				$body .= html_tag('tr', array(), 
					html_tag('td', array(), $name) .
					html_tag('td', array(), $rt['quantity'])
				);
			}

			return html_tag(
				'table', 
				array('class'=>'trans-rel-table'),
				$header . $body
			);
		}
		
		return "<p>No data.</p>";
	}
	
	public function list_view() {
		return '';
	}
	
	public function update_item($post_data) {
		return true;
	}
}