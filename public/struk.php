<?php
session_start();

$total_price = 0;
$total_item = 0;

?>

<head>
    <title>Struk Pembelian</title>
</head>
TOKO BANGUNAN <br>
JL. RADIO PALASARI 9A, BANDUNG<br>
<hr>
<table width="100%">
    <tr>
        <td align="center"> Qty </td>
        <td> Nama Barang </td>
        <td> Harga Barang</td>
        <td align="right"> Total Harga</td>
    </tr>
    <tr>
        <td colspan="4">
            <hr>
        </td>
    </tr>
    <?php if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    ?>
            <tr>
                <td align="center" width="12%"><?php echo $values["product_quantity"] . ""; ?></td>
                <td> <?php echo $values["product_name"] ?> </td>
                <td> <?php echo rupiah($values["product_price"]) ?></td>
                <td align="right"> <?php echo rupiah(($values["product_quantity"] * $values["product_price"])) ?></td>
            </tr>
    <?php
            $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
            $total_item = $total_item + 1;
        }
    }
    ?>
</table>
<hr>
<table width="100%">
    <tr>
        <td>Total</td>
        <td align="right"><?php echo rupiah($total_price); ?></td>
    </tr>
</table>
<center style="color: gray;">terima kasih telah berbelanja</center>
<script language=javascript>
    function printWindow() {
        bV = parseInt(navigator.appVersion);
        if (bV >= 4) window.print();
    }
    printWindow();
</script>

<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
?>

<?php unset($_SESSION["shopping_cart"]); ?>