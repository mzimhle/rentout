<?php/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');/*** Standard includes */require_once 'config/database.php';
require_once 'config/smarty.php';/** * Check for login */require_once 'includes/auth.php';require_once 'class/brand.php';$brandObject = new class_brand();  if(isset($_GET['delete_code'])) {		$errorArray				= array();	$errorArray['error']	= '';	$errorArray['result']	= 0;		$formValid				= true;	$success					= NULL;	$code						= trim($_GET['delete_code']);			if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {		$data	= array();		$data['brand_deleted'] = 1;				$where = $brandObject->getAdapter()->quoteInto('brand_code = ?', $code);		$success	= $brandObject->update($data, $where);					if(is_numeric($success) && $success > 0) {			$errorArray['error']	= '';			$errorArray['result']	= 1;					} else {			$errorArray['error']	= 'Could not delete, please try again.';			$errorArray['result']	= 0;						}	}		echo json_encode($errorArray);	exit;}/* Setup Pagination. */$brandData = $brandObject->getAll('brand_deleted = 0','brand.brand_added');if($brandData) $smarty->assign_by_ref('brandData', $brandData);/* End Pagination Setup. */$smarty->display('brand/view/default.tpl');?>