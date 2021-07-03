<?php /* Smarty version 2.6.20, created on 2014-11-17 05:08:38
         compiled from administration/includes/header.tpl */ ?>
<div id="header">
    <!-- Start Heading -->
        
    <div id="heading">
        <div id="ct_logo">

        </div>
       
    </div><!-- End Heading -->
	 <?php if (isset ( $this->_tpl_vars['admin'] )): ?>
    <!-- Start Top Nav -->
    <div id="topnav"> 
            <ul>
                <li><a href="/administration/" title="Home" <?php if ($this->_tpl_vars['page'] == 'default.php' || $this->_tpl_vars['page'] == ''): ?> class="active"<?php endif; ?>>Home</a></li>
				<li><a href="/administration/participants/" title="Members" <?php if ($this->_tpl_vars['page'] == 'participants'): ?> class="active"<?php endif; ?>>Participants</a></li>			
				<li><a href="/administration/event/" title="Event" <?php if ($this->_tpl_vars['page'] == 'event'): ?> class="active"<?php endif; ?>>Event</a></li>				
				<li><a href="/administration/communication/" title="Communication" <?php if ($this->_tpl_vars['page'] == 'communication'): ?> class="active"<?php endif; ?>>Communication</a></li>
            </ul>
    </div><!-- End Top Nav -->
  <div class="clearer"><!-- --></div>
  <?php endif; ?>
</div><!--header-->
<?php if (isset ( $this->_tpl_vars['admin'] )): ?>
    <div class="logged_in">
        <ul>
            <li><a href="/administration/logout.php" title="Logout">Logout</a></li>
        </ul>
    </div><!--logged_in-->
	<?php endif; ?>
  	<br />