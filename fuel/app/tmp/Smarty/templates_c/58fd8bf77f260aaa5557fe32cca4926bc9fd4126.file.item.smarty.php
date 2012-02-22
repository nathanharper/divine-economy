<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 12:57:32
         compiled from "/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/item.smarty" */ ?>
<?php /*%%SmartyHeaderCode:4747421564f42433c2be922-37656516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58fd8bf77f260aaa5557fe32cca4926bc9fd4126' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/modules/admin/views/item.smarty',
      1 => 1324735283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4747421564f42433c2be922-37656516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
    'success' => 0,
    'item' => 0,
    'item_config' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f42433c6c2b9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f42433c6c2b9')) {function content_4f42433c6c2b9($_smarty_tpl) {?><p>welcome to item view.</p>
<a href="/admin/list/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
">back to list</a>
<?php echo Html::br(2);?>

<span style="color:green;"><?php if (isset($_smarty_tpl->tpl_vars['success']->value)){?><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
<?php }?></span>

<form action="/admin/item/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
?<?php if ($_smarty_tpl->tpl_vars['item']->value->id){?>id=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
<?php }else{ ?>new=1<?php }?>" method="POST" name="save_item" enctype="multipart/form-data">
<table border="0" cellspacing="5" cellpadding="5">
	<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_config']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
		<tr>
			<td valign="top"><?php echo $_smarty_tpl->tpl_vars['field']->value['desc'];?>
: </td>
			<td><?php echo $_smarty_tpl->tpl_vars['field']->value['type']->item_view();?>
</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="2">
			<input type="submit" value="save" name="save_item" />
			<input type="button" value="cancel" onclick="window.location = '/admin/list/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
';" />
			<?php if ($_smarty_tpl->tpl_vars['item']->value->id){?>
				<input type="submit" value="delete" name="delete" onclick="alert('Are you sure you want to delete this record?');"/>
			<?php }?>
		</td>
	</tr>
</table>
</form>
<?php echo Html::br(3);?>
<?php }} ?>