<?php
	/* Include */	
	require_once("header.php");
	if (!$isAdmin) {
		header("location: index.php");
		exit;
	}
	
	/* Process Control */
	$op = isset($_REQUEST['op']) ? my_filter($_REQUEST['op']) : "";
	$goods_sn = isset($_REQUEST["goods_sn"]) ? my_filter($_REQUEST["goods_sn"], "int") : 0;
	switch ($op) {
		case "goods_form":
			goods_form($goods_sn);
			break;
		
		case "insert_goods":
			$goods_sn = insert_goods();
			save_goods_pic($goods_sn);
			header("location: index.php?goods_sn={$goods_sn}");
			exit;
			break;

		case "update_goods":
			update_goods($goods_sn);
			header("location: index.php?goods_sn={$goods_sn}");
			exit;
			break;

		case "delete_goods":
			delete_goods($goods_sn);
			header("location: index.php");
			exit;
			break;
	}	

	/* Output */
	require_once("footer.php");

	/* Function */
	function save_goods_pic($goods_sn = "") {
  	require_once("class/upload/class.upload.php");
  	$pic = new Upload($_FILES["goods_pic"], "zh_TW");
  	if ($pic->uploaded) {
  		$pic->file_new_name_body = $goods_sn;
  		$pic->file_overwrite = true;
  		$pic->image_resize = true;
  		$pic->image_x = 600;
  		$pic->image_y = 400;
  		$pic->image_convert = "png";
  		$pic->image_ratio_crop = true;
  		$pic->Process('uploads/goods/');
  		if (!$pic->processed) {
  			return "error: " . $pic->error;
  		}
                                                      
  		$pic->file_new_name_body = $goods_sn;
  		$pic->file_overwrite = true;
  		$pic->image_resize = true;
  		$pic->image_x = 300;
  		$pic->image_y = 200;
  		$pic->iage_convert = "png";
  		$pic->image_ratio_crop = true;
  		$pic->Process("uploads/thumbs/");
  		if ($pic->processed) {
  			$pic->Clean();
  		} else {
  			return "error: " . $pic->error;
  		}
  	}
  }
	
	function goods_form($goods_sn) {
		global $mysqli, $smarty;

		if (empty($goods_sn)) {
			$sql = "EXPLAIN `goods`";
			$result = $mysqli->query($sql) or die($mysqli->connect_error);
			while (list($field_name) = $result->fetch_row()) {
					$goods[$field_name] = "";
			}
			$smarty->assign("goods", $goods);
			return;
		}

		$sql = "SELECT * FROM `goods` WHERE `goods_sn`='{$goods_sn}'";
		$result = $mysqli->query($sql) or die($mysqli->connect_error);
		$goods = $result->fetch_assoc();
		$goods["pic"] = get_goods_pic($goods_sn, "thumbs");
		$smarty->assign("goods", $goods);	
	}

	function insert_goods() {
		global $mysqli;
		$goods_title =	 $mysqli->real_escape_string($_POST['goods_title']);
		$goods_content = $mysqli->real_escape_string($_POST['goods_content']);
		$goods_price =	 $mysqli->real_escape_string($_POST['goods_price']);
		$goods_date = 	 date("Y-m-d H:i:s");

		$sql = "INSERT INTO `goods` (`goods_title`, `goods_content`, `goods_price`, `goods_counter`, `goods_date`) VALUES ('{$goods_title}', '{$goods_content}', '{$goods_price}', '0', '{$goods_date}')";
		$mysqli->query($sql) or die($mysqli->connect_error);
		$goods_sn = $mysqli->insert_id;
		return $goods_sn;
	}

	function update_goods($goods_sn) {
		global $mysqli;
		foreach ($_POST as $var_name => $var_val) {
			$$var_name = $mysqli->real_escape_string($var_val);
		}
		$goods_date = date("Y-m-d H:i:s");

		$sql = "UPDATE `goods` SET `goods_title`='{$goods_title}', `goods_content`='{$goods_content}', `goods_price`='{$goods_price}', `goods_date`='{$goods_date}' WHERE `goods_sn`='{$goods_sn}'";
		$mysqli->query($sql) or die($mysqli->connect_error);
		save_goods_pic($goods_sn);
	}
	
	function delete_goods($goods_sn) {
		global $mysqli;
		$sql = "DELETE FROM `goods` WHERE `goods_sn`='{$goods_sn}'";
		$mysqli->query($sql) or die($mysqli->connect_error);
		delete_goods_pic($goods_sn);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
