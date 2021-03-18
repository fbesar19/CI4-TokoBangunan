<table width="100%">
    <?php if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    ?>
            <tr>
                <td> <?php echo $values["product_name"] ?> </td>
                <td align="right" width="22%"><?php echo $values["product_quantity"] ?></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<script language=javascript>
    function printWindow() {
        bV = parseInt(navigator.appVersion);
        if (bV >= 4) window.print();
    }
    printWindow();
</script>