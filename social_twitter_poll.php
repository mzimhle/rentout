<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title></title>
		<style type="text/css">
			.error {
				color:#b90000 !important;
				display:block !important;
				font-weight:bold !important;
			}

			.success {
				color:#339900 !important;
				display:block !important;
				font-weight:bold !important;
			}
			.header {
				font-size: 30px;
			}
			.sub-header {
				font-size: 21px;
			}
			p {
				margin-top: 1px; 
				margin-bottom: 1px;
			}
		</style>
	</head>
	<body>
<?php

/* This must run between 11 AM and 15 PM. */

$currenthour = (int)date('H');

if($currenthour >= 10 && $currenthour < 15) {

	set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

	require_once 'config/database.php';

	require_once('TwitterAPIExchange.php');
	require_once('class/poll.php');
	require_once('class/_social.php');

	$pollObject 	= new class_poll();
	$twitterObject 	= new class_social();

	$pollData = $pollObject->getForTwitter();

	function getSmallLink($longurl){

		$url = "http://api.bit.ly/shorten?version=2.0.1&longUrl=$longurl&login=willownettica&apiKey=R_7e4f545822114a9d9e6ace21904c57e1&format=json&history=1"; 
		
		$s = curl_init();  
		curl_setopt($s,CURLOPT_URL, $url);  
		curl_setopt($s,CURLOPT_HEADER,false);  
		curl_setopt($s,CURLOPT_RETURNTRANSFER,1);  
		$result = curl_exec($s);  
		curl_close( $s );  

		$obj = json_decode($result, true); 

		return $obj["results"]["$longurl"]["shortUrl"];  
	}
		
	if($pollData) {
		
		$data = array();
		$data['poll_code']				= $pollData['poll_code'];
		$data['_social_message']	= 'NEW POLL: '.ucfirst(strtolower(trim(substr($pollData['poll_question'], 0, 100)))).'... - www.bizlounge.co.za';

		/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
		$settings = array(
			'oauth_access_token' 			=> "1959942054-NKMtOpo2MfoH2zfj5galkevP3eIkFcEihsTXbve",
			'oauth_access_token_secret' 	=> "pzxjpUe1Q0naLEolefkaDAWvQGdXANwlh0c92wCtOtAU3",
			'consumer_key' 					=> "cmi3XBvmkWEoOfsJZuTcpfPnv",
			'consumer_secret' 					=> "Cw9TTTu22ujiV7I6JD7uiiPmnbSXGQCEsv2M2VwKNCD2h8nVfe"
		);

		/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/ 
		$url = 'https://api.twitter.com/1.1/statuses/update.json'; 

		// $url = 'https%3A%2F%2Fapi.twitter.com%2F1.1%2Fstatuses%2Fupdate.json'; 
		$requestMethod = 'POST'; 

		/** POST fields required by the URL above. See relevant docs as above **/ 
		$postfields = array( 'status' => $data['_social_message'], ); 

		// See more at: http://sharescripts.blogspot.com/2013/07/how-to-post-tweet-from-website-using-php.html#sthash.kGEWdqVv.dpuf
		/** Perform a POST request and echo the response **/ 
		$twitter = new TwitterAPIExchange($settings); 

		$data['_social_output'] = $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest(); 

		$twitterObject->insert($data);
	}
}
?>	 