<?php
/* Smarty version 3.1.32, created on 2018-06-07 12:30:14
  from '/opt/lampp/htdocs/mini_shop/templates/display_bill.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b18b4d69cf773_60042541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dea26f996086bbebc88cdf2d2a70ac0d87c6f15' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/display_bill.html',
      1 => 1528344467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b18b4d69cf773_60042541 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_date'];?>
 訂購項目 <?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_status'];?>
</h2>
<div>收貨人: <?php echo $_smarty_tpl->tpl_vars['bill']->value['user_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['bill']->value['user_sex'];?>
</div>
<div>收貨地址: <?php echo $_smarty_tpl->tpl_vars['bill']->value['user_zip'];
echo $_smarty_tpl->tpl_vars['bill']->value['user_county'];
echo $_smarty_tpl->tpl_vars['bill']->value['user_district'];
echo $_smarty_tpl->tpl_vars['bill']->value['user_address'];?>
</div>
<div>收貨電話: <?php echo $_smarty_tpl->tpl_vars['bill']->value['user_tel'];?>
</div>
<hr>
<table class="table">
	<tr>
		<th>商品名稱</th>
		<th>單價</th>
		<th>數量</th>
		<th style="text-align: right">小計</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bill_detail']->value, 'bill');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['bill']->value['goods_title'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['bill']->value['goods_price'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['bill']->value['goods_amount'];?>
</td>
			<td style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['bill']->value['goods_total'];?>
 元</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_total'];?>
 元</td>
	</tr>
</table>

<?php if ($_smarty_tpl->tpl_vars['isAdmin']->value && $_smarty_tpl->tpl_vars['bill']->value['bill_status'] == '') {?>
	<?php echo '<script'; ?>
 src="class/bootstrap-sweetalert/sweet-alert.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" type="text/css" href="class/bootstrap-sweetalert/sweet-alert.css">
	<?php echo '<script'; ?>
 type="text/javascript">
		function delete_bill(bill_sn) {
			swal({
				title: "確定要刪除此訂單嗎?",
				text: "刪除之後，該訂單的資料會消失哦!",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "btn-danger",
				confirmButtonText: "是!我要刪了他!",
				CloseOnConfirm: false
				},
				function() {
					location.href = 'bill.php?op=delete_bill&bill_sn=' + bill_sn;
				});
		}
	<?php echo '</script'; ?>
>
	<a href="javascript:delete_bill('<?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_sn'];?>
')" class="btn btn-danger">刪除訂單</a>
	<a href="bill.php?op=finish_bill&bill_sn=<?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_sn'];?>
" class="btn btn-primary">已出貨</a>
	<a href="pdf.php?op=bill_pdf&bill_sn=<?php echo $_smarty_tpl->tpl_vars['bill']->value['bill_sn'];?>
" class="btn btn-info">列印出貨單</a>
<?php }
}
}
