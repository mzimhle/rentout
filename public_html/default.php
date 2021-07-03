<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/* objects. */
require_once 'class/participant.php';
require_once 'class/car.php';
require_once 'class/group.php';
require_once 'class/image.php';
require_once 'class/File.php';

$participantObject	= new class_participant();
$carObject			= new class_car();
$groupObject			= new class_group();
$imageObject 		= new class_image();
$fileObject 			= new File(array('gif', 'png', 'jpg', 'jpeg', 'gif'));

/* Check posted data. */
if(count($_POST) > 0) {

	$errorArray		= array();
	$data 				= array();  
	$formValid		= true;
	$success			= NULL;
	
	/************************************************************************* CHECK PERSON */
	if(isset($_POST['areapost_code']) && trim($_POST['areapost_code']) == '') {
		$errorArray[] = 'Your area is required';
		$formValid = false;		
	}
	
	if(isset($_POST['participant_name']) && trim($_POST['participant_name']) == '') {
		$errorArray[] = 'Your name required';
		$formValid = false;		
	}
	
	if(isset($_POST['participant_surname']) && trim($_POST['participant_surname']) == '') {
		$errorArray[] = 'Your surname required';
		$formValid = false;		
	}
	
	if(isset($_POST['participant_email']) && trim($_POST['participant_email']) != '') {
		if($participantObject->validateEmail(trim($_POST['participant_email'])) == '') {
			$errorArray[] = 'Email needs to be a valid address';
			$formValid = false;	
		} else {
			
			$emailData = $participantObject->getByEmail(trim($_POST['participant_email']));

			if($emailData) {
				$errorArray[] = 'Email already exists';
				$formValid = false;				
			}
		}
	} else {
		$errorArray[] = 'Email is required';
		$formValid = false;		
	}
	
	if(isset($_POST['participant_cellphone']) && trim($_POST['participant_cellphone']) != '') {
		if($participantObject->validateCell(trim($_POST['participant_cellphone'])) == '') {
			$errorArray[] = 'Needs to be a valid cellphone';
			$formValid = false;	
		} else {
			
			$cellData = $participantObject->getByCell(trim($_POST['participant_cellphone']));

			if($cellData) {
				$errorArray[] = 'Cell number already exists';
				$formValid = false;				
			}
		}
	} else {
		$errorArray[] = 'Cellphone is required';
		$formValid = false;		
	}
	
	/************************************************************************* CHECK CAR */
	
	if(isset($_POST['model_code']) && trim($_POST['model_code']) == '') {
		$errorArray[] = 'Car model is required';
		$formValid = false;		
	}
	
	if(isset($_POST['group_code']) && trim($_POST['group_code']) == '') {
		$errorArray[] = 'Car group for pricing is required';
		$formValid = false;		
	}
	
	if(isset($_POST['car_year']) && trim($_POST['car_year']) == '') {
		$errorArray[] = 'Car year the owner bought it is required';
		$formValid = false;		
	} else {
		
		$year = (int)trim($_POST['car_year']);
		
		if($year >= 1900 && $year <= date('Y')) {
			/* Do nothing. */
		} else {
			$errorArray[] = 'Year bought should be between the years 1900 and '.date('Y');
			$formValid = false;
		}
	}
	
	if(isset($_POST['car_description']) && trim($_POST['car_description']) == '') {
		$errorArray[] = 'Car description is required';
		$formValid = false;		
	}

	if(isset($_FILES['imagefile']['name']) && count($_FILES['imagefile']['name']) > 0) {
		for($i = 0; $i < count($_FILES['imagefile']['name'][$i]); $i++) {
			/* Check validity of the CV. */
			if((int)$_FILES['imagefile']['size'][$i] != 0 && trim($_FILES['imagefile']['name'][$i]) != '') {
				/* Check if its the right file. */
				$ext = $fileObject->file_extention($_FILES['imagefile']['name'][$i]); 

				if($ext != '') {
					$checkExt = $fileObject->getValidateExtention('imagefile', $ext, $i);

					if(!$checkExt) {
						$errorArray[] = 'Invalid file type something funny with the file format';
						$formValid = false;						
					} else {
						/* Check width and height */
						$imagefile = $fileObject->getValidateSize($_FILES['imagefile']['size'][$i]);
						
						if(!$imagefile) {
							$errorArray[] = 'File needs to be less than 2MB.';
							$formValid = false;							
						}
					}
				} else {
					$errorArray[] = 'Invalid file type';
					$formValid = false;									
				}
			} else {			
				switch((int)$_FILES['imagefile']['error'][$i]) {
					case 1 : $errorArray[] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;
					case 2 : $errorArray[] = 'File size exceeds the maximum file size'; $formValid = false; break;
					case 3 : $errorArray[] = 'File was only partically uploaded, please try again'; $formValid = false; break;
					case 4 : $errorArray[] = 'No file was uploaded'; $formValid = false; break;
					case 6 : $errorArray[] = 'Missing a temporary folder'; $formValid = false; break;
					case 7 : $errorArray[] = 'Faild to write file to disk'; $formValid = false; break;
				}
			}
		}
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		/* Add person. */
		$data 	= array();				
		$data['areapost_code']			= trim($_POST['areapost_code']);		
		$data['participant_name']		= trim($_POST['participant_name']);		
		$data['participant_surname']	= trim($_POST['participant_surname']);			
		$data['participant_email']		= trim($_POST['participant_email']);		
		$data['participant_cellphone']	= trim($_POST['participant_cellphone']);	
		
		$participantcode = $participantObject->insertParticipant($data, 'EMAIL');				
		
		if($participantcode) {
			
			$participantData = $participantObject->_participantlogin->getByParticipant($participantcode, 'EMAIL');
			
			if($participantData) {
			
				/* Add car. */			
				$data = null; $data = array();
				$data['participant_code']	= $participantcode;								
				$data['model_code']			= trim($_POST['model_code']);				
				$data['car_year']				= trim($_POST['car_year']);							
				$data['car_description']		= trim($_POST['car_description']);				
				$data['group_code']			= trim($_POST['group_code']);		

				$carcode = $carObject->insert($data);
				
				if($carcode) {
				
					/* Upload image files. */
					if(isset($_FILES['imagefile']) && count($_FILES['imagefile']['name']) > 0) {
						for($i = 0; $i < count($_FILES['imagefile']['name']); $i++) {				
							$data = array();
							$data['image_code']	= $imageObject->createCode();		
							$data['item_code']	= $carcode;
							$data['image_type']	= 'CAR';
								
							$ext 		= strtolower($fileObject->file_extention($_FILES['imagefile']['name'][$i]));					
							$name		= $fileObject->getRandomFileName();
							$filename	= $name.'.'.$ext;		
							$directory	= $_SERVER['DOCUMENT_ROOT'].'/media/image/car/'.$carcode.'/'.$data['image_code'];
							$file		= $directory.'/'.$filename;	

				
							if(!is_dir($directory)) mkdir($directory, 0777, true);

							/* Create files for this product type. */
							foreach($fileObject->logo as $item) {
								
								$newfilename = str_replace($filename, $item['code'].$filename, $file);
								
								/* Create new file and rename it. */
								$uploadObject	= PhpThumbFactory::create($_FILES['imagefile']['tmp_name'][$i]);
								$uploadObject->resize($item['width'], $item['height']);
								$uploadObject->save($newfilename);		
							}

							$data['image_path']	= '/media/image/car/'.$carcode.'/'.$data['image_code'].'/';
							$data['image_name']	= $name;
							$data['image_ext']	= '.'.$ext ;

							$success	= $imageObject->insert($data);	
						}
					}
					
					/* Upload image files. 					
					if(count($errorArray) == 0) {
					
						if(isset($_FILES['imagefiles']) && count($_FILES['imagefiles']['name']) > 0) {
							for($i = 0; $i < count($_FILES['imagefiles']['name']); $i++) {
								if(isset($_FILES['imagefiles']['size'][$i])) {
									if((int)$_FILES['imagefiles']['size'][$i] != 0 && trim($_FILES['imagefiles']['name'][$i]) != '') {
										$filename	= $_FILES['imagefiles']['name'][$i];
										$directory	= $_SERVER['DOCUMENT_ROOT'].'/media/template/'.$data['account_code'].'/'.$success.'/images/';
										$file			= $directory.'/'.$filename;
									
										if(!file_put_contents($file, file_get_contents($_FILES['imagefiles']['tmp_name'][$i]))) {					
											$errorArray['imagefiles'] = 'could not upload file, please try again';
											$formValid = false;			
										}
									}
								}
							}
						}
					}
					*/
					
					if($success) {
						header('Location: /register/success.php?code='.$participantData['mailinglist_hashcode']);
						exit;
					} else {
						$errorArray[] = 'You were registered as well as the car\'s details car, but we could not add the car image.';
						$formValid = false;				
					}
				} else {
					$errorArray[] = 'You were registered but we could not add the car, follow instructions on the email we sent you, then log in and add the car again.';
					$formValid = false;				
				}
			} else {
				$errorArray[] = 'We could not register you, please try again';
				$formValid = false;				
			}
		} else {
			$errorArray[] = 'We could not register you, please try again';
			$formValid = false;				
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', implode('<br />', $errorArray));	
}


$grouppairs = $groupObject->pairs(true);
if($grouppairs) $smarty->assign('grouppairs', $grouppairs);

/* Display the template */	
$smarty->display('default.tpl');

/* Clear. */
$participantObject = $carObject = $groupObject = $imageObject = $fileObject = $errorArray = $data = $formValid = $success = $emailData = $cellData = $ext = null;
$checkExt = $imagefile = $participantcode = $participantData = $name = $directory = $newfilename = $carcode = $grouppairs = null;

unset($participantObject,$carObject,$groupObject,$imageObject,$fileObject,$errorArray,$data,$formValid,$success,$emailData,$cellData,$ext);
unset($checkExt,$imagefile,$participantcode,$participantData,$name,$directory,$newfilename,$carcode, $grouppairs);
?>