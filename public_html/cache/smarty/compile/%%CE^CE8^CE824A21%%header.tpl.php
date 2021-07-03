<?php /* Smarty version 2.6.20, created on 2015-05-31 08:13:21
         compiled from includes/header.tpl */ ?>
<div id="header">
    <!-- Start Heading -->
        
    <div id="heading">
        <div id="ct_logo">

        </div>
       
    </div><!-- End Heading -->
	 <?php if (isset ( $this->_tpl_vars['administratorData'] )): ?>
    <!-- Start Top Nav -->
    <div id="topnav"> 
            <ul>
                <li><a href="/" title="Home" <?php if ($this->_tpl_vars['page'] == 'default.php' || $this->_tpl_vars['page'] == ''): ?> class="active"<?php endif; ?>>Home</a></li>
				<li><a href="/participant/" title="Participants" <?php if ($this->_tpl_vars['page'] == 'participant'): ?> class="active"<?php endif; ?>>Participants</a></li>			
				<li><a href="/car/" title="Car" <?php if ($this->_tpl_vars['page'] == 'car'): ?> class="active"<?php endif; ?>>Car</a></li>
				<li><a href="/brand/" title="Brand" <?php if ($this->_tpl_vars['page'] == 'brand'): ?> class="active"<?php endif; ?>>Brand</a></li>				
				<li><a href="/group/" title="Group" <?php if ($this->_tpl_vars['page'] == 'group'): ?> class="active"<?php endif; ?>>Group</a></li>
				<li><a href="/booking/" title="Booking" <?php if ($this->_tpl_vars['page'] == 'booking'): ?> class="active"<?php endif; ?>>Booking</a></li>
            </ul>
    </div><!-- End Top Nav -->
  <div class="clearer"><!-- --></div>
  <?php endif; ?>
</div><!--header-->
<?php if (isset ( $this->_tpl_vars['administratorData'] )): ?>
    <div class="logged_in">
        <ul>
            <li><a href="/logout.php" title="Logout">Logout</a></li>
        </ul>
    </div><!--logged_in-->
	<?php endif; ?>
  	<br />