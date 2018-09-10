<?php
/* Smarty version 3.1.32, created on 2018-06-07 13:30:32
  from '/opt/lampp/htdocs/mini_shop/templates/goods_form.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b18c2f8156573_91632393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d684802c607bca52e24e5fa288585b30f1541a1' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/goods_form.html',
      1 => 1527941958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b18c2f8156573_91632393 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="class/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<h1>Publish Product</h1>
<hr>
<form action="tool.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"> 
	<div class="form-group">
		<label class="col-md-2 control-label" style="text-align: left">Product name:</label>
		<div class="col-md-10">
			<input type="text" class="form-control" name="goods_title" id="goods_title" placeholder="Please fill in the good's name" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" style="text-align: left">Content:</label>
		<div class="col-md-10">
			<textarea class="form-control" name="goods_content" id="goods_content" placeholder="Please fill in the good's content"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_content'];?>
</textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" style="text-align: left">Price:</label>
		<div class="col-md-10">
			<input type="text" class="form-control" name="goods_price" id="goods_price" placeholder="Please fill in the good's price" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
">
		</div>
	</div>
			
	<div class="form-group">
		<label class="col-md-2 control-label" style="text-align: left">Uplode image:</label>
		<div class="col-md-10">
			<input type="file" name="goods_pic" id="goods_pic">
			<?php if (isset($_smarty_tpl->tpl_vars['goods']->value['pic'])) {?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_title'];?>
" class="img-thumbnail">
			<?php }?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			<?php if (isset($_smarty_tpl->tpl_vars['goods']->value['goods_sn']) && $_smarty_tpl->tpl_vars['goods']->value['goods_sn'] > 0) {?>
				<input type="hidden" name="op" value="update_goods">
				<input type="hidden" name="goods_sn" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_sn'];?>
">
			<?php } else { ?>
			<input type="hidden" name="op" value="insert_goods">
			<?php }?>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>

<?php echo '<script'; ?>
>
	CKEDITOR.replace("goods_content");
<?php echo '</script'; ?>
>
<?php }
}
