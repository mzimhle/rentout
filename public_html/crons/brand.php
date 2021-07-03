<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Brands</title>
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
require_once 'class/brand.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

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

$brandObject		= new class_brand();

$brands = '[
    {
        "make_id": "abarth",
        "make_display": "Abarth",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "ac",
        "make_display": "AC",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "acura",
        "make_display": "Acura",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "alfa-romeo",
        "make_display": "AlfaRomeo",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "allard",
        "make_display": "Allard",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "alpina",
        "make_display": "Alpina",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "alpine",
        "make_display": "Alpine",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "alvis",
        "make_display": "Alvis",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "amc",
        "make_display": "AMC",
        "make_is_common": "0",
        "make_country": "USA"
    },
    {
        "make_id": "ariel",
        "make_display": "Ariel",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "armstrong-siddeley",
        "make_display": "ArmstrongSiddeley",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "ascari",
        "make_display": "Ascari",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "aston-martin",
        "make_display": "AstonMartin",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "audi",
        "make_display": "Audi",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "austin",
        "make_display": "Austin",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "austin-healey",
        "make_display": "Austin-Healey",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "autobianchi",
        "make_display": "Autobianchi",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "auverland",
        "make_display": "Auverland",
        "make_is_common": "0",
        "make_country": "France"
    },
    {
        "make_id": "avanti",
        "make_display": "Avanti",
        "make_is_common": "0",
        "make_country": "USA"
    },
    {
        "make_id": "beijing",
        "make_display": "Beijing",
        "make_is_common": "0",
        "make_country": "China"
    },
    {
        "make_id": "bentley",
        "make_display": "Bentley",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "berkeley",
        "make_display": "Berkeley",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "bitter",
        "make_display": "Bitter",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "bizzarrini",
        "make_display": "Bizzarrini",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "bmw",
        "make_display": "BMW",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "brilliance",
        "make_display": "Brilliance",
        "make_is_common": "0",
        "make_country": "China"
    },
    {
        "make_id": "bristol",
        "make_display": "Bristol",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "bugatti",
        "make_display": "Bugatti",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "buick",
        "make_display": "Buick",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "cadillac",
        "make_display": "Cadillac",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "caterham",
        "make_display": "Caterham",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "checker",
        "make_display": "Checker",
        "make_is_common": "0",
        "make_country": "USA"
    },
    {
        "make_id": "chevrolet",
        "make_display": "Chevrolet",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "chrysler",
        "make_display": "Chrysler",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "citroen",
        "make_display": "Citroen",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "dacia",
        "make_display": "Dacia",
        "make_is_common": "1",
        "make_country": "Romania"
    },
    {
        "make_id": "daewoo",
        "make_display": "Daewoo",
        "make_is_common": "1",
        "make_country": "SouthKorea"
    },
    {
        "make_id": "daf",
        "make_display": "DAF",
        "make_is_common": "0",
        "make_country": "Netherlands"
    },
    {
        "make_id": "daihatsu",
        "make_display": "Daihatsu",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "daimler",
        "make_display": "Daimler",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "datsun",
        "make_display": "Datsun",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "de-tomaso",
        "make_display": "DeTomaso",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "dkw",
        "make_display": "DKW",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "dodge",
        "make_display": "Dodge",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "donkervoort",
        "make_display": "Donkervoort",
        "make_is_common": "0",
        "make_country": "Netherlands"
    },
    {
        "make_id": "eagle",
        "make_display": "Eagle",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "fairthorpe",
        "make_display": "Fairthorpe",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "ferrari",
        "make_display": "Ferrari",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "fiat",
        "make_display": "Fiat",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "fisker",
        "make_display": "Fisker",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "ford",
        "make_display": "Ford",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "gaz",
        "make_display": "GAZ",
        "make_is_common": "0",
        "make_country": "Russia"
    },
    {
        "make_id": "geely",
        "make_display": "Geely",
        "make_is_common": "0",
        "make_country": "China"
    },
    {
        "make_id": "ginetta",
        "make_display": "Ginetta",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "gmc",
        "make_display": "GMC",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "holden",
        "make_display": "Holden",
        "make_is_common": "1",
        "make_country": "Australia"
    },
    {
        "make_id": "honda",
        "make_display": "Honda",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "hudson",
        "make_display": "Hudson",
        "make_is_common": "0",
        "make_country": "USA"
    },
    {
        "make_id": "humber",
        "make_display": "Humber",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "hummer",
        "make_display": "Hummer",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "hyundai",
        "make_display": "Hyundai",
        "make_is_common": "1",
        "make_country": "SouthKorea"
    },
    {
        "make_id": "infiniti",
        "make_display": "Infiniti",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "innocenti",
        "make_display": "Innocenti",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "isuzu",
        "make_display": "Isuzu",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "italdesign",
        "make_display": "Italdesign",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "jaguar",
        "make_display": "Jaguar",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "jeep",
        "make_display": "Jeep",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "jensen",
        "make_display": "Jensen",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "kia",
        "make_display": "Kia",
        "make_is_common": "1",
        "make_country": "SouthKorea"
    },
    {
        "make_id": "koenigsegg",
        "make_display": "Koenigsegg",
        "make_is_common": "1",
        "make_country": "Sweden"
    },
    {
        "make_id": "lada",
        "make_display": "Lada",
        "make_is_common": "1",
        "make_country": "Russia"
    },
    {
        "make_id": "lamborghini",
        "make_display": "Lamborghini",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "lancia",
        "make_display": "Lancia",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "land-rover",
        "make_display": "LandRover",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "lexus",
        "make_display": "Lexus",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "lincoln",
        "make_display": "Lincoln",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "lotec",
        "make_display": "Lotec",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "lotus",
        "make_display": "Lotus",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "luxgen",
        "make_display": "Luxgen",
        "make_is_common": "0",
        "make_country": "Taiwan"
    },
    {
        "make_id": "mahindra",
        "make_display": "Mahindra",
        "make_is_common": "0",
        "make_country": "India"
    },
    {
        "make_id": "marcos",
        "make_display": "Marcos",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "maserati",
        "make_display": "Maserati",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "matra-simca",
        "make_display": "Matra-Simca",
        "make_is_common": "0",
        "make_country": "France"
    },
    {
        "make_id": "maybach",
        "make_display": "Maybach",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "mazda",
        "make_display": "Mazda",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "mcc",
        "make_display": "MCC",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "mclaren",
        "make_display": "McLaren",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "mercedes-benz",
        "make_display": "Mercedes-Benz",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "mercury",
        "make_display": "Mercury",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "mg",
        "make_display": "MG",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "mini",
        "make_display": "Mini",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "mitsubishi",
        "make_display": "Mitsubishi",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "monteverdi",
        "make_display": "Monteverdi",
        "make_is_common": "0",
        "make_country": "Switzerland"
    },
    {
        "make_id": "moretti",
        "make_display": "Moretti",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "morgan",
        "make_display": "Morgan",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "morris",
        "make_display": "Morris",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "nissan",
        "make_display": "Nissan",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "noble",
        "make_display": "Noble",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "nsu",
        "make_display": "NSU",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "oldsmobile",
        "make_display": "Oldsmobile",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "opel",
        "make_display": "Opel",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "packard",
        "make_display": "Packard",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "pagani",
        "make_display": "Pagani",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "panoz",
        "make_display": "Panoz",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "peugeot",
        "make_display": "Peugeot",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "pininfarina",
        "make_display": "Pininfarina",
        "make_is_common": "0",
        "make_country": "Italy"
    },
    {
        "make_id": "plymouth",
        "make_display": "Plymouth",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "pontiac",
        "make_display": "Pontiac",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "porsche",
        "make_display": "Porsche",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "proton",
        "make_display": "Proton",
        "make_is_common": "0",
        "make_country": "Malaysia"
    },
    {
        "make_id": "reliant",
        "make_display": "Reliant",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "renault",
        "make_display": "Renault",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "riley",
        "make_display": "Riley",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "rolls-royce",
        "make_display": "Rolls-Royce",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "rover",
        "make_display": "Rover",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "saab",
        "make_display": "Saab",
        "make_is_common": "1",
        "make_country": "Sweden"
    },
    {
        "make_id": "saleen",
        "make_display": "Saleen",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "samsung",
        "make_display": "Samsung",
        "make_is_common": "0",
        "make_country": "SouthKorea"
    },
    {
        "make_id": "saturn",
        "make_display": "Saturn",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "scion",
        "make_display": "Scion",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "seat",
        "make_display": "Seat",
        "make_is_common": "1",
        "make_country": "Spain"
    },
    {
        "make_id": "simca",
        "make_display": "Simca",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "singer",
        "make_display": "Singer",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "skoda",
        "make_display": "Skoda",
        "make_is_common": "1",
        "make_country": "CzechRepublic"
    },
    {
        "make_id": "smart",
        "make_display": "Smart",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "spyker",
        "make_display": "Spyker",
        "make_is_common": "1",
        "make_country": "Netherlands"
    },
    {
        "make_id": "ssangyong",
        "make_display": "SsangYong",
        "make_is_common": "0",
        "make_country": "SouthKorea"
    },
    {
        "make_id": "ssc",
        "make_display": "SSC",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "steyr",
        "make_display": "Steyr",
        "make_is_common": "0",
        "make_country": "Austria"
    },
    {
        "make_id": "studebaker",
        "make_display": "Studebaker",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "subaru",
        "make_display": "Subaru",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "sunbeam",
        "make_display": "Sunbeam",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "suzuki",
        "make_display": "Suzuki",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "talbot",
        "make_display": "Talbot",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "tata",
        "make_display": "Tata",
        "make_is_common": "1",
        "make_country": "India"
    },
    {
        "make_id": "tatra",
        "make_display": "Tatra",
        "make_is_common": "0",
        "make_country": "CzechRepublic"
    },
    {
        "make_id": "tesla",
        "make_display": "Tesla",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "toyota",
        "make_display": "Toyota",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "trabant",
        "make_display": "Trabant",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "triumph",
        "make_display": "Triumph",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "tvr",
        "make_display": "TVR",
        "make_is_common": "1",
        "make_country": "UK"
    },
    {
        "make_id": "vauxhall",
        "make_display": "Vauxhall",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "vector",
        "make_display": "Vector",
        "make_is_common": "1",
        "make_country": "Japan"
    },
    {
        "make_id": "venturi",
        "make_display": "Venturi",
        "make_is_common": "1",
        "make_country": "France"
    },
    {
        "make_id": "volkswagen",
        "make_display": "Volkswagen",
        "make_is_common": "1",
        "make_country": "Germany"
    },
    {
        "make_id": "volvo",
        "make_display": "Volvo",
        "make_is_common": "1",
        "make_country": "Sweden"
    },
    {
        "make_id": "wartburg",
        "make_display": "Wartburg",
        "make_is_common": "0",
        "make_country": "Germany"
    },
    {
        "make_id": "westfield",
        "make_display": "Westfield",
        "make_is_common": "0",
        "make_country": "UK"
    },
    {
        "make_id": "willys-overland",
        "make_display": "Willys-Overland",
        "make_is_common": "1",
        "make_country": "USA"
    },
    {
        "make_id": "xedos",
        "make_display": "Xedos",
        "make_is_common": "0",
        "make_country": "Japan"
    },
    {
        "make_id": "zagato",
        "make_display": "Zagato",
        "make_is_common": "1",
        "make_country": "Italy"
    },
    {
        "make_id": "zastava",
        "make_display": "Zastava",
        "make_is_common": "0",
        "make_country": "Serbia"
    },
    {
        "make_id": "zaz",
        "make_display": "ZAZ",
        "make_is_common": "0",
        "make_country": "Ukraine"
    },
    {
        "make_id": "zenvo",
        "make_display": "Zenvo",
        "make_is_common": "0",
        "make_country": "Denmark"
    },
    {
        "make_id": "zil",
        "make_display": "ZIL",
        "make_is_common": "0",
        "make_country": "Russia"
    }
]';

echo '<p class="header">Car Brands</p>';	
echo '<p>========================================================</p>';	 
	
echo '<p>Starting......</p>';

$brandJson = json_decode($brands);

if(count($brandJson) > 0) {
	
	/* Check exists. */
	for($i = 0; $i < count($brandJson); $i++) {
	
		$brandData = $brandObject->getByIdCountry($brandJson[$i]->make_id, $brandJson[$i]->make_country);
		
		if(!$brandData) {
		
			$data 	= array();	
			$data['brand_name']		= $brandJson[$i]->make_display;
			$data['brand_id']			= $brandJson[$i]->make_id;
			$data['brand_country']	= $brandJson[$i]->make_country;

			if($brandObject->insert($data)) {
				echo '<p class="success">'.$i.'.'.$brandJson[$i]->make_display.' from '.$brandJson[$i]->make_country.'</p>';
			} else {
				echo '<p class="error">'.$i.'. Error inserting '.$brandJson[$i]->make_display.' from '.$brandJson[$i]->make_country.'</p>';
			}
		} else {
			echo '<p class="error">'.$i.'. Duplicate '.$brandJson[$i]->make_display.' from '.$brandJson[$i]->make_country.'</p>';
		}
	}
} else {
	echo '<p>There are no items</p>';
}			

echo '<p>Finished......</p>';
echo '<p>========================================================</p>';	 
?>