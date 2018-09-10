<?php
/* Smarty version 3.1.32, created on 2018-06-03 18:52:03
  from '/opt/lampp/htdocs/mini_shop/templates/index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b13c8534d3da5_89816846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0bd0e27098894b84cdcae9d0878cd0cd7a62c34' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/index_side.html',
      1 => 1528023119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:side_tools.html' => 1,
    'file:side_login.html' => 1,
    'file:side_cart.html' => 1,
  ),
),false)) {
function content_5b13c8534d3da5_89816846 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-primary">
	<div class="panel-heading">Logging</div>
	<div class="panel-body">
		<?php if ($_smarty_tpl->tpl_vars['isUser']->value) {?>
			<?php $_smarty_tpl->_subTemplateRender("file:side_tools.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php } else { ?>
			<?php $_smarty_tpl->_subTemplateRender("file:side_login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php }?>
	</div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['cart']->value) && $_smarty_tpl->tpl_vars['cart']->value != '' && $_smarty_tpl->tpl_vars['op']->value != "check_out") {?>
	<?php $_smarty_tpl->_subTemplateRender("file:side_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
}
