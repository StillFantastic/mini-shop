<?php

require_once("header.php");
require_once("class/tcpdf/tcpdf.php");

$op = isset($_REQUEST["op"]) ? my_filter($_REQUEST["op"]) : "";
$bill_sn = isset($_REQUEST["bill_sn"]) ? my_filter($_REQUEST["bill_sn"], "int") : 0;

switch ($op) {
	case "bill_pdf":
		bill_pdf($bill_sn);
		break;
}


function bill_pdf($bill_sn = "") {
	global $mysqli;
	$sql = "SELECT a.*, b.* FROM `bill` AS a JOIN `users` AS b on a.`user_sn` = b.`user_sn` WHERE a.`bill_sn` = '{$bill_sn}'";
	$result = $mysqli->query($sql) or die($mysqli->connect_error);
	$bill = $result->fetch_assoc();

	$bill_detail = null;
	$sql = "SELECT a.*, b.* FROM `bill_detail` AS a LEFT JOIN `goods` AS b on a.`goods_sn` = b.`goods_sn` WHERE a.`bill_sn` = '{$bill_sn}'";
	$result = $mysqli->query($sql) or die($mysqli->connect_error);
	while ($all = $result->fetch_assoc()) {
		$bill_detail .= " 
			<tr>
				<td>{$all['goods_title']}</td>
				<td>{$all['goods_price']}</td>
				<td>{$all['goods_amount']}</td>
				<td>{$all['goods_total']}</td>
			</tr>";
	}
	
	$html = "
		<h2>{$bill['bill_date']} 出貨單</h2>
		<p>收貨人: {$bill['user_name']} {$bill['user_sex']}</p>
		<p>收貨地址: {$bill['user_zip']}{$bill['user_county']}{$bill['user_district']}{$bill['user_address']}</p>
		<p>收貨人電話: {$bill['user_tel']}</p>
		<table border=\"1\" cellpadding=\"4\">
			<tr>
				<th>商品名稱</th><th>單價</th><th>數量</th><th>小計</th>	
			</tr>
			{$bill_detail}
			<tr>
				<td></td><td></td><td></td><td>{$bill['bill_total']} 元</td>	
			</tr>
		</table>";
	$pdf = new TCPDF("P", "mm", "A4", true, "UTF-8", false);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->setAutoPageBreak(true);
	$pdf->setFontSubsetting(true);
	$pdf->setFont("droidsansfallback", "", 12, "", true);
	$pdf->AddPage();
	$pdf->writeHTML($html);
	$pdf->Output("出貨單.pdf", "D");
}
