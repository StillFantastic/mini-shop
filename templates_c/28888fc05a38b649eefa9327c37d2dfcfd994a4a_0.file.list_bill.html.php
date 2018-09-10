<?php
/* Smarty version 3.1.32, created on 2018-06-06 10:40:27
  from '/opt/lampp/htdocs/mini_shop/templates/list_bill.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b17499b465698_42771636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28888fc05a38b649eefa9327c37d2dfcfd994a4a' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/list_bill.html',
      1 => 1528252824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b17499b465698_42771636 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>訂單管理<?php } else { ?>我的訂單<?php }?></h1>
<div class="row">
	<?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
		<div class="col-md-2">
			<select size=10 class="form-control" onChange="location.href='bill.php?user_sn='+this.value">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_user']->value, 'mem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mem']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['mem']->value['user_sn'];?>
" <?php if ($_smarty_tpl->tpl_vars['now_user_sn']->value == $_smarty_tpl->tpl_vars['mem']->value['user_sn']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mem']->value['user_name'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</div>
	<?php }?>
	<div class="col-md-10">
		<ul class="list-group">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bill_arr']->value, 'bill');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
?>
				<li class="list-group-item">
					<span class="badge"><?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_total'];?>
</span>
					<a href="bill.php?op=display_bill&bill_sn=<?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_sn'];?>
"><?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_date'];?>
</a>
					<?php if ($_smarty_tpl->tpl_vars['bill']->value['bill_status']) {?><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_status'];?>
</span><?php }?>
				</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	</div>
</div>
<?php }
}
