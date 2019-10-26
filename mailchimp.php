<?php

/**
	Author: Gentian Nuka
	Description: Mailchimp custom functionality via API
*/

if(isset($_POST['submitted'])) {
	$ajaxReq = $_POST['ajax'];

	$email = $_POST['email'];
	$list_id = 'c46f3350bf';
	$api_key = 'e49c111c08b2b7d5287d7aac1a96fbc5-us20';
	$data_center = substr($api_key,strpos($api_key,'-')+1);
	$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members/';

	switch($ajaxReq) {
		case "post":
			curlApiRequest($email, "subscribed", $url, $api_key, false, "POST");
			break;
		
		case "put":
			curlApiRequest($email, "unsubscribed", $url, $api_key, true, "PUT");
			break;

		default:
			echo "You haven't specified request method.";
	}
} else {
	echo "No access. #WebyFlex";
}


function curlApiRequest($email, $email_status, $url_request, $api_key, $hashed_email, $request_type) {

	if($hashed_email) {
		$hash_email = md5($email); 	
		$url = $url_request . $hash_email;
	} else {
		$url = $url_request;
	}


	$json = json_encode([
    'email_address' => $email,
    'status'        => $email_status, 
	]);

	$init = curl_init($url);
	curl_setopt($init, CURLOPT_USERPWD, 'user:' . $api_key);
	curl_setopt($init, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($init, CURLOPT_TIMEOUT, 10);
	curl_setopt($init, CURLOPT_CUSTOMREQUEST, $request_type);
	curl_setopt($init, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($init, CURLOPT_POSTFIELDS, $json);
	$result = curl_exec($init);
	$status_code = curl_getinfo($init, CURLINFO_HTTP_CODE);
	curl_close($init);	
	echo $status_code;
}



?>