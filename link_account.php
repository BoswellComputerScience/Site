<?php

	$username = $_POST["username"];

	$url = 'api.github.com/orgs/boswellcomputerscience/memberships/' . $username;
	$fields = array(
		'role' => urlencode('member')
	);

	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	$result = curl_exec($ch);
	curl_close($ch);

	$redirect_url = 'https://github.com/boswellcomputerscience';
	header('Location: ' . $redirect_url);
	die();
?>