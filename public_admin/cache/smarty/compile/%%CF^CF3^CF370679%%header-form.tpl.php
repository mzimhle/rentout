<?php /* Smarty version 2.6.20, created on 2014-09-20 06:53:51
         compiled from includes/header-form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'includes/header-form.tpl', 37, false),array('modifier', 'capitalize', 'includes/header-form.tpl', 37, false),)), $this); ?>
<section class="container topbox">
    <div class="row no-gutter">
        <div class="col-xs-12 col-md-8">
            <div class="promobox equal">
                <div id="intabs">
                	<ul class="promotab">
                    	<li><a href="#tender" data-toggle="tab" class="active"><img src="/images/tender_btn.gif" alt="Tenders" /></a></li>
                    	<li><a href="#listings" data-toggle="tab"><img src="/images/list_btn.gif" alt="Business Listings" /></a></li>
                    	<li><a href="#jobs" data-toggle="tab"><img src="/images/jobs_btn.gif" alt="Jobs" /></a></li>
                    </ul>
                </div>
                <div class="promoads tab-content">
                	<div class="promoad1 pad tab-pane fade active" id="tender"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                    <div class="promoad2 pad tab-pane fade" id="listings"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                    <div class="promoad3 pad tab-pane fade" id="jobs"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 hidden-xs">
            <div class="newssub equal">
                <h6>Newsletter Signup!</h6>
				<?php if (! isset ( $this->_tpl_vars['subscriptionregsuccess'] )): ?>
                <p class="hidden-md">Get the latest content first.</p>				
                <form id="subform newsletterForm" name="newsletterForm" class="bigform" role="form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>
">
					
                    <input type="text" name="articlename" id="articlename" class="form-control subname" required value="Full Name" />
                    <input type="text" name="articleemail" id="articleemail" class="form-control subemail" required value="Email Address" />
                    <input type="checkbox" name="subtender" id="subtender" class="css-checkbox" value="TENDER" /><label for="subtender" class="checklabel">Tenders</label>&nbsp;
                    <input type="checkbox" name="subleads" id="subleads" class="css-checkbox" value="TRADE-LEAD"/><label for="subleads" class="checklabel">Trade Leads</label>&nbsp;
                    <input type="checkbox" name="subjobs" id="subjobs" class="css-checkbox" value="JOB" /><label for="subjobs" class="checklabel">Jobs</label>&nbsp;
					<input type="checkbox" name="subarticle" id="subarticle" class="css-checkbox" value="ARTICLE" /><label for="subarticle" class="checklabel">Articles</label><br />
					<button onclick="submitNewsletterForm();" class="btn" >Subscribe Now</button>
                    <!-- <input type="button" name="subscribe" value="Subscribe Now" id="subscribe" class="btn subbtn" onclick="submitNewsletterForm();" /> -->
					<?php if (isset ( $this->_tpl_vars['errorArray'] )): ?><br /><?php echo $this->_tpl_vars['errorArray']; ?>
<?php endif; ?>
                </form>
				<?php else: ?>
					<p class="hidden-md"><b>You have successfully registered for <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['subscriptionregtypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['subscriptionregtypes'][$this->_sections['foo']['index']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
s<?php if ($this->_sections['foo']['last']): ?><?php else: ?>, <?php endif; ?><?php endfor; endif; ?></b></p>	
				<?php endif; ?>				
            </div>
        </div>
    </div>
</section>