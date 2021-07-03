<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.hash.php
 * Type:     function
 * Name:     hash
 * Purpose:  return a hash code
 * -------------------------------------------------------------
 */
 
function smarty_function_hash($params, &$smarty){
	return md5(rand(123,9876123).time());
}

?>