<?php
	if (isset($_COOKIE["cart"]) and $_COOKIE["cart"] != "") {
		$smarty->assign("cart", $_COOKIE["cart"]);
	}
	if (isset($_REQUEST["msg"])) {
		$smarty->assign("msg", $_REQUEST["msg"]);
	}

	$smarty->assign("op", $op);
	$smarty->display("index.html");

