<?php

class Field_Track extends Admin\Adminfield {
	public function item_view() {
		
		// First, build the Audiofile select
		$audiofiles = Model_Audiofile::find()->order_by('filename')->get();
		$select = array('<option value=""></option>');
		foreach($audiofiles as $af) {
			$select[$af->id] = '<option value="'.$af->id.'" not_selected="1">'.$af->filename.'</option>';
		}
		
		$result = 
			"<table id=\"track_list\">
				<tr>
					<td><b>#</b></td>
					<td><b>Name</b></td>
					<td><b>File</b></td>
					<td></td>
				</tr>";
			
		foreach($this->item->tracks as $track) {
			$temp_select = $select;
			if($track->audiofile) {
				$temp_select[$track->audiofile->id] = str_replace(
					'not_selected',
					'selected',
					$temp_select[$track->audiofile->id]
				);	
			}
			$result .= 
				"<tr>
					<td>".html_tag('input', array(
						'type'=>'text',
						'value'=>$track->track_num,
						'name'=>"item_field[Model_Track][$track->id][track_num]")).
					"</td>
					<td>".html_tag('input', array(
						'type'=>'text',
						'value'=>$track->name,
						'name'=>"item_field[Model_Track][$track->id][name]")).
					"</td>
					<td>
						<select name=\"item_field[Model_Track][$track->id][audiofile_id]\">"
							.implode('',$temp_select).
						"</select>
					</td>
					<td>".html_tag('input', array(
						'type'=>'button',
						'value'=>'delete',
						'class'=>'delete',
						'track_id'=>$track->id,
						'onclick'=>'$(this).parent().parent().remove();')).
					"</td>
				</tr>";
		}
		
		// add blank track field for cloning purposes
		$result .= 
			"<tr style=\"display:none;\" id=\"track_clone\">
				<td>".html_tag('input',array('type'=>'text','class'=>'track_num'))."</td>
				<td>".html_tag('input',array('type'=>'text','class'=>'name'))."</td>
				<td><select class=\"audiofile\">".implode('',$select)."</select></td>
				<td>".html_tag('input',array(
					'type'=>'button',
					'class'=>'delete',
					'value'=>'delete',
					'onclick'=>'$(this).parent().parent().remove();')).
				"</td>
			</tr>";
		
		$result .= "</table>".Html::br(2). html_tag('input', array(
			'type' => 'button',
			'value' => 'new track',
			'id' => 'new_track',
			'onclick' => "TrackField.newTrack();",
		));
		
		return $result;
	}
	
	public function list_view() {
		return '';
	}
	
	public function update_item($post_data) {
		if(isset($post_data['Model_Track'])) {
			foreach($this->item->tracks as $id => $val) {
				if(!array_key_exists($id, $post_data['Model_Track'])) {
					// delete old tracks
					unset($this->item->tracks[$id]);
				}
				else {
					// update old tracks
					$this->item->tracks[$id]->name = isset($post_data['Model_Track'][$id]['name']) 
						? $post_data['Model_Track'][$id]['name'] 
						: null;

					$this->item->tracks[$id]->track_num = isset($post_data['Model_Track'][$id]['track_num']) 
						? $post_data['Model_Track'][$id]['track_num'] 
						: null;

					$audiofile = null;
					if(!empty($post_data['Model_Track'][$id]['audiofile_id'])) {
						$audiofile = Model_Audiofile::find($post_data['Model_Track'][$id]['audiofile_id']);
					}
					$this->item->tracks[$id]->audiofile = $audiofile;
				}
			}
		}
		if(isset($post_data['Model_Track']['new'])) {
			// create new tracks
			foreach($post_data['Model_Track']['new'] as $new_id => $new_props) {
				$track = Model_Track::factory();
				$track->name = isset($new_props['name']) ? $new_props['name'] : null;
				$track->track_num = isset($new_props['track_num']) ? $new_props['track_num'] : null;
				
				$audiofile = null;
				if(!empty($new_props['audiofile_id'])) {
					$audiofile = Model_Audiofile::find($new_props['audiofile_id']);
				}
				$track->audiofile = $audiofile ? $audiofile : null;
				
				$this->item->tracks[] = $track;
			}
		}
	}
}