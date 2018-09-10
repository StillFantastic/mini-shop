<?php
/* Smarty version 3.1.32, created on 2018-05-25 00:06:51
  from '/opt/lampp/htdocs/mini_shop/templates/goods_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b06e31b4525f4_91938930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af7de69dcaaf742fcabdd394939cbbd657770f6a' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/goods_list.html',
      1 => 1527145187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b06e31b4525f4_91938930 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_goods']->value, 'goods');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->value) {
?>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="index.php?goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
">
				</a>
				<div class="caption">
					<div style="height: 60px;">
						<h3><a href="index.php?goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
</a></h3>
					</div>
					<div class="row">
						<div class="col-md-6">
							售價： <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
 
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
