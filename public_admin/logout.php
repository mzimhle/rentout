<?php
/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';
require_once 'includes/auth.php';
global $zfsession;
// Clear the identity from the session
unset($zfsession->identity);unset($zfsession);
//redirect to login page
header('Location: /login.php');
exit;
?>