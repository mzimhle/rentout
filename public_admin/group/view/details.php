<?php/* Add this on all pages on top. */set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');/*** Standard includes */require_once 'config/database.php';require_once 'config/smarty.php';/*** Check for login */require_once 'includes/auth.php';/* objects. */require_once 'class/group.php';require_once 'class/File.php';$groupObject 	= new class_group();$fileObject 	= new File(array('gif', 'png', 'jpg', 'jpeg', 'gif'));if (isset($_GET['code']) && trim($_GET['code']) != '') {		$code = trim($_GET['code']);		$groupData = $groupObject->getByCode($code);		if($groupData) {		$smarty->assign('groupData', $groupData);	} else {		header('Location: /group/view/');		exit;			}}/* Check posted data. */if(count($_POST) > 0) {	$errorArray		= array();	$data 				= array();	$formValid		= true;	$success			= NULL;	$areaByName	= NULL;		if(isset($_POST['group_name']) && trim($_POST['group_name']) == '') {		$errorArray['group_name'] = 'required';		$formValid = false;			}		if(isset($_FILES['grouplogo'])) {		/* Check validity of the CV. */		if((int)$_FILES['grouplogo']['size'] != 0 && trim($_FILES['grouplogo']['name']) != '') {			/* Check if its the right file. */			$ext = $fileObject->file_extention($_FILES['grouplogo']['name']); 			if($ext != '') {								$checkExt = $fileObject->getValidateExtention('grouplogo', $ext);								if(!$checkExt) {					$errorArray['grouplogo'] = 'Invalid file type something funny with the file format';					$formValid = false;										}			} else {				$errorArray['grouplogo'] = 'Invalid file type';				$formValid = false;												}		} else {						switch((int)$_FILES['grouplogo']['error']) {				case 1 : $errorArray['grouplogo'] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;				case 2 : $errorArray['grouplogo'] = 'File size exceeds the maximum file size'; $formValid = false; break;				case 3 : $errorArray['grouplogo'] = 'File was only partically uploaded, please try again'; $formValid = false; break;				//case 4 : $errorArray['grouplogo'] = 'No file was uploaded'; $formValid = false; break;				case 6 : $errorArray['grouplogo'] = 'Missing a temporary folder'; $formValid = false; break;				case 7 : $errorArray['grouplogo'] = 'Faild to write file to disk'; $formValid = false; break;			}		}	}		if(count($errorArray) == 0 && $formValid == true) {				$data 	= array();			$data['group_name']				= trim($_POST['group_name']);							if(isset($groupData)) {			/*Update. */			$where		= $groupObject->getAdapter()->quoteInto('group_code = ?', $groupData['group_code']);			$success	= $groupObject->update($data, $where);				$success	= $groupData['group_code'];		} else {			$success = $groupObject->insert($data);		}				/* Upload image if its added. */		if((int)$_FILES['grouplogo']['size'] != 0 && trim($_FILES['grouplogo']['name']) != '') {						$image = array();			$image['group_image_name']	= $fileObject->getRandomFileName();			$image['group_image_path']	= '';			$image['group_image_ext']	= '';						$ext 		= strtolower($fileObject->file_extention($_FILES['grouplogo']['name']));								$filename	= $image['group_image_name'].'.'.$ext;						$directory	= realpath(__DIR__.'/../../../public_html/').'/media/group/'.$success.'/logo/';			$file		= $directory.$filename;				if(!is_dir($directory)) mkdir($directory, 0777, true);			/* Create files for this product type. */			foreach($fileObject->logo as $item) {								$newfilename = str_replace($filename, $item['code'].$filename, $file);								/* Create new file and rename it. */				$uploadObject	= PhpThumbFactory::create($_FILES['grouplogo']['tmp_name']);				$uploadObject->resize($item['width'], $item['height']);				$uploadObject->save($newfilename);						}			$image['group_image_path']	= '/media/group/'.$success.'/logo/';			$image['group_image_ext']	= '.'.$ext;						$where = $groupObject->getAdapter()->quoteInto('group_code = ?', $success);			$groupObject->update($image, $where);							}				if(count($errorArray) == 0) {			header('Location: /group/view/');				exit;				}					}		/* if we are here there are errors. */	$smarty->assign('errorArray', $errorArray);	}$smarty->display('group/view/details.tpl');?>