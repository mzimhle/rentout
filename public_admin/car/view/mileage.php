<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

/* Other resources. */
require_once 'includes/auth.php';

require_once 'class/car.php';
require_once 'class/mileage.php';
require_once 'class/mileagetype.php';
require_once 'class/image.php';
require_once 'class/File.php';

$carObject				= new class_car();
$mileageObject			= new class_mileage();
$mileagetypeObject	= new class_mileagetype();
$imageObject			= new class_image();
$fileObject 				= new File(array('gif', 'png', 'jpg', 'jpeg', 'gif'));

if (!empty($_GET['code']) && $_GET['code'] != '') {

	$code = trim($_GET['code']);

	$carData = $carObject->getByCode($code);
	
	if($carData) {
		$smarty->assign('carData', $carData);
		
		$mileageData = $mileageObject->getByCar($code);

		if($mileageData) {
			
			for($i = 0; $i < count($mileageData); $i++) {
				
				$mileageData[$i]['images'] = array();
				$temp = $imageObject->getByItem($mileageData[$i]['mileage_code'], 'MILEAGE');
				
				if($temp) {
					$mileageData[$i]['images'] = $temp;
				}
			}
			
			$smarty->assign('mileageData', $mileageData);
		}
		
	} else {
		header('Location: /car/view/');
		exit;
	}
} else {
	header('Location: /car/view/');
	exit;
}

/* Check posted data. */
if(isset($_GET['image_code_delete'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['image_code_delete']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {	
		$data	= array();
		$data['image_deleted'] = 1;
		
		$where		= array();
		$where[]	= $imageObject->getAdapter()->quoteInto('image_code = ?', $itemcode);
		$where[]	= $imageObject->getAdapter()->quoteInto('image_type = ?', 'MILEAGE');
		
		$success	= $imageObject->update($data, $where);	
		
		if(is_numeric($success) && $success > 0) {		
			$errorArray['error']	= '';
			$errorArray['result']	= 1;			
		} else {
			$errorArray['error']	= 'Could not delete, please try again.';
			$errorArray['result']	= 0;				
		}
	}
	
	echo json_encode($errorArray);
	exit;
}

/* Check posted data. */
if(isset($_GET['image_code_update'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;
	$data 						= array();
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['image_code_update']);
	$mileage					= trim($_GET['mileage_code']);

	if($errorArray['error']  == '') {

		if(isset($_GET['image_primary']) && trim($_GET['image_primary']) == $itemcode) {			
			$imageObject->updatePrimaryByItem(trim($_GET['image_primary']), $mileage, 'MILEAGE');			
		}
		
		$data 	= array();		
		$data['image_description'] 			= trim($_GET['image_description']);			
		
		$where		= array();
		$where[]	= $imageObject->getAdapter()->quoteInto('image_code = ?', $itemcode);
		$where[]	= $imageObject->getAdapter()->quoteInto('image_type = ?', 'MILEAGE');
		$success	= $imageObject->update($data, $where);	

		if(is_numeric($success)) {		
			$errorArray['error']	= '';
			$errorArray['result']	= 1;			
		} else {
			$errorArray['error']	= 'Could not update, please try again.';
			$errorArray['result']	= 0;				
		}
	}
	
	echo json_encode($errorArray);
	exit;
}

/* Check posted data. */
if(isset($_GET['deleteitem'])) {

	$errorArray				= array();
	$errorArray['message']	= '';
	$error					= array();
	$errorArray['result']	= 0;
	$data 					= array();
	$formValid				= true;
	$success				= NULL;
	
	if(isset($_REQUEST['deleteitem']) && trim($_REQUEST['deleteitem']) == '') {
		$error[] = 'Please select item to delete';
		$formValid = false;		
	}	
	
	if($formValid && count($error)  == 0 ) {
	
		$data = array();
		$data['mileage_deleted'] = 1;
		$data['mileage_code'] = trim($_REQUEST['deleteitem']);
		
		$where	= array();
		$where[]	= $mileageObject->getAdapter()->quoteInto('car_code = ?',  $carData['car_code']);
		$where[]	= $mileageObject->getAdapter()->quoteInto('mileage_code = ?',  trim($_REQUEST['deleteitem']));
		$success	= $mileageObject->update($data, $where);
	}
	
	if($success) {		
		$errorArray['message']	= '';
		$errorArray['result']	= 1;				
	} else {
		$errorArray['message']	= 'Could not update, please try again: '.implode(", ", $error);
		$errorArray['result']	= 0;				
	}	
	
	echo json_encode($errorArray);
	exit;	
}

if(count($_POST) > 0 && isset($_POST['mileage_code_selected']) && trim($_POST['mileage_code_selected']) == '') {

	$errorArray		= array();
	$data 			= array();
	$formValid		= true;
	$success		= NULL;
	
	if(isset($_POST['mileage_number']) && trim($_POST['mileage_number']) == '') {
		$errorArray['mileage_number'] = 'Mileage in KM is required';
		$formValid = false;		
	} else if((int)trim($_POST['mileage_number']) == 0) { 
		$errorArray['mileage_number'] = 'Mileage needs to be only in numbers';
		$formValid = false;		
	}
	
	$mileagetype = $mileagetypeObject->getByName('INITIAL');
	
	if(!$mileagetype) {		
		$errorArray['mileagetype_code'] = 'Mileage type was not founbd.';
		$formValid = false;					
	}
	
	if(count($errorArray) == 0 && $formValid == true) {

		$data['mileage_number'] 	= trim($_POST['mileage_number']);	
		$data['mileagetype_code']	= $mileagetype['mileagetype_code'];
		$data['car_code']			= $carData['car_code'];

		/* Insert. */
		$success = $mileageObject->insert($data);
							
		if($success) {
			header('Location: /car/view/mileage.php?code='.$carData['car_code']);
			exit;	
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	
}

/* Check posted data. */
if(count($_POST) > 0 && isset($_POST['mileage_code_selected']) && trim($_POST['mileage_code_selected']) != '') {

	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	$mileagecode	= trim($_POST['mileage_code_selected']);
	
	if(isset($_FILES['imagefile_'.$mileagecode])) {
		/* Check validity of the CV. */
		if((int)$_FILES['imagefile_'.$mileagecode]['size'] != 0 && trim($_FILES['imagefile_'.$mileagecode]['name']) != '') {
			/* Check if its the right file. */
			$ext = $fileObject->file_extention($_FILES['imagefile_'.$mileagecode]['name']); 

			if($ext != '') {				
				$checkExt = $fileObject->getValidateExtention('imagefile_'.$mileagecode, $ext);				
				if(!$checkExt) {
					$errorArray['imagefile'] = 'Invalid file type something funny with the file format';
					$formValid = false;						
				} else {
					/* Check width and height */
					$imagefile = getimagesize($_FILES['imagefile_'.$mileagecode]['tmp_name']);
					
					if($imagefile[0] < 150 || $imagefile < 150) {
						$errorArray['imagefile'] = 'Image needs to have a width more than 150 pixels as well as a height that is more than 150 pixels';
						$formValid = false;							
					}
				}
			} else {
				$errorArray['imagefile'] = 'Invalid file type';
				$formValid = false;									
			}
		} else {
			switch((int)$_FILES['imagefile_'.$mileagecode]['error']) {
				case 1 : $errorArray['imagefile'] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;
				case 2 : $errorArray['imagefile'] = 'File size exceeds the maximum file size'; $formValid = false; break;
				case 3 : $errorArray['imagefile'] = 'File was only partically uploaded, please try again'; $formValid = false; break;
				case 4 : $errorArray['imagefile'] = 'No file was uploaded'; $formValid = false; break;
				case 6 : $errorArray['imagefile'] = 'Missing a temporary folder'; $formValid = false; break;
				case 7 : $errorArray['imagefile'] = 'Faild to write file to disk'; $formValid = false; break;
			}
		}
	}
	
	if(isset($_POST['mileage_code_selected']) && trim($_POST['mileage_code_selected']) == '') {
		$errorArray['mileage_code_selected'] = 'Please select a mileage for the image';
		$formValid = false;		
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data = array();
		$data['image_code']			= $imageObject->createCode();		
		$data['item_code']				= $mileagecode;
		$data['image_description']	= trim($_POST['image_description_'.$mileagecode]);
		$data['image_type']			= 'MILEAGE';
			
		$ext 			= strtolower($fileObject->file_extention($_FILES['imagefile_'.$mileagecode]['name']));					
		$name		= $fileObject->getRandomFileName();
		$filename	= $name.'.'.$ext;		
		$directory	= realpath(__DIR__.'/../../../public_html/').'/media/image/car/'.$carData['car_code'].'/mileage/'.$data['image_code'];
		$file			= $directory.'/'.$filename;	

		if(!is_dir($directory)) mkdir($directory, 0777, true);

		/* Create files for this product type. */
		foreach($fileObject->logo as $item) {
			
			$newfilename = str_replace($filename, $item['code'].$filename, $file);
			
			/* Create new file and rename it. */
			$uploadObject	= PhpThumbFactory::create($_FILES['imagefile_'.$mileagecode]['tmp_name']);
			$uploadObject->resize($item['width'], $item['height']);
			$uploadObject->save($newfilename);		
		}

		$data['image_path']	= '/media/image/car/'.$carData['car_code'].'/mileage/'.$data['image_code'].'/';
		$data['image_name']	= $name;
		$data['image_ext']	= '.'.$ext ;

		$success	= $imageObject->insert($data);	

		if(is_numeric($success)) {
			header('Location: /car/view/mileage.php?code='.$carData['car_code']);
			exit;
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
	
}
 /* Display the template  */	
$smarty->display('car/view/mileage.tpl');
?>