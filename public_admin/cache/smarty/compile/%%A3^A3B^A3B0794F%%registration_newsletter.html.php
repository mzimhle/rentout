<?php /* Smarty version 2.6.20, created on 2014-09-09 17:31:51
         compiled from mailers/web/registration_newsletter.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'mailers/web/registration_newsletter.html', 43, false),array('modifier', 'capitalize', 'mailers/web/registration_newsletter.html', 43, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Business Lounge</title>
<?php echo '
<style type="text/css">
/* Client-specific Styles */
#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
/* Reset Styles */
body{margin:0; padding:0; background-color: #f1f1f1; font-size: 20px;}
img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
table td{border-collapse:collapse;}
#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
</style>
'; ?>

</head>
<body style="margin: 0; padding: 0; text-align: center; background-color: #f1f1f1;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f1f1f1" style="background: #f1f1f1">
	<tr>
    	<td>
            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="87" align="left" valign="middle" colspan="2"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/mail_logo_02.gif" width="600" height="87" border="0" alt="BUSINESS LOUNGE" style="font-family: Helvetica, Verdana, Arial, sans-serif; font-size: 60px; line-height: 0; color: #ef3c3f; font-weight: bold; display: block" /></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #FFFFFF; background-color: #17628c; padding: 20px;" bgcolor="#17628c" colspan="2">
                    	<img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/thank_txt.gif" width="560" height="78" alt="THANK YOU FOR REGISTERING ON OUR WEBSITE" style="font-weight: bold; font-size: 18px;" />
                        <div style="font-size: 12px;">
                        	<p style="font-weight: bold; font-size: 14px;">PLEASE CONFIRM YOUR EMAIL ADDRESS</p>
                            <p>Click the link below to activate your account or you can copy and paste it on your URL:<br /><br />
                            <a href="http://<?php echo $this->_tpl_vars['domain']; ?>
/registration/activate/<?php echo $this->_tpl_vars['mailinglist']['mailinglist_hashcode']; ?>
" style="text-decoration: none; font-weight: bold; color: #FFFFFF;"><font color="#FFFFFF">http://<?php echo $this->_tpl_vars['domain']; ?>
/registration/activate/<?php echo $this->_tpl_vars['mailinglist']['mailinglist_hashcode']; ?>
</font></a></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #000000; background-color: #FFFFFF; padding: 20px;" bgcolor="#FFFFFF" colspan="2">
                        <p>Good day <b><?php echo $this->_tpl_vars['mailinglist']['mailinglist_name']; ?>
 <?php echo $this->_tpl_vars['mailinglist']['mailinglist_surname']; ?>
</b>,</p>
						<p>
							Thank you for subscribing on our website, if you would like to specify categories with in the items you subscribed for, you can simply log into our website after you have confirmed your email address and add them under your account. <br /><br /><b>
							<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['mailinglist']['notifytypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = $this->_sections['foo']['loop'];
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
							  <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mailinglist']['notifytypes'][$this->_sections['foo']['index']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
s<?php if ($this->_sections['foo']['last']): ?><?php else: ?>, <?php endif; ?>
							<?php endfor; endif; ?></b> or which you will receive weekly notifications if there will be items within these types.
							<br /><br />
							Use your below login to change your details: 
							<br /><br />
							<table width="330" border="0" align="center" cellpadding="10" cellspacing="0"  style="font-size: 12px;">
								<tr>
									<td bgcolor="#CCC" align="left" valign="middle" height="20">Username</td>
									<td bgcolor="#CCC" align="left" valign="middle" height="20">:</td>
									<td bgcolor="#CCC" align="left" valign="middle" height="20"><?php echo $this->_tpl_vars['mailinglist']['participantlogin_username']; ?>
</td>
								</tr>
								<tr>
									<td bgcolor="#CCC" align="left" valign="middle" height="20">Password</td>
									<td bgcolor="#CCC" align="left" valign="middle" height="20">:</td>
									<td bgcolor="#CCC" align="left" valign="middle" height="20"><?php echo $this->_tpl_vars['mailinglist']['participantlogin_password']; ?>
</td>
								</tr>							
							</table>
							<br />
                      <p>Thank You,<br /><span style="font-weight: bold;">The Business Lounge Team</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="376" height="40" align="left" valign="middle" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #FFFFFF; background-color: #ef3c3f; padding: 20px;" bgcolor="#f16052">
                    	You received this email from <a style="text-decoration: none; font-weight: bold; color: #FFFFFF;" href="http://<?php echo $this->_tpl_vars['domain']; ?>
"><?php echo $this->_tpl_vars['domain']; ?>
</a><br />
                        This email was sent to <span style="font-weight: bold;"><?php echo $this->_tpl_vars['mailinglist']['mailinglist_email']; ?>
</span>
                    </td>
                    <td width="224" align="right" valign="middle" style="font-size: 18px; font-weight: bold; font-family: Helvetica, Verdana, Arial, sans-serif; color: #FFFFFF; background-color: #ef3c3f; padding: 20px;" bgcolor="#f16052">
                    	<a href="http://<?php echo $this->_tpl_vars['domain']; ?>
/" style="color: #FFFFFF;"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/w_icon_02.gif" alt="W" width="31" height="31" border="0" /></a> 
						<a href="https://www.facebook.com/bizlounge" style="color: #FFFFFF;"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/f_icon_02.gif" alt="f" width="31" height="31" border="0" /></a> 
						<a href="https://twitter.com/bizloungesa" style="color: #FFFFFF;"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/tw_icon_02.gif" width="31" height="31" alt="t" border="0" /></a> 
						<a href="http://www.linkedin.com/company/business-lounge-sa" style="color: #FFFFFF;"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/in_icon_02.gif" alt="in" width="31" height="31" border="0" /></a> 
						<a href="http://gplus.to/bizlounge" style="color: #FFFFFF;"><img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/web/images/g_icon_02.gif" width="28" height="31" alt="G" border="0" /></a>
                    </td>
                </tr>
            </table>
		</td>
	</tr>
</table>
<img src="http://<?php echo $this->_tpl_vars['domain']; ?>
/mailers/tracking/<?php echo $this->_tpl_vars['tracking']; ?>
" width="0" height="0" border="0"  />
</body>
</html>