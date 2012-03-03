var Global = new function() {
	/*$.fn.ready(function() {
		attachAudioPlayEvents();
		attachBlogEvents();
		attachCartEvents();
		$('#cc_submit').attach_checkout_submit();
	});*/
	
	/*jQuery.fn.attach_checkout_submit = function() {
		var me = $(this);
		me.click(function() {
			var pay_form = $('form#payment-form');
			var params = {
				attr: pay_form.serialize(),
				rels: $('form#releases-form').serialize()
			}
			
			var button_clone = me.clone();
			var processing = $('<i>processing...</i>');
			me.replaceWith(processing);
			
			$.post('/paypal/validate.json', params, function(resp) {
				pay_form.find('td').css('color', '#000000');
				$('.error-message').hide();
				if(resp.success) {
					// VALIDATION SUCCESFUL
					pay_form.hide();
					if(confirm('You will be charged $'+resp.AMT+'. Are you sure you wish to complete this payment?')) {
						$.post('/paypal/process.json', params, function(resp) {
							if(resp.success == '1') {
								processing.replaceWith($('<i>Success!</i>'));
								Global.clearCart();
								alert('Success!');
							}
							else {
								processing.replaceWith(button_clone);
								button_clone.attach_checkout_submit();
								alert(resp.message);
							}
						},'json');
					}
				}
				else {
					// SHOW VALIDATION ERRORS
					delete resp.success;
					$.each(resp, function(idx, value) {
						if(idx == 'AMT') {
							$('.error-message').html('Payment amount cannot be 0. Please add more items to your cart and try again.').show();
						}
						else {
							$('form#payment-form td[rel="'+idx.toLowerCase()+'"]').css('color', 'red');
						}
					});
					processing.replaceWith(button_clone);
					button_clone.attach_checkout_submit();
				}
			},'json');
		});
	}
	
	var attachCartEvents = function() {
		$('.add_to_cart').click(function() {
			var me = $(this);
			Global.addToCart(me.attr('rel'));
			me.replaceWith($('<i>Added to Cart</i>'));
		});
		
		$('.remove_from_cart').click(function() {
			var me = $(this);
			var rel_id = me.attr('rel');
			Global.removeFromCart(rel_id);
			me.parents('.cart-item').remove();
		});
		
		$('.shipping-check').change(function() {
			if($(this).is(':checked')) {
				$('input[name="ship_city"]').val($('input[name="city"]').val());
				$('input[name="ship_zip"]').val($('input[name="zip"]').val());
				$('textarea[name="ship_street"]').val($('textarea[name="street"]').val());
				$('select[name="ship_state"]').val($('select[name="state"]').val());
			}
		});
	}
	
	var attachAudioPlayEvents = function() {
		var jplay = $('#jpId');
		if(jplay.length > 0) {
			jplay.jPlayer( {
				supplied: "mp3",
				swfPath: "/assets/flash/Jplayer.swf"
			});
			
			$('.jplay_button').addClass('play').text('play');
			
			$('.jplay_button').click(function() {
				var me = $(this);
				if(me.hasClass('play')) {
					$('.jplay_button').each(function() {
						var inst = $(this);
						if(inst.hasClass('pause')) {
							inst.removeClass('pause').addClass('play').text('play');
						}
					});
					
					me.removeClass('play').addClass('pause').text('pause');
					var uri = me.attr('uri');
					jplay.jPlayer("setMedia", {
						mp3: uri 
					}).jPlayer("play");
				}
				else if(me.hasClass('pause')) {
					me.removeClass('pause').addClass('play').text('play');
					jplay.jPlayer('pause');
				}
			});
		}
	}
	
	var attachBlogEvents = function() {
		$('#blog-tabs a').click(function() {
			var me = $(this);
			if(!me.hasClass('active')) {
				$('#blog-results').load('/blog/' + me.attr('rel') + '.html', {}, function() {
					$('#blog-tabs .active').removeClass('active');
					me.addClass('active');
				});
			}
		});
	}
	
	this.addToCart = function(id) {
		$.post('/shoppingcart/add.json', {rel_id: id}, function(resp) {
			
		},'json');
	}
	
	this.removeFromCart = function(id) {
		$.post('/shoppingcart/remove.json', {rel_id: id}, function(resp) {
			
		},'json');
	}
	
	this.clearCart = function() {
		$.post('/shoppingcart/clear.json', {clear : '1'}, function(resp) {
			if(resp.success == 'true') {
				$('form#releases-form').empty();
				// TODO: need some sort of popup that redirects...
			}
		},'json');
	}*/
	
	jQuery.fn.load_blog = function(type, tag, callback) {
		var me = $(this);
		var params = {};
		params['type'] = type ? type : '';
		params['tag'] = tag ? tag : '';
		
		me.ajax_load().load('/blog/tumblr.html', params, function() {
			if(callback) {
				callback();
			}
		});
		return me;
	}
	
	jQuery.fn.load_release = function(id, callback) {
		var me = $(this);
		var uri, params = {};
		if(id) {
			uri = 'one.html';
			params['id'] = id;
		}
		else {
			uri = 'all.html'
		}
		
		me.ajax_load().load('/releases/'+uri, params, function() {
			if(callback) {
				callback();
			}
		});
		return me;
	}
	
	jQuery.fn.load_content = function(page, params, callback) {
		var me = $(this);
		var query = '';
		if(typeof params != 'undefined' && params.length) {
			query = Global.create_query(params);
		}
		me.ajax_load().load('/content/'+page+'.html'+query, function() {
			if(callback) {
				callback();
			}
		});
		return me;
	}
	
	jQuery.fn.ajax_load = function() {
		return $(this).html('<div class="ajax-loader"><img src="/assets/img/ajax-loader.gif" /></div>');
	}
	
	this.create_query = function(params) {
		var query = '';
		$.each(params, function(key, idx) {
			if(! query.length) {
				query = '?'+key+'='+idx;
			} else {
				query += '&'+key+'='+idx;
			}
		});
	}
	
	return this;
}();