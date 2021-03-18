<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Print - Laporan Pengeluaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body>
    <div class="container-fluid center">
        <h2 class="text-center p-4">Laporan Pengeluaran Bulan Ini</h2>
        <table class="table table-striped table-bordered" border="1">
            <tr style="text-align: center;">
                <thead style="background-color: #506c6a" class="text-white text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                </thead>
            </tr>
            <?php

            date_default_timezone_set('Asia/Jakarta');
            $date_now = substr(date('Y-m-d'), 0, 7);
            $no = 1;
            $total = 0;
            foreach ($transaksi as $data) {
                $bulan = date("Y-m-d", strtotime($data['tgl_transaksi']));
                $date_data = substr($bulan, 0, 7);
                if ($date_data == $date_now) {
                    echo "
                    <tr align ='center'>
                        <td width='5'>" . $no . "</td>
                        <td>" . $data['tgl_transaksi'] . "</td>
                        <td align = 'right'>" . rupiah($data['nominal']) . "</td>
                        <td >" . $data['nama_transaksi'] . "</td>
                    </tr>";
                    $no++;
                    $total = $total + $data['nominal'];
                }
            }
            ?>
            <tr>
                <td colspan="2" align="center"><b>Total</b></td>
                <td align="right"><b><?= rupiah($total); ?></b></td>
                <td></td>
            </tr>
        </table>
    </div>
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
</body>

</html>