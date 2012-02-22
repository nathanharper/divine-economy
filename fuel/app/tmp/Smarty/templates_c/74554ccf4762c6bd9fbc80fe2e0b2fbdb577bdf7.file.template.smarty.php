<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 12:33:55
         compiled from "/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/template.smarty" */ ?>
<?php /*%%SmartyHeaderCode:4891372924f423db3bf87c0-70195165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74554ccf4762c6bd9fbc80fe2e0b2fbdb577bdf7' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/template.smarty',
      1 => 1321362473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4891372924f423db3bf87c0-70195165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css' => 0,
    'js' => 0,
    'tabs' => 0,
    'key' => 0,
    'table' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f423db3dbf99',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f423db3dbf99')) {function content_4f423db3dbf99($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
	<title><?php echo Config::get('project_name','');?>
 Admin</title>
	<?php echo Asset::css($_smarty_tpl->tpl_vars['css']->value);?>

	<?php echo Asset::js($_smarty_tpl->tpl_vars['js']->value);?>

</head>
<body>
	<?php if (Auth::instance('SimpleAuth')->check()){?>
		<form action="/admin" method="get">
			<input type="submit" value="Logout" name="logout" />
		</form>
		<br />
		<div id="admin-tabs">
			<table border="0" cellspacing="5" cellpadding="5">
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['table']->value){?>
						<?php echo strtoupper($_smarty_tpl->tpl_vars['key']->value);?>

					<?php }else{ ?>
						<a href="/admin/list/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo strtoupper($_smarty_tpl->tpl_vars['key']->value);?>
</a>
					<?php }?>
					<?php echo Html::nbs(3);?>

				<?php } ?>
			</table>
		</div>
		<hr />
	<?php }?>
	<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

</body>
</html><?php }} ?>