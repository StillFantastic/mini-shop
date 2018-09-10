<?php
/* Smarty version 3.1.32, created on 2018-06-07 13:09:04
  from '/opt/lampp/htdocs/mini_shop/templates/side_tools.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b18bdf0d66cb8_48521678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5830ce37a675af7044453c92f17364a5bffdf765' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/side_tools.html',
      1 => 1528348143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b18bdf0d66cb8_48521678 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['login_user']->value['user_name'];?>
 hello!</div>

<form action="index.php" method="get" role="form">
	<div class="input-group">
		<input name="keyword" type="text" class="form-control" placeholder="請輸入關鍵字">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">搜尋</button>
		</span>
	</div>
</form>
<br>
<a href="index.php" class="btn btn-block btn-primary">Home Page</a>
<a href="user.php?op=display_user&user_sn=<?php echo $_smarty_tpl->tpl_vars['login_user']->value['user_sn'];?>
" class="btn btn-block btn-info">My account</a>
<?php if ($_smarty_tpl->tpl_vars['isUser']->value) {?>
	<a href="bill.php" class="btn btn-block btn-warning">My Order</a>
<?php }
if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
	<a href="tool.php?op=goods_form" class="btn btn-block btn-success">Publish Product</a>
<?php }?>
<a href="user.php?op=user_logout" class="btn btn-block btn-danger">Logout</a>
<?php }
}
