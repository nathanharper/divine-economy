<?php

class Controller_Paypal extends Controller_Rest {
	
	private $releases = array();
	
	public function post_validate() {
		
		list($params, $shipping) = $this->load_params();
			
		$errors = array();
		foreach(array_merge($params, $shipping) as $key => $value) {
			if(empty($value)) {
				$errors[$key] = $value;
			}
		}
		$errors['success'] = $errors ? 0 : 1;
		
		if($errors['success']) {
			$errors['AMT'] = $params['AMT'];
		}
		
		$this->response($errors);
	}
	
	public function load_params() {
		
		parse_str(Input::post('attr'), $attr);
		parse_str(Input::post('rels'), $rels);
		
		$amt = 0;
		foreach($rels['quantity'] as $rel_id => $quantity) {
			if($rel = Model_Release::find($rel_id)) {
				$this->releases[$rel->id] = $quantity;
				$amt += $rel->price * $quantity;
			}
		}
		
		$expdate = $attr['cc_exp_month'] . $attr['cc_exp_year'];
		if(strlen($expdate) < 6) {
			$expdate = '0' . $expdate;
		}
		
		$params = array(
			'PAYMENTACTION' => 'Sale',
			'AMT' => $amt,
			'ACCT' => $attr['acct'],
			'CVV2' => $attr['cvv2'],
			'EXPDATE' => $expdate,
			'CREDITCARDTYPE' => $attr['creditcardtype'],
			'STREET' => $attr['street'],
			'CITY' => $attr['city'],
			'STATE' => $attr['state'],
			'ZIP' => $attr['zip'],
			'COUNTRYCODE' => $attr['countrycode'],
			'FIRSTNAME' => $attr['firstname'],
			'LASTNAME' => $attr['lastname'],
		);
		
		$shipping = array(
			'ship_city' => $attr['ship_city'],
			'ship_zip' => $attr['ship_zip'],
			'ship_street' => $attr['ship_street'],
			'ship_state' => $attr['ship_state'],
		);
		
		return array($params, $shipping);
	}
	
	public function post_process() {
		
		list($params, $shipping) = $this->load_params();
		
		$PARAM_DEFAULTS = array(
			'USER' => Config::get('paypal_user'),
			'PWD' => Config::get('paypal_pass'),
			'SIGNATURE' => Config::get('paypal_sig'),
			'METHOD' => 'DoDirectPayment',
			'VERSION' => '2.3',
			'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
		);
		
		$params = array_merge($PARAM_DEFAULTS, $params);

        $query = array();
        foreach ($params as $key => $value) {
         $query[] = strtoupper($key) .'='. urlencode($value);
        }
        $nvpstr = implode('&', $query);
        
        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::get('paypal_url'));
        
        curl_setopt($ch, CURLOPT_VERBOSE, true); // put this on for testing
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_CAINFO, APPPATH . 'cacert.pem');
        //TODO: not sure if i need this...

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        //setting nvpstr as POST var
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
        
        //getting response from server
        $response = curl_exec($ch);
        
        curl_close($ch);
        
        //convert NVP response to an associative array
        $response = $this->deformat_nvp($response);
        
		//TODO: Check to see if the payment was successful, and create a Model_Transaction
		if($response && ($response['ACK'] == 'SuccessWithWarning' || $response['ACK'] == 'Success')) {
			$response['success'] = '1';
			
			//transaction success
			$trans = Model_Transaction::factory();
			$trans->first = $params['FIRSTNAME'];
			$trans->last = $params['LASTNAME'];
			$trans->street = $shipping['ship_street'];
			$trans->city = $shipping['ship_city'];
			$trans->zip = $shipping['ship_zip'];
			$trans->state = $shipping['ship_state'];
			$trans->amount = $params['AMT'];
			$trans->order_sent = 0;
			$trans->save();
			if($trans->id) {
				foreach($this->releases as $rel_id => $quantity) {
					DB::insert('releases_transactions', array('release_id','transaction_id','quantity'))
						->values(array($rel_id, $trans->id, $quantity))
						->execute();
				}
			}
		}
		else if(isset($response['ACK']) && isset($response['L_ERRORCODE0'])) {
			return array('success'=>'0', 'message'=>$response['L_LONGMESSAGE0']);
		}
		else {
			return array('success'=>'0','message'=>'Transaction failed.<br />Try again later.');
		}
		
        return $response;
	}
	
	protected function deformat_nvp($nvpstr)
	{
		$intial=0;
		$nvpArray = array();

		while (strlen($nvpstr)) {
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		}
		
		return $nvpArray;
	}
}