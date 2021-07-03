<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'includes/auth.php';

/* objects. */
require_once 'class/car.php';
require_once 'class/image.php';
require_once 'class/File.php';

$carObject		= new class_car();
$imageObject 	= new class_image();
$fileObject 	= new File(array('gif', 'png', 'jpg', 'jpeg', 'gif'));

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$carData = $carObject->getByCode($code);

	if($carData) {
		$smarty->assign('carData', $carData);
		
		$imageData = $imageObject->getByItem($carData['car_code'], 'CAR');

		if($imageData) {
			$smarty->assign('imageData', $imageData);
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
		$where[]	= $imageObject->getAdapter()->quoteInto('item_code = ?', $carData['car_code']);
		
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

	if($errorArray['error']  == '') {

		if(isset($_GET['image_primary']) && trim($_GET['image_primary']) == $itemcode) {			
			$imageObject->updatePrimaryByItem(trim($_GET['image_primary']), $carData['car_code'], 'CAR');			
		}
		
		$data 	= array();
		$data['image_active']	= isset($_GET['image_active']) && (int)trim($_GET['image_active']) == 1 ? 1 : 0;	
		
		$where		= array();
		$where[]	= $imageObject->getAdapter()->quoteInto('image_code = ?', $itemcode);
		$where[]	= $imageObject->getAdapter()->quoteInto('item_code = ?', $carData['car_code']);
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
if(isset($_FILES['imagefile'])) {

	$errorArray	= array();
	$data 			= array();
	$formValid	= true;
	$success		= NULL;
	
	if(isset($_FILES['imagefile'])) {
		/* Check validity of the CV. */
		if((int)$_FILES['imagefile']['size'] != 0 && trim($_FILES['imagefile']['name']) != '') {
			/* Check if its the right file. */
			$ext = $fileObject->file_extention($_FILES['imagefile']['name']); 

			if($ext != '') {				
				$checkExt = $fileObject->getValidateExtention('imagefile', $ext);				
				if(!$checkExt) {
					$errorArray['imagefile'] = 'Invalid file type something funny with the file format';
					$formValid = false;						
				} else {
					/* Check width and height */
					$imagefile = getimagesize($_FILES['imagefile']['tmp_name']);
					
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
			switch((int)$_FILES['imagefile']['error']) {
				case 1 : $errorArray['imagefile'] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;
				case 2 : $errorArray['imagefile'] = 'File size exceeds the maximum file size'; $formValid = false; break;
				case 3 : $errorArray['imagefile'] = 'File was only partically uploaded, please try again'; $formValid = false; break;
				case 4 : $errorArray['imagefile'] = 'No file was uploaded'; $formValid = false; break;
				case 6 : $errorArray['imagefile'] = 'Missing a temporary folder'; $formValid = false; break;
				case 7 : $errorArray['imagefile'] = 'Faild to write file to disk'; $formValid = false; break;
			}
		}
	}

	if(count($errorArray) == 0 && $formValid == true) {
		
		$data = array();
		$data['image_code']	= $imageObject->createCode();		
		$data['item_code']		= $carData['car_code'];
		$data['image_type']	= 'CAR';
			
		$ext 		= strtolower($fileObject->file_extention($_FILES['imagefile']['name']));					
		$name		= $fileObject->getRandomFileName();
		$filename	= $name.'.'.$ext;		
		$directory	= realpath(__DIR__.'/../../../public_html/').'/media/image/car/'.$carData['car_code'].'/'.$data['image_code'];
		$file		= $directory.'/'.$filename;	

		if(!is_dir($directory)) mkdir($directory, 0777, true);

		/* Create files for this product type. */
		foreach($fileObject->logo as $item) {
			
			$newfilename = str_replace($filename, $item['code'].$filename, $file);
			
			/* Create new file and rename it. */
			$uploadObject	= PhpThumbFactory::create($_FILES['imagefile']['tmp_name']);
			$uploadObject->resize($item['width'], $item['height']);
			$uploadObject->save($newfilename);		
		}

		$data['image_path']	= '/media/image/car/'.$carData['car_code'].'/'.$data['image_code'].'/';
		$data['image_name']	= $name;
		$data['image_ext']	= '.'.$ext ;

		$success	= $imageObject->insert($data);	

		if(is_numeric($success)) {
			header('Location: /car/view/image.php?code='.$carData['car_code']);
			exit;
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
}

/* Display the template */	
$smarty->display('car/view/image.tpl');

?>