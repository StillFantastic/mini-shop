<?php
/* Smarty version 3.1.32, created on 2018-06-04 11:54:19
  from '/opt/lampp/htdocs/mini_shop/templates/bill_check_out.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b14b7eb63b705_41659902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43e93bcf171b9ef38bc745f6c65f22565abe4c75' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/bill_check_out.html',
      1 => 1528048001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b14b7eb63b705_41659902 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>我的訂購單</h2>
<?php echo '<script'; ?>
 type="text/javascript">
	function check_total(goods_sn, amount, price) {
		var total = amount * price;
		$("#total_" + goods_sn).html(total + "元");
		$("#goods_total_" + goods_sn).val(total);

		var sum = 0;
		$(".price").each(function() {
			sum += Number($(this).val());
		});
		$("#bill_total_display").html(sum + "元");
		$("#bill_total").val(sum);
	}
<?php echo '</script'; ?>
>
<form action="bill.php" method="post" class="form-horizontal">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_arr']->value, 'goods', false, 'goods_sn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goods_sn']->value => $_smarty_tpl->tpl_vars['goods']->value) {
?>
		<div class="form-group">
			<label class="col-md-4 control-label" for="goods_amount"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="goods_amount[<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
]" id="goods_amount_<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
" placeholder="商品數量" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_amount'];?>
" onchange="check_total('<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
', this.value, '<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
')">
			</div>
			<div class="col-md-2 text-right">                                                                                              	
      	<p class="form-control-static">x <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
元</p>	
      </div>
      <div class="col-md-2 text-right">
      	<p class="form-control-static" id="total_<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
">小計: <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_total'];?>
元</p>
      	<input type="hidden" name="goods_total[<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
]" class="price" id="goods_total_<?php echo $_smarty_tpl->tpl_vars['goods_sn']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_total'];?>
">
      </div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<hr>
	<div class="form-group">
		<div class="col-md-offset-8 col-md-2 text-right">
			<p class="form-control-static" id="bill_total_display">總共: <?php echo $_smarty_tpl->tpl_vars['bill_total']->value;?>
元</p>
			<input type="hidden" class="form-control" name="bill_total" id="bill_total" placeholder="總計" value="<?php echo $_smarty_tpl->tpl_vars['bill_total']->value;?>
">
		</div>
	</div>
	<div class="text-center">
		<input type="hidden" name="op" value="save_bill">
		<button type="submit" class="btn btn-primary">送出訂購單</button>
	</div>
</form>
<?php }
}
