<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 12:33:55
         compiled from "/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/login.smarty" */ ?>
<?php /*%%SmartyHeaderCode:756908924f423db3dd3506-70306548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a47a4682f53669782c301d2851f783bc8c72e9' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/login.smarty',
      1 => 1319898648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '756908924f423db3dd3506-70306548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f423db3e7483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f423db3e7483')) {function content_4f423db3e7483($_smarty_tpl) {?><form name="login" method="POST" action="/admin">
	<?php if (isset($_smarty_tpl->tpl_vars['msg']->value)){?>
		<p style="color:red;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
	<?php }?>
	<table>
		<tr><td>Username:</td><td><input type="text" name="username" /></td></tr>
		<tr><td>Password:</td><td><input type="password" name="password" /></td></tr>
		<tr><td colspan="2"><input type="submit" value="submit" name="submit_login" /></td></tr>
	</table>
</form>

<?php }} ?>