<?php

function my_filter($var, $type="string") {
	switch ($type) {
		case "string":
			$var = isset($var) ? filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES) : "";
			break;

		case "int":
			$var = isset($var) ? filter_var($var, FILTER_SANITIZE_NUMBER_INT) : "";
			break;
	}	
	return $var;
}

function get_goods_pic($goods_sn = "", $type = "goods") {
	$filename = "uploads/{$type}/{$goods_sn}.png";
	if (file_exists($filename)) {
		return $filename;
	} else {
		$size = ($type == "thumbs") ? "300x200" : "600x400";
		return "http://dummyimage.com/{$size}/889dd1/ffffff.gif&text=無商品照片";
	}
}

function delete_goods_pic($goods_sn = "") {
	if (file_exists("uploads/goods/{$goods_sn}.png")) {
		unlink("uploads/goods/{$goods_sn}.png");
	}

	if (file_exists("uploads/thumbs/{$goods_sn}.png")) {
		unlink("uploads/thumbs/{$goods_sn}.png");
	}
}
