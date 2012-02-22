<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 14:57:05
         compiled from "/Users/Nathan/mikeprecords/fuel/app/views/releases/releases.smarty" */ ?>
<?php /*%%SmartyHeaderCode:19601801994f425b7daff4f3-32468892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f775a3c3591d426f09f1b0779ff01e7a44701557' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/views/releases/releases.smarty',
      1 => 1329749817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19601801994f425b7daff4f3-32468892',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f425b7dcbed6',
  'variables' => 
  array (
    'release' => 0,
    'track' => 0,
    'releases' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f425b7dcbed6')) {function content_4f425b7dcbed6($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['release']->value)){?>
	<div class="release-content">
		<img src="<?php echo $_smarty_tpl->tpl_vars['release']->value->get_image(array('field'=>'artwork','dimension'=>'230x230'));?>
" />
		<?php  $_smarty_tpl->tpl_vars['track'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['track']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['release']->value->tracks; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['track_loop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['track']->key => $_smarty_tpl->tpl_vars['track']->value){
$_smarty_tpl->tpl_vars['track']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['track_loop']['iteration']++;
?>
			<div class="track">
				<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['track_loop']['iteration'];?>
. &nbsp; <?php echo $_smarty_tpl->tpl_vars['track']->value->name;?>

			</div>
		<?php } ?>
	</div>
<?php }elseif(!empty($_smarty_tpl->tpl_vars['releases']->value)){?>
	<table id="mosaic">
		<tr>
			<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['releases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
				<td>
					<a href="javascript:void(0);" onclick="$('#info-container').load_release('<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
');">
						<img src="<?php echo $_smarty_tpl->tpl_vars['r']->value->get_image(array('field'=>'artwork','dimension'=>'230x230'));?>
" />
					</a>
				</td>
			<?php } ?>
		</tr>
	</table>
<?php }else{ ?>
	<p>There was an error retrieving the data. Please reload the page, or try again later.</p>
<?php }?><?php }} ?>