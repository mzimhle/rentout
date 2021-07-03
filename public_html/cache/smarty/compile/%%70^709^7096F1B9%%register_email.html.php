<?php /* Smarty version 2.6.20, created on 2015-02-23 09:15:05
         compiled from /home/rentoutco/public_html/templates/register/register_email.html */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php echo '
<style type="text/css">
/* Client-specific Styles */
#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
/* Reset Styles */
body{margin:0; padding:0; background-color: #ececec; font-size: 20px;}
img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
table td{border-collapse:collapse;}
#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
a{color: #f57f20;text-decoration: none;}
</style>
'; ?>

</head>
<body style="margin: 0; padding: 0; text-align: left; background-color: #ececec;">
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5" style="background: #ececec">
	<tr>
    	<td>
            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td valign="top" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif;" bgcolor="#FFFFFF">
                    	<img src="http://www.rentout.co.za/templates/register/images/head.gif" width="600" height="137" border="0" alt="RentOut" style="display: block">
                    </td>
				</tr>
                <tr>
                    <td valign="top">
                    	<table width="600" border="0" align="left" cellpadding="16" cellspacing="0" bgcolor="#FFFFFF">
                        	<tr>
                            	<td valign="top" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #4c4c4c;" bgcolor="#FFFFFF">
                                	<span style="font-family: 'Source Sans Pro', Helvetica, Verdana, Arial, sans-serif; font-size: 20px; font-weight: bold; color: #156080; text-transform: uppercase;">Activate Registration</span><br />
									<br />
									<b>Good day <?php echo $this->_tpl_vars['mailinglist']['participant_name']; ?>
 <?php echo $this->_tpl_vars['mailinglist']['participant_surname']; ?>
</b>,
									<br /><br />
									Thank you for registering with RentOut, please click on the below link to activate and confirm your email address: <br /><br />
									<a href="http://www.rentout.co.za/register/activate.php?code=<?php echo $this->_tpl_vars['mailinglist']['participantlogin_hashcode']; ?>
">
										http://www.rentout.co.za/register/activate.php?code=<?php echo $this->_tpl_vars['mailinglist']['participantlogin_hashcode']; ?>

									</a>								
									<br /><br />
									<p>If the link does not open when you click on it, then copy the link text above and paste it in your browser's address bar.</p>
									<p><a style="text-decoration: none;" href="http://www.rentout.co.za/mailer/view/<?php echo $this->_tpl_vars['tracking']; ?>
" target="_blank">
										Click here to view on browser</a></p>
                                </td>
                            </tr>
                        </table>
					</td>
				</tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                	<td>
                        <table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="400" height="50" valign="bottom" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #4c4c4c;">
									3rd floor Standard Bank Centre, 304 Oak Avenue, Randburg, 2125<br />
									Tel: 011 039 6366<br />
									Fax: 086 238 7203<br />									
                                </td>
                                <td width="200" valign="bottom" align="right" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif;">
                                	<a href="https://www.twitter.com/rentoutsa" target="_blank">
										<img src="http://www.rentout.co.za/templates/register/images/tw_icon.png" width="30" height="30" border="0" alt="t" />
									</a>&nbsp;&nbsp;
                                    <a href="https://www.facebook.com/pages/RentOut/558106687659168" target="_blank">
										<img src="http://www.rentout.co.za/templates/register/images/fb_icon.png" width="30" height="30" border="0" alt="f" />
									</a>&nbsp;&nbsp;
                                    <a href="http://www.rentout.co.za/" target="_blank">
										<img src="http://www.rentout.co.za/templates/register/images/web_icon.png" width="30" height="30" border="0" alt="w" />
									</a>&nbsp;&nbsp;
                                </td>
                            </tr>
                        </table>
                	</td>
                </tr>
				<tr><td>&nbsp;</td></tr>
            </table>
		</td>
	</tr>
</table>
<img src="http://www.rentout.co.za/mailer/tracker/<?php echo $this->_tpl_vars['tracking']; ?>
" height="0" alt="" width="0" />
</body>
</html>