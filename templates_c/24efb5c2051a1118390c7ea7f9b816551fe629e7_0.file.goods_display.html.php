<?php
/* Smarty version 3.1.32, created on 2018-06-06 10:37:28
  from '/opt/lampp/htdocs/mini_shop/templates/goods_display.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b1748e89058e8_57285638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24efb5c2051a1118390c7ea7f9b816551fe629e7' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/goods_display.html',
      1 => 1528252546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b1748e89058e8_57285638 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
	<div class="col-md-6">
		<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
" class="img-thumbnail">
	</div>

	<div class="col-md-6">
		<h2><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
</h2>
		<p>售價： <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
元整</p>
		<p>瀏覽人氣： <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_counter'];?>
</p>
		<hr>
			
		<div>
			<a href="index.php?op=add_to_cart&goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
&goods_title=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
" class="btn btn-primary" role="button">加入購物車</a>
		</div>
		<hr>

		<?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
			<div>
				<a href="tool.php?op=goods_form&goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
" class="btn btn-warning">編輯商品</a>
				<a href="tool.php?op=delete_goods&goods_sn=<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
" class="btn btn-danger">刪除商品</a>
			</div>
		<?php }?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active">
				<a href="#goods_content" aria-controls="goods_content" role="tab" data-toggle="tab">商品介紹</a>
			</li>


			<li role="presentation">
				<a href="#note" aria-controls="note" role="tab" data-toggle="tab">退換貨須知</a>
			</li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="goods_content">
				<h3>商品介紹</h3>
				<p><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_content'];?>
</p>
			</div>

			<div role="tabpanel" class="tab-pane" id="note">
				<h3>退換貨須知</h3>
				<p>如果你要退換貨，你要給我一顆btc</p>
			</div>
		</div>
	</div>
</div>
<?php }
}
