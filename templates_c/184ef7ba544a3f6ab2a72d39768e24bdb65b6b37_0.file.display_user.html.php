<?php
/* Smarty version 3.1.32, created on 2018-06-02 20:20:54
  from '/opt/lampp/htdocs/mini_shop/templates/display_user.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b128ba6c40511_66494793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '184ef7ba544a3f6ab2a72d39768e24bdb65b6b37' => 
    array (
      0 => '/opt/lampp/htdocs/mini_shop/templates/display_user.html',
      1 => 1527941941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b128ba6c40511_66494793 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>會員資料</h1>
<div class="row">
	<?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
		<div class="col-md-2">
			<select size=10 class="form-control" onChange="location.href='user.php?user_sn='+this.value">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_user']->value, 'men');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['men']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['men']->value['user_sn'];?>
" <?php if ($_smarty_tpl->tpl_vars['now_user_sn']->value == $_smarty_tpl->tpl_vars['men']->value['user_sn']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['men']->value['user_name'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</div>
	<?php }?>

	<div class="col-md-10">
  	<table class="table table-hover table-bordered table-responsive table-striped">
  		<tr>
  			<td>姓名</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
</td>
  		</tr>
  		<tr>
  			<td>帳號</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
</td>
  		</tr>
  		<tr>
  			<td>Email</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
</td>
  		</tr>
  		<tr>
  			<td>性別</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_sex'];?>
</td>
  		</tr>
  		<tr>
  			<td>電話</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_tel'];?>
</td>
  		</tr>
  		<tr>
  			<td>地址</td>
  			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_zip'];
echo $_smarty_tpl->tpl_vars['user']->value['user_county'];
echo $_smarty_tpl->tpl_vars['user']->value['user_district'];
echo $_smarty_tpl->tpl_vars['user']->value['user_address'];?>
</td>
  		</tr>
  	</table>
  	
  	<div class="text-center">
  		<a href="user.php?op=user_form&user_sn=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_sn'];?>
" class="btn btn-primary">編輯帳號</a>
  		<?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
				<?php echo '<script'; ?>
 src="class/bootstrap-sweetalert/sweet-alert.min.js"><?php echo '</script'; ?>
>
				<link rel="stylesheet" type="text/css" href="class/bootstrap-sweetalert/sweet-alert.css">
				<?php echo '<script'; ?>
 type="text/javascript">
					function delete_user(user_sn) {
						swal({
								title: "確定要刪除嗎?",
								text: "刪掉之後，該會員所有資料會消失哦！",
								type: "warning",
								showCancelButton: true,
								confirmButtonClass: "btn-danger",
								confirmButtonText: "是！我要刪了他",
								closeOnConfirm: false 
						},
						function() {
							location.href='user.php?op=delete_user&user_sn=' + user_sn;
							//swal("刪除成功", "Success");
						});
					}
				<?php echo '</script'; ?>
>
				<?php if ($_smarty_tpl->tpl_vars['now_user_sn']->value != $_smarty_tpl->tpl_vars['login_user']->value['user_sn']) {?>
					<a href="javascript:delete_user('<?php echo $_smarty_tpl->tpl_vars['user']->value['user_sn'];?>
')" class="btn btn-danger">刪除帳號</a>
				<?php }?>
  		<?php }?>
  	</div>
  </div>
</div>



<?php }
}
