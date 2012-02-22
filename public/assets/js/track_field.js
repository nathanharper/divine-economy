var TrackField = new function() {
	
	var count = 1;
	
	this.newTrack = function() {
		var new_track = $('#track_clone').clone();
		new_track.find('.name').attr('name',"item_field[Model_Track][new]["+count+"][name]");
		new_track.find('.track_num').attr('name', 'item_field[Model_Track][new]['+count+'][track_num]');
		new_track.find('.audiofile').attr('name', 'item_field[Model_Track][new]['+count+'][audiofile_id]');
		new_track.find('.delete').attr('track_id','new_'+count);
		$('#track_list').append(new_track);
		new_track.show();
		count++;
	}
	
	/*this.deleteTrack = function(element) {
		var me = $(element);
		var track_id = me.attr('track_id');
		$(element).parent().parent().remove();
		if(track_id.match(/^[0-9]+$/)) {
			// add a hidden delete field
			$('#track_list').after(
				$('<input type="hidden" name="item_field[Model_Track][delete][]" value="'+track_id+'" />')
			);
		}
	} */
	
	return this;
}();