<?php /* Smarty version 2.6.20, created on 2014-09-07 19:03:42
         compiled from administration/resources/mailers/comms/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Comm Sent</title>
</head>
<body>
	<a href="/administration/resources/mailers/comms/"><h3>Go Back</h3></a>
	<?php echo $this->_tpl_vars['commsData']['_comm_name']; ?>
 - <?php echo $this->_tpl_vars['commsData']['_comm_email']; ?>
<br />
	Output: <?php echo $this->_tpl_vars['commsData']['_comm_output']; ?>
<br /><br />
	Mailer Sent: <br /><br />
	<?php echo $this->_tpl_vars['commsData']['_comm_html']; ?>

</body>
</html>