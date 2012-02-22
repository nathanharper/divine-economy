<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 12:34:01
         compiled from "/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/list.smarty" */ ?>
<?php /*%%SmartyHeaderCode:800653534f423db9811fd0-59773797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1df64dbe3c8e7549d667dd9cd2c080c20b255da' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/list.smarty',
      1 => 1324729507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '800653534f423db9811fd0-59773797',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'admin_config' => 0,
    'props' => 0,
    'key' => 0,
    'search' => 0,
    'class' => 0,
    'search_value' => 0,
    'msg' => 0,
    'field_props' => 0,
    'models' => 0,
    'model' => 0,
    'field_name' => 0,
    'admin_fields' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f423db9acc30',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f423db9acc30')) {function content_4f423db9acc30($_smarty_tpl) {?><p>You made it to the list For <?php echo strtoupper($_smarty_tpl->tpl_vars['table']->value);?>
</p>

<div id="list-search">
	<form action="/admin/list/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" method="POST">
		<table border="1px solid black" cellspacing="5" cellpadding="5" >
			<?php  $_smarty_tpl->tpl_vars['props'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['props']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['admin_config']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['props']->key => $_smarty_tpl->tpl_vars['props']->value){
$_smarty_tpl->tpl_vars['props']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['props']->key;
?>
				<?php if (!empty($_smarty_tpl->tpl_vars['props']->value['search'])){?>
					<?php if (!empty($_smarty_tpl->tpl_vars['search']->value[$_smarty_tpl->tpl_vars['key']->value])){?><?php $_smarty_tpl->tpl_vars['search_value'] = new Smarty_variable($_smarty_tpl->tpl_vars['search']->value[$_smarty_tpl->tpl_vars['key']->value], null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['search_value'] = new Smarty_variable(false, null, 0);?><?php }?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['props']->value['desc'];?>
: </td>
						<td><?php echo call_user_func_array(($_smarty_tpl->tpl_vars['props']->value['type']).('::get_search'),array($_smarty_tpl->tpl_vars['class']->value,$_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['search_value']->value));?>
</td>
					</tr>
				<?php }?>
			<?php } ?>
			<tr>
				<td><input type="submit" value="Search" /></td>
				<td><input type="button" value="Clear" onclick="window.location = '/admin/list/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
';" /></td>
			</tr>
		</table>
	</form>
</div>
<hr />
<div id="item-list">
	<a href="/admin/item/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
?new=1" style="text-decoration:none;"><button>Create New</button></a>
	<br />
	<?php if ($_smarty_tpl->tpl_vars['msg']->value){?>
		<br />
		<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span>
		<?php echo Html::br(2);?>

	<?php }?>
	<table cellpadding="5" cellspacing="0" class="bordered">
		<tr>
			<th>ID</th>
			<?php  $_smarty_tpl->tpl_vars['field_props'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_props']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_config']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_props']->key => $_smarty_tpl->tpl_vars['field_props']->value){
$_smarty_tpl->tpl_vars['field_props']->_loop = true;
?>
				<?php if (!empty($_smarty_tpl->tpl_vars['field_props']->value['list'])){?>
					<th><?php echo $_smarty_tpl->tpl_vars['field_props']->value['desc'];?>
</th>
				<?php }?>
			<?php } ?>
			<th></th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['model'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['model']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['models']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['model']->key => $_smarty_tpl->tpl_vars['model']->value){
$_smarty_tpl->tpl_vars['model']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['model']->value->id;?>
</a></td>
				<?php  $_smarty_tpl->tpl_vars['field_props'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_props']->_loop = false;
 $_smarty_tpl->tpl_vars['field_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['admin_config']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_props']->key => $_smarty_tpl->tpl_vars['field_props']->value){
$_smarty_tpl->tpl_vars['field_props']->_loop = true;
 $_smarty_tpl->tpl_vars['field_name']->value = $_smarty_tpl->tpl_vars['field_props']->key;
?>
					<?php if (!empty($_smarty_tpl->tpl_vars['field_props']->value['list'])){?>
						<td><?php echo $_smarty_tpl->tpl_vars['admin_fields']->value[$_smarty_tpl->tpl_vars['model']->value->id][$_smarty_tpl->tpl_vars['field_name']->value]->list_view();?>
</td>
					<?php }?>
				<?php } ?>
				<td><a href="/admin/item/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['model']->value->id;?>
">edit</a></td>
			</tr>
		<?php } ?>
	</table>
</div>
<?php echo Html::br(3);?>
<?php }} ?>