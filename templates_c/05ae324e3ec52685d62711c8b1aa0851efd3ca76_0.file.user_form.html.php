<?php
/* Smarty version 3.1.32, created on 2018-06-01 00:33:36
  from '/opt/lampp/htdocs/mini_shop/templates/user_form.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b1023e0bc21d3_72722380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05ae324e3ec52685d62711c8b1aa0851efd3ca76' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/user_form.html',
      1 => 1527754386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b1023e0bc21d3_72722380 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 language="javascript" src="class/jquery.twzipcode-1.7.8.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="class/jQuery-Validation-Engine/js/languages/jquery.validationEngine-zh_TW.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="class/jQuery-Validation-Engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="class/jQuery-Validation-Engine/css/validationEngine.jquery.css" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
			$("#addr_form").twzipcode();
			$("#user_form").validationEngine();
	});
<?php echo '</script'; ?>
>

<h1>會員註冊</h1>
<hr>
<?php if ($_smarty_tpl->tpl_vars['user']->value['id_exist'] == true) {?>
	<div class="alert alert-danger">此帳號已被註冊</div>
<?php }
if ($_smarty_tpl->tpl_vars['user']->value['wrong_key'] == true) {?>
	<div class="alert alert-danger">驗證碼輸入錯誤</div>
<?php }?>

<form action="user.php" method="post" class="form-horizontal" id="user_form">
	<div class="form-group">
		<label class="col-md-2 control-label" for="user_name">姓名：</label>
		<div class="col-md-10">
			<input type="text" class="form-control validate[required]" name="user_name" id="user_name" placeholder="請輸入姓名" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
">
		</div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['user']->value['user_sn'] == '') {?>
		<div class="form-group">
			<label class="col-md-2 control-label" for="user_id">帳號：</label>
			<div class="col-md-10">
				<input type="text" class="form-control validate[required]" name="user_id" id="user_id" placeholder="請輸入帳號" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
">
			</div>
		</div>
	<?php }?>	

	<div class="form-group">
		<label class="col-md-2 control-label" for="user_passwd">密碼：</label>
		<div class="col-md-10">
			<input type="text" class="form-control <?php if ($_smarty_tpl->tpl_vars['user']->value['user_passwd'] == '') {?>validate[required]<?php }?>" name="user_passwd" id="user_passwd" placeholder="<?php if ($_smarty_tpl->tpl_vars['user']->value['user_passwd'] == '') {?>請輸入密碼<?php } else { ?>需要修改密碼才填寫<?php }?>">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" for="user_email">Email:</label>
		<div class="col-md-10">
			<input type="text" class="form-control validate[required, custom[email]]" name="user_email" id="user_email" placeholder="請輸入Email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 control-label" for="user_sex">性別：</label>
		<div class="col-md-10">
			<label class="radio-inline">
				<input type="radio" name="user_sex" id="user_sex_1" value="先生" <?php if ($_smarty_tpl->tpl_vars['user']->value['user_sex'] == "先生") {?>checked<?php }?>>先生
			</label>
			<label class="radio-inline">
				<input type="radio" name="user_sex" id="user_sex_2" value="小姐" <?php if ($_smarty_tpl->tpl_vars['user']->value['user_sex'] == "小姐") {?>checked<?php }?>>小姐
			</label>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 control-label" for="user_tel">電話：</label>
		<div class="col-md-10">
			<input type="text" class="form-control validate[required, custom[phone]]" name="user_tel" id="user_tel" placeholder="請輸入電話" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_tel'];?>
">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 control-label">地址：</label>
		<div id="addr_form">
			<div class="col-md-2">
				<div data-role="zipcode" 
					   data-name="user_zip" 
						 data-value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_zip'];?>
" 
						 data-style="form-control">
				</div>
			</div>
			
			<div class="col-md-2">
				<div data-role="county" 
					   data-name="user_county" 
						 data-value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_county'];?>
" 
						 data-style="form-control">
				</div>
			</div>

			<div class="col-md-2">
				<div data-role="district" 
				     data-name="user_district" 
						 data-value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_district'];?>
" 
						 data-style="form-control">
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control validate[required]" name="user_address" id="user_address" placeholder="請輸入地址" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_address'];?>
">
		</div>
	</div>

	<div class="form-group">
		<?php if ($_smarty_tpl->tpl_vars['user']->value['user_sn'] == '') {?>
			<label class="col-md-2 control-label" for="user_id">驗證：</label>
			<div class="col-md-1">
				<img src="pic.php" alt="請輸入驗證碼">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" validate[required] name="key" id="key" placeholder="請輸入驗證碼">
			</div>
		<?php } else { ?>
			<div class="col-md-6"></div>
		<?php }?>
		<div class="col-md-6">
			<?php if ($_smarty_tpl->tpl_vars['user']->value['user_sn'] > 0) {?>
				<input type="hidden" name="op" value="update_user">
				<input type="hidden" name="user_sn" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_sn'];?>
">
			<?php } else { ?>
				<input type="hidden" name="op" value="insert_user">
			<?php }?>
			<button type="submit" class="btn btn-primary">儲存</button>
		</div>
	</div>
</form>
<?php }
}
