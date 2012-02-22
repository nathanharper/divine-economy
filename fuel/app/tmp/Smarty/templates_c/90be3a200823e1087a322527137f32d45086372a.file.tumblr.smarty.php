<?php /* Smarty version Smarty 3.1.4, created on 2012-02-20 12:26:44
         compiled from "/Users/Nathan/mikeprecords/fuel/app/views/blog/tumblr.smarty" */ ?>
<?php /*%%SmartyHeaderCode:10337074324f412d907b00d3-74445995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90be3a200823e1087a322527137f32d45086372a' => 
    array (
      0 => '/Users/Nathan/mikeprecords/fuel/app/views/blog/tumblr.smarty',
      1 => 1329740262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10337074324f412d907b00d3-74445995',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f412d9081561',
  'variables' => 
  array (
    'posts' => 0,
    'p' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f412d9081561')) {function content_4f412d9081561($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['posts']->value){?>
	<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['p']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->iteration++;
 $_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['post_loop']['last'] = $_smarty_tpl->tpl_vars['p']->last;
?>
		<?php if (!in_array($_smarty_tpl->tpl_vars['p']->value->type,array('answer','chat'))){?>
		<div class="tumblr-entry <?php echo $_smarty_tpl->tpl_vars['p']->value->type;?>
">
			<div class="post-header">
				<div class="post-date">
					<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->post_url;?>
" target="_blank"><?php echo date('F j, Y',$_smarty_tpl->tpl_vars['p']->value->timestamp);?>
</a>
				</div>
				<?php if (isset($_smarty_tpl->tpl_vars['p']->value->title)){?>
					<div class="post-title"><b><?php echo $_smarty_tpl->tpl_vars['p']->value->title;?>
</b></div>
				<?php }?>
			</div>
			<div class="post-content">
				<?php if ($_smarty_tpl->tpl_vars['p']->value->type=='text'){?>
					<div class="post-text">
						<?php echo $_smarty_tpl->tpl_vars['p']->value->body;?>

					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='photo'){?>
					<?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['p']->value->photos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
?>
						<div class="post-photo">
							<img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value->alt_sizes[2]->url;?>
" />
							<div class="post-caption">
								<?php if ($_smarty_tpl->tpl_vars['photo']->value->caption){?>
									<?php echo $_smarty_tpl->tpl_vars['photo']->value->caption;?>

								<?php }else{ ?>
									<?php echo $_smarty_tpl->tpl_vars['p']->value->caption;?>

								<?php }?>
							</div>
						</div>
					<?php } ?>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='video'){?>
					<div class="post-video">
						<?php echo $_smarty_tpl->tpl_vars['p']->value->player[1]->embed_code;?>

					</div>
					<div class="post-caption"><?php echo $_smarty_tpl->tpl_vars['p']->value->caption;?>
</div>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='quote'){?>
					<div class="post-quote">
						<div class="quote-text"><em>"<?php echo $_smarty_tpl->tpl_vars['p']->value->text;?>
"</em></div>
						<div class="quote-source">&mdash;<?php echo $_smarty_tpl->tpl_vars['p']->value->source;?>
</div>
					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='link'){?>
					<div class="post-link">
						<a href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
" target="_blank">
							<?php if ($_smarty_tpl->tpl_vars['p']->value->description){?>
								<?php echo $_smarty_tpl->tpl_vars['p']->value->description;?>

							<?php }else{ ?>
								<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>

							<?php }?>
						</a>
					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='audio'){?>
					<div class="post-audio">
						<div class="name"><?php echo $_smarty_tpl->tpl_vars['p']->value->track_name;?>
</div>
						<?php if (!empty($_smarty_tpl->tpl_vars['p']->value->album_art)){?>
							<div class="art"><img src="<?php echo $_smarty_tpl->tpl_vars['p']->value->album_art;?>
" /></div>
						<?php }?>
						<div class="player"><?php echo $_smarty_tpl->tpl_vars['p']->value->player;?>
</div>
						<div class="caption"><?php echo $_smarty_tpl->tpl_vars['p']->value->caption;?>
</div>
					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='answer'){?>

				<?php }elseif($_smarty_tpl->tpl_vars['p']->value->type=='chat'){?>

				<?php }?>
			</div>
		</div>
		<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['post_loop']['last']){?><hr /><?php }?>
		<?php }?>
	<?php } ?>
<?php }else{ ?>
	<p>No entries found.</p>
<?php }?><?php }} ?>