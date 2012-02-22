<?php /* Smarty version Smarty 3.1.4, created on 2012-02-19 16:34:50
         compiled from "/Users/Nathan/mikeprecords/fuel/app/views/template.smarty" */ ?>
<?php /*%%SmartyHeaderCode:12471432894f4124aa09e034-05312437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f73747bc8350379c66ca75432c220448ce7ba5b' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/views/template.smarty',
      1 => 1326339427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12471432894f4124aa09e034-05312437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'css' => 0,
    'js' => 0,
    'headers' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f4124aa18aa9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4124aa18aa9')) {function content_4f4124aa18aa9($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<?php echo Asset::css($_smarty_tpl->tpl_vars['css']->value);?>

	<?php echo Asset::js($_smarty_tpl->tpl_vars['js']->value);?>

	<?php echo $_smarty_tpl->tpl_vars['headers']->value;?>

</head> 
<body>
	<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

</body>
</html><?php }} ?>