<?php
/*
	Rest controller to load output for blog component
*/

//include_once APPPATH.'vendor'.DS.'Smarty'.DS.'libs'.DS.'Smarty.class.php'; 

class Controller_Blog extends Controller_Rest {
	
	// Retrieve blog posts from
	public function post_tumblr() {
		
		$params = array(
			'api_key' => Config::get('tumblr_key'),
			'format' => 'raw',
		);
		
		$tumblr_addr = Config::get('tumblr_address');
		$type = Input::post('type', '');
		
		if($tag = Input::post('tag')) {
			$params['tag'] = $tag;
		}
		
		$uri = "http://api.tumblr.com/v2/blog/$tumblr_addr/posts/$type?" . http_build_query($params);
		
		// Get data from tumblr API
		$ch = curl_init($uri);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = json_decode(curl_exec($ch));
		curl_close($ch);
		
		if(isset($data->meta) && $data->meta->status == 200 && $data->meta->msg == 'OK') {
			$smarty = Nathan_Controller::new_smarty(array('posts' => $data->response->posts));
			$html = $smarty->fetch(APPPATH . 'views/blog/tumblr.smarty');
			$this->response($html);
		}
		else {
			$this->response("<p>Error loading Tumblr data. Please try again later.</p>");
		}
	}
	
	/*public function post_gigs() {
		$gigs = Model_Gig::find()
			->order_by('date', 'DESC')
			->limit(Config::get('blog_post_limit'))
			->get();
		
		$response = '';
		foreach($gigs as $gig) {
			$response .= Html::h(
				html_tag('span', array(
					'class' => 'blog-title',
				), $gig->artist_list() . ' AT ' . $gig->venue)
				. html_tag('span', array(
					'class' => 'blog-date',
				), date(Config::get('date_format'), $gig->date)),
				2
			) . html_tag('p', array(), $gig->body) . Html::hr();
		}
		
		$this->response($response);
	}
	
	public function post_blogposts() {
		$blogs = Model_Blogpost::find()
			->order_by('date', 'DESC')
			->limit(Config::get('blog_post_limit'))
			->get();
		
		$response = '';	
		foreach($blogs as $blog) {
			$response .= Html::h(
				html_tag('span', array(
					'class' => 'blog-title',
				), $blog->title)
				. html_tag('span', array(
					'class' => 'blog-date',
				), date(Config::get('date_format'), $blog->date)),
				2
			) . html_tag('p', array(), $blog->body) . Html::hr();
		}
		
		$this->response($response);
	}*/
}