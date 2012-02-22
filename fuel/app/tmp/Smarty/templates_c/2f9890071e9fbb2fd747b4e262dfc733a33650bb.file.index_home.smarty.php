<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 14:46:39
         compiled from "/Users/Nathan/mikeprecords/fuel/app/views/home/index_home.smarty" */ ?>
<?php /*%%SmartyHeaderCode:14521439554f4124aa19cfa7-31821639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f9890071e9fbb2fd747b4e262dfc733a33650bb' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/views/home/index_home.smarty',
      1 => 1329749193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14521439554f4124aa19cfa7-31821639',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f4124aa20f5d',
  'variables' => 
  array (
    'releases' => 0,
    'r' => 0,
    'post_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4124aa20f5d')) {function content_4f4124aa20f5d($_smarty_tpl) {?><h1><?php echo Config::get('project_name');?>
</h1>
<form method="" action="">
	
	<div id="artists-container">
		<div class="head_link_container">
			<a href="javascript:void(0);" onclick="$('#info-container').load_release();" class="head_link">
				CATALOGUE
			</a>
		</div>
		<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['releases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
			<div class="sub_link_container">
				<a href="javascript:void(0);" onclick="$('#info-container').load_release('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
');">
					<?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>

				</a>
			</div>
		<?php } ?>
		
		<div class="head_link_container">
			<a href="javascript:void(0);" class="head_link" onclick="$('#info-container').load_blog();">
				TUMBLR
			</a>
		</div>
		<?php  $_smarty_tpl->tpl_vars['post_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post_type']->_loop = false;
 $_from = array('audio','video','photo'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post_type']->key => $_smarty_tpl->tpl_vars['post_type']->value){
$_smarty_tpl->tpl_vars['post_type']->_loop = true;
?>
			<div class="sub_link_container">
				<a href="javascript:void(0);" onclick="$('#info-container').load_blog('<?php echo $_smarty_tpl->tpl_vars['post_type']->value;?>
');">
					<?php echo $_smarty_tpl->tpl_vars['post_type']->value;?>

				</a>
			</div>
		<?php } ?>
		<div class="sub_link_container">
			<a href="javascript:void(0);" onclick="$('#info-container').load_blog('','gig');">events</a>
		</div>
		
		<div class="head_link_container"><a href="#" class="head_link">MIXES</a></div>
		
		<div class="head_link_container"><a href="/contact" class="head_link">CONTACT</a></div>
		
	</div>
	
	<div id="info-container"></div>
	
</form>
<?php }} ?>