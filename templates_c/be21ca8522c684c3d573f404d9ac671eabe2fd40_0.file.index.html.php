<?php
/* Smarty version 3.1.32, created on 2018-06-05 14:53:39
  from '/opt/lampp/htdocs/mini_shop/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b1633736e33d3_09537412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be21ca8522c684c3d573f404d9ac671eabe2fd40' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/index.html',
      1 => 1528181503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:goods_form.html' => 1,
    'file:goods_display.html' => 1,
    'file:user_form.html' => 1,
    'file:display_user.html' => 1,
    'file:bill_check_out.html' => 1,
    'file:display_bill.html' => 1,
    'file:list_bill.html' => 1,
    'file:goods_list.html' => 1,
    'file:index_side.html' => 1,
  ),
),false)) {
function content_5b1633736e33d3_09537412 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-Hant">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</head>
	
	<body>
		<div class="container">
				<div id="shop_head">
					<a href="index.php">
						<img src="images/title.jpg" alt="Mini Shop" clss="img-responsive" width="100%" />
					</a>
				</div>
				<div id="shop_main" class="row">
					<div class="col-md-8">
						<?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
							<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['op']->value == "goods_form") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:goods_form.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>	
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "goods_display") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:goods_display.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "user_form") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:user_form.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "display_user") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:display_user.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "check_out") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:bill_check_out.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "display_bill") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:display_bill.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "list_bill") {?>
							<?php $_smarty_tpl->_subTemplateRender("file:list_bill.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
						<?php } else { ?>
							<?php $_smarty_tpl->_subTemplateRender("file:goods_list.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
							共有<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
件商品
							<?php echo $_smarty_tpl->tpl_vars['bar']->value;?>

						<?php }?>
					</div>
					
					<div class="col-md-4">
						<?php $_smarty_tpl->_subTemplateRender("file:index_side.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					</div>
				</div>
				
				<div id="shop_foot">
					<div>Address: sjfieojfiojiojsioejfojfoijsiekfjsl</div>
					<div>Phone: 0909123456</div>
					<div>Copy Right soeijfioj soeifj</div>	
				</div>
		</div>
	</body>
</html>
<?php }
}
