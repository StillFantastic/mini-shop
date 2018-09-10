<?php
/*
	/* Include */
	require_once("header.php");	
		
	/* Process Control */
	$op = isset($_REQUEST['op']) ? my_filter($_REQUEST['op']) : "";
	$goods_sn = isset($_REQUEST["goods_sn"]) ? my_filter($_REQUEST["goods_sn"], "int") : 0;
	$goods_title = isset($_REQUEST["goods_title"]) ? my_filter($_REQUEST["goods_title"]) : "";
	$keyword = isset($_REQUEST["keyword"]) ? my_filter($_REQUEST["keyword"]) : "";

	switch ($op) {
		case "add_to_cart":
			add_to_cart($goods_sn, $goods_title);
			header("location: index.php");
			exit;
			break;

		default:
			if ($goods_sn) {
				add_goods_counter($goods_sn);
				$op = "goods_display";
				display_goods($goods_sn);
			} else {
				list_goods($keyword);
			}
			break;	
	}


	/* Output */
	require_once("footer.php");
	
	/* Functions */
	function list_goods($keyword) {
		global $smarty, $mysqli;
		require_once("class/PageBar.php");
		$where = !empty($keyword) ? "where `goods_title` like '%{$keyword}%' or `goods_content` like '%{$keyword}%'" : "";
		$sql = "SELECT * FROM `goods` {$where} ORDER BY `goods_date` desc";
		$PageBar = getPageBar($sql, 3, 3);
		$bar = $PageBar["bar"];
		$sql = $PageBar["sql"];
		$total = $PageBar["total"];
		$result = $mysqli->query($sql) or die($musqli->connect->error);
		$i = 0;
		while ($goods = $result->fetch_assoc()) {
			$all_goods[$i] = $goods;
			$all_goods[$i]["pic"] = get_goods_pic($goods["goods_sn"], "thumbs");
			$i++;
		}
		$smarty->assign("all_goods", $all_goods);
		$smarty->assign("total", $total);
		$smarty->assign("bar", $bar);
	}

	function display_goods($goods_sn = "") {
		global $mysqli, $smarty;

		$sql = "SELECT * FROM `goods` WHERE `goods_sn`='{$goods_sn}'";
		$result = $mysqli->query($sql) or die($mysqli->connect_error);
		$goods = $result->fetch_assoc();
		$goods["pic"] = get_goods_pic($goods_sn);
		$smarty->assign("goods", $goods);	
	}	

	function add_goods_counter($goods_sn) {
		global $mysqli;
		$sql = "UPDATE `goods` SET `goods_counter`=`goods_counter`+1 WHERE `goods_sn`='{$goods_sn}'";
		$mysqli->query($sql) or die($mysqli->connect_error);
	}

	function add_to_cart($goods_sn = "", $goods_title = "") {
		if (empty($goods_sn)) 
			return;
		$end_time = time() + 365 * 86400;
		setcookie("cart[$goods_sn][goods_amount]", 1, $end_time);
		setcookie("cart[$goods_sn][goods_title]", $goods_title, $end_time);
	}
