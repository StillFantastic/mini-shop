<?php

/* Include */
require_once("header.php");

/* Process Control */
$op = isset($_REQUEST["op"]) ? my_filter($_REQUEST["op"]) : "";
$user_sn = isset($_REQUEST["user_sn"]) ? my_filter($_REQUEST["user_sn"], "int") : 0;
$user_id = isset($_REQUEST["user_id"]) ? my_filter($_REQUEST["user_id"]) : "";
$hold = isset($_REQUEST["hold"]) ? my_filter($_REQUEST["hold"], "int") : 0;
$wrong_key = isset($_REQUEST["wrong_key"]) ? my_filter($_REQUEST["wrong_key"], "int") : 0;
switch ($op) {
	case "user_form":
		user_form($user_sn, $hold, $wrong_key);
		break;
	
	case "insert_user":
		if (id_exist()) {
			echo "<form action='user.php?op=user_form&hold=1' method='post' id='myForm'>";
			unset($_POST["op"]);
			foreach ($_POST as $var_name => $var_value) {
				echo "<input type='hidden' name='{$var_name}' value='{$var_value}'>";
			}
			echo "</form>";
			echo "<script type='text/javascript'>document.getElementById('myForm').submit();</script>";
			exit;
		}
			
		global $mysqli;
		foreach ($_POST as $var_name => $var_val) {
			$$var_name = $mysqli->real_escape_string($var_val);
		}

		if ($key != $_SESSION["key"]) {
			echo "<form action='user.php?op=user_form&wrong_key=1' method='post' id='myForm'>";
			unset($_POST["op"]);
			foreach ($_POST as $var_name => $var_value) {
				echo "<input type='hidden' name='{$var_name}' value='{$var_value}'>";
			}
			echo "</form>";
			echo "<script type='text/javascript'>document.getElementById('myForm').submit();</script>";
			exit;
		}

		$user_sn = insert_user();
		header("location: {$_SERVER["PHP_SELF"]}?op=display_user&user_sn={$user_sn}");
		exit;
		break;

	case "update_user":
		update_user($user_sn);
		header("location: {$_SERVER["PHP_SELF"]}?op=display_user&user_sn={$user_sn}");
		exit;
		break;

	case "delete_user":
		delete_user($user_sn);
		header("location: {$_SERVER["PHP_SELF"]}");
		exit;
		break;

	case "user_login":
		$login = user_login($user_id);
		if ($login)
			header("location: {$_SERVER["PHP_SELF"]}");
		else
			header("location: index.php");
		exit;
		break;

	case "user_logout":
		user_logout();
		header("location: index.php");
		exit;
		break;

	case "display_user":
	default:
		$op = "display_user";
		display_user($user_sn);
		break;
}


/* Output */
require_once("footer.php");


/* Function */
function user_form($user_sn, $hold, $wrong_key) {
	global $mysqli, $smarty, $isAdmin, $isUser;
	if ($user_sn) {
		if (!$isUser) {
			die("非會員，勿亂搞");
		} else {
			$user_sn = $isAdmin ? $user_sn : $_SESSION["user_sn"];
		}
	}
	if (empty($user_sn)) {
		if ($hold) {
			$user = $_POST;
			$user["user_passwd"] = "";
			$user["id_exist"] = true;
		} elseif ($wrong_key) {
			$user = $_POST;
			$user["user_passwd"] = "";
			$user["wrong_key"] = true;
		}	else {
			$sql = "EXPLAIN `users`";
			$result = $mysqli->query($sql) or die($mysqli->connect_error);
			while (list($field_name) = $result->fetch_row()) {
				$user[$field_name] = "";
			}
		}
	} else {
		$sql = "SELECT * FROM `users` WHERE `user_sn`='{$user_sn}'";
		$result = $mysqli->query($sql) or die($mysqli->connect_error);
		$user = $result->fetch_assoc();
	}
	$smarty->assign("user", $user);
}

function insert_user() {
	global $mysqli;
	foreach ($_POST as $var_name => $var_val) {
		$$var_name = $mysqli->real_escape_string($var_val);
	}
	$user_passwd = password_hash($_POST["user_passwd"], PASSWORD_DEFAULT);

	$sql = "INSERT INTO `users` (`user_name`, `user_id`, `user_passwd`, `user_email`, `user_sex`, `user_tel`, `user_zip`, `user_county`, `user_district`, `user_address`) VALUES ('{$user_name}', '{$user_id}', '{$user_passwd}', '{$user_email}', '{$user_sex}', '{$user_tel}', '{$user_zip}', '{$user_county}', '{$user_district}', '{$user_address}')";
	$mysqli->query($sql) or die($mysqli->connect_error);
	$user_sn = $mysqli->insert_id;
	$_SESSION["user_sn"] = $user_sn;
	$_POST["user_sn"] = $user_sn;
	$_SESSION["user"] = $_POST;
	return $user_sn;
}

function display_user($user_sn) {
	global $mysqli, $smarty, $isAdmin, $isUser;
	if (empty($user_sn)) {
		$user_sn = $_SESSION["user_sn"];
	}
	if ($isUser) {
		$user_sn = $isAdmin ? $user_sn : $_SESSION["user_sn"];
	} else {
		die("非會員，請勿亂搞");
	}
	$sql = "SELECT * FROM `users` WHERE `user_sn`='{$user_sn}'";
	$result = $mysqli->query($sql) or die($mysqli->connect_error);
	$user = $result->fetch_assoc();
	$smarty->assign("user", $user);

	$all_user = "";
	if ($isAdmin) {
		$sql = "SELECT * FROM `users`";
		$result = $mysqli->query($sql) or die($mysqli->connect_error);
		$all_user = $result->fetch_all(MYSQLI_ASSOC);
	}
	$smarty->assign("all_user", $all_user);
	$smarty->assign("now_user_sn", $user_sn);
}

function update_user($user_sn) {
	global $mysqli, $isUser, $isAdmin;
	if ($isUser) {
		$user_sn = $isAdmin ? $user_sn : $_SESSION["user_sn"];
	} else {
		return;
	}
	foreach ($_POST as $var_title => $var_value) {
		$$var_title = $mysqli->real_escape_string($var_value);
	}
	$passwd_update = "";
	if (!empty($_POST["user_passwd"])) {
		$user_passwd = password_hash($_POST["user_passwd"], PASSWORD_DEFAULT);
		$passwd_update = "`user_passwd` = '{$user_passwd}',";
	}

	$sql = "UPDATE `users` SET
		`user_name` = '{$user_name}',
		`user_id` = '{$user_id}',
		{$passwd_update}
		`user_email` = '{$user_email}',
		`user_sex` = '{$user_sex}',
		`user_tel` = '{$user_tel}',
		`user_zip` = '{$user_zip}',
		`user_county` = '{$user_county}',
		`user_district` = '{$user_district}',
		`user_address` = '{$user_address}'
		WHERE `user_sn` = '{$user_sn}'";
	$mysqli->query($sql) or die($mysqli->connect_error);	
}

function delete_user($user_sn) {
	global $mysqli, $isAdmin;
	if (!$isAdmin)
		return;
	if (empty($user_sn)) 
		return;
	$sql = "DELETE FROM `users` WHERE `user_sn` = '{$user_sn}'";
	$mysqli->query($sql) or die($mysqli->connect_error);
}

function user_login($user_id) {
	global $mysqli;
	if (empty($user_id)) {
		return false;
	}	

	$sql = "SELECT * FROM `users` WHERE `user_id` = '{$user_id}'";
	$result = $mysqli->query($sql) or die($mysqli->connect_error);
	$user = $result->fetch_assoc();

	if (!empty($user)) {
		if (password_verify($_POST["user_passwd"], $user["user_passwd"])) {
			$_SESSION["user_sn"] = $user["user_sn"];
			$_SESSION["user"] = $user;
			return true;
		}
	}
	return false;
}

function user_logout() {
	unset($_SESSION["user_sn"]);
	unset($_SESSION["user"]);
}

function id_exist() {
	global $mysqli;
	$sql = "SELECT * FROM `users` WHERE `user_id` = '{$_POST["user_id"]}'";
	$result = $mysqli->query($sql) or die($mysqli->connect_error);
	if ($result->fetch_assoc()) {
		return true;
	}		
	return false;
}

