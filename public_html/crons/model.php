<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Models</title>
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

//ini_set('max_execution_time', 300); //300 seconds = 5 minutes
ini_set('max_execution_time', 300); //300 seconds = 1 minute

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes  */
require_once 'config/database.php';

require_once 'scrape/simple_html_dom.php';
require_once 'class/model.php';
require_once 'class/make.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

function delete_all_between($beginning, $end, $string) {
  $beginningPos = strpos($string, $beginning);
  $endPos = strpos($string, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

  return str_replace($textToDelete, '', $string);
}

function getPage($link) {
	/* Setup curl. */
    $options = array(
        CURLOPT_RETURNTRANSFER 	=> true,     // return web page
        CURLOPT_HEADER         		=> false,    // don't return headers
        CURLOPT_FOLLOWLOCATION 	=> true,     // follow redirects
        CURLOPT_ENCODING       		=> "",       // handle all encodings
        CURLOPT_USERAGENT      		=> "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322", // who am i
        CURLOPT_AUTOREFERER    	=> true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT	=> 120,      // timeout on connect
        CURLOPT_TIMEOUT        		=> 120,      // timeout on response
        CURLOPT_MAXREDIRS      		=> 10,       // stop after 10 redirects
    );

    $curl = curl_init($link);
    curl_setopt_array($curl, $options);
    $urlContent = curl_exec($curl);
    curl_close($curl);
	
	/* Clean it up. */
	$curl = NULL; UNSET($curl);
	
	return  $urlContent;
}

$makeObject		= new class_make();
$modelObject	= new class_model();

$makeData = $makeObject->getWithOutModels();

if($makeData) {

	$brands = '';

	echo '<p class="header">'.$makeData['brand_name'].', '.$makeData['make_name'].'</p>';	
	echo '<p>========================================================</p>';	 
		
	echo '<p>Starting......</p>';

	$link = 'http://www.carqueryapi.com/api/0.3/?callback=jQuery15109384360149433747_1421260926961&cmd=getTrims&make='.$makeData['brand_id'].'&year=-1&model='.urlencode($makeData['make_name']).'&sold_in_us=&full_results=0&_=1421272174914';

	$page = getPage($link);
	
	if($page) {

		$out = delete_all_between('jQuery', ':', $page);
		$out = str_replace(']});', ']', $out);
		
		$modelJson = json_decode($out);

		/* Check exists. */
		for($i = 0; $i < count($modelJson); $i++) {
			
			$data 	= array();	
			$data['make_code']	= $makeData['make_code'];
			$data['model_name']	= $modelJson[$i]->model_name. ' '.$modelJson[$i]->model_trim;			
			$data['model_id']		= $modelJson[$i]->model_id;		
			$data['model_year']	= $modelJson[$i]->model_year;		
			$data['model_trim']	= $modelJson[$i]->model_trim;		

			if($modelObject->insert($data)) {
				echo '<p class="success">'.$i.'.'.$modelJson[$i]->model_name.' '.$modelJson[$i]->model_trim.'</p>';
			} else {
				echo '<p class="error">'.$i.'. Error inserting '.$modelJson[$i]->model_name.' '.$modelJson[$i]->model_trim.'</p>';
			}

		}
	} else {
		echo '<p>There are no items</p>';
	}			
} else {
	echo '<p>No more empty brands</p>';
}
echo '<p>Finished......</p>';
echo '<p>========================================================</p>';	 
?>