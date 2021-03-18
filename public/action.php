<?php

$localhost = "localhost";
$user_db = "root";
$pass_db = "";
$db = "toko_bangunan_db";

$koneksi = mysqli_connect($localhost, $user_db, $pass_db, $db);

date_default_timezone_set('Asia/Jakarta');

session_start();

if (isset($_POST["action"])) {
	if ($_POST["action"] == "add") {
		if (isset($_SESSION["shopping_cart"])) {
			$is_available = 0;
			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
				}
			}
			if ($is_available == 0) {
				$item_array = array(
					'product_id'               =>     $_POST["product_id"],
					'product_name'             =>     $_POST["product_name"],
					'product_price'            =>     $_POST["product_price"],
					'product_quantity'         =>     $_POST["product_quantity"]
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		} else {
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],
				'product_name'             =>     $_POST["product_name"],
				'product_price'            =>     $_POST["product_price"],
				'product_quantity'         =>     $_POST["product_quantity"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
	}

	if ($_POST["action"] == 'remove') {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["product_id"] == $_POST["product_id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	if ($_POST["action"] == 'empty') {
		$tanggal = date('d-m-Y');
		$total_price = 0;
		$list_item = "";
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			$min = $values["product_quantity"];
			$id = $values["product_id"];
			$sql = mysqli_query($koneksi, "UPDATE barang SET stok_barang= stok_barang - $min  WHERE id_barang=$id");
			$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
			$list_item = $list_item . $values["product_name"] . " " . $values["product_quantity"] . " " . ($values["product_quantity"] * $values["product_price"]) . ",";
		}
		$query = mysqli_query($koneksi, "INSERT INTO transaksi (nama_transaksi, nominal, jenis_transaksi , tgl_transaksi) VALUES ('$list_item', '$total_price', 'Pemasukan' , '$tanggal')");

		// unset($_SESSION["shopping_cart"]);
	}
}
