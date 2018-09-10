<?php
/* Smarty version 3.1.32, created on 2018-05-28 01:05:29
  from '/opt/lampp/htdocs/mini_shop/templates/side_login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0ae559b3f499_53994933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb43113fa39aa5d3e2dda08c20d3a60f557a2acc' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/side_login.html',
      1 => 1527439408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0ae559b3f499_53994933 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="form-horizontal" role="form" action="user.php" method="post">
	<div class="form-group">
		<label class="col-md-3 control-label">Account:</label>
		<div class="col-md-9">
			<input type="text" name="user_id" id="user_id" class="form-control" placeholder="Account">	
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label">Password:</label>
		<div class="col-md-9">
			<input type="password" name="user_passwd" id="user_passwd" class="form-control" placeholder="Password">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3">
			<a href="user.php?op=user_form" class="btn btn-link">Register</a>	
		</label>
		<div class="col-md-9">
			<input type="hidden" name="op" value="user_login">
			<button type="submit" name="button" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
</form>
<?php }
}
