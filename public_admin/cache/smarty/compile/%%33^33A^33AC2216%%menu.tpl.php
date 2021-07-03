<?php /* Smarty version 2.6.20, created on 2014-09-20 06:53:50
         compiled from includes/menu.tpl */ ?>
<section class="container">
	<div class="row">
    	<div class="col-xs-12 col-md-12">
            <nav class="navbar">
            	<div id="menubtn"> Menu</div>
            	<div class="mainnav cf">
                    <ul>
                        <li><a href="/" <?php if ($this->_tpl_vars['page'] == '' || $this->_tpl_vars['page'] == '/'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-home fa-lg"></span>Home</a></li>
                        <li><a href="/tenders/" <?php if ($this->_tpl_vars['page'] == 'tenders'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-paste fa-lg"></span>Tenders</a></li>
                        <li><a href="/trade-leads/" <?php if ($this->_tpl_vars['page'] == 'trade-leads'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-tags fa-lg"></span>Trade Leads</a></li>
                        <li><a href="/companies/" <?php if ($this->_tpl_vars['page'] == 'companies'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-bank fa-lg"></span>Companies</a></li>                        
                        <li><a href="/jobs/" <?php if ($this->_tpl_vars['page'] == 'jobs'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-briefcase fa-lg"></span>Jobs</a></li>
						<li><a href="/articles/" <?php if ($this->_tpl_vars['page'] == 'articles'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-file-text-o fa-lg"></span>News Articles</a></li>
                        <!-- <li><a href="/support/"><span class="hidden-md fa fa-support fa-lg"></span>Support</a></li> -->
                        <li><a href="/contact-us/" <?php if ($this->_tpl_vars['page'] == 'contact-us'): ?>class="hbtn"<?php endif; ?>><span class="hidden-md fa fa-phone fa-lg"></span>Contacts Us</a></li>
                    </ul>
                </div>
            </nav>
		</div>
	</div>
</section>