<?php
/* Smarty version 3.1.32, created on 2018-06-03 16:08:04
  from '/opt/lampp/htdocs/mini_shop/templates/side_cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b13a1e445ba51_15107967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07238966e8b65caabdbb333e23ea942ae272ec15' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/side_cart.html',
      1 => 1527943234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b13a1e445ba51_15107967 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="bill.php" method="post" class="form-horizontal" role="form">
	<div class="panel panel-info">
		<div class="panel-heading">我的購物車</div>
		<table class="table">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'goods', false, 'goods_sn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goods_sn']->value => $_smarty_tpl->tpl_vars['goods']->value) {
?>
				<tr>
					<td style="vertical-align: middle"><a href="index.php?goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
</a></td>
					<td>
						<div class="col-md-3" style="padding-right: 0px; padding-top: 7px">數量:</div>
						<div class="col-md-3" style="padding-left: 0px">
							<input type="text" name="goods_amount[<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_amount'];?>
" class="form-control" style="width: 40px">
						</div>
					</td> 
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<tr>
				<td colspan=2>
					<input type="hidden" name="op" value="check_out">
					<button type="submit" class="btn btn-block btn-success">結帳</button>
				</td>
			</tr>
		</table>
	</div>
</form>
<?php }
}
