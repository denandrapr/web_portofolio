<?php
    include '../config/koneksi.php';
    $get_id = $_GET['id'];
    $get_data = "SELECT * FROM "
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .atas{
            /* background-color:#455a64; */
            text-align:center;
        }
        .judul-invoice{
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>
<body>
    <div class="container atas">
        <!-- ======================================================================================= <br> -->
        <br>
        <h2 class="judul-invoice">Kasir<b style="color:#ffc107">Bro</b></h2>
        JL. SEMAMPIR TENGAH 8A NO 12<br>
        SURABAYA, 60119 <br>
        +62 8950 777 3113 <br>
        ============================================================= <br>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px;">
        <div class="row">
            <div class="col-md-8">
                10 Juli 2019 00:49:45
            </div>
            <div class="col-md-4">
                Kasir - Denandra
            </div>
        </div>
    </div>
    <div class="container">
        <center>=============================================================</center>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px; text-align:left">
        <div class="row">
            <?php
                $i = 0;
                foreach ($array1 as $k) {
            ?>
                <div class="col-md-4">
                    <?php echo $array2[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array5[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array4[$i] ?>
                </div>
                <div class="col-md-2">
                    <?php echo $array6[$i] ?>
                </div>
            <?php
                $i++;
                }
            ?>
        </div>
    </div>
    <div class="container">
        <center>=============================================================</center>
    </div>
    <div class="container" style="padding-left: 180px; padding-right: 60px; text-align:left">
        <div class="row">
            <div class="col-md-4">
                Total
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                <?php echo number_format($grandtotal) ?>
            </div>
            <div class="col-md-4">
                Tunai
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                <?php echo number_format($grandtotal) ?>
            </div>
            <div class="col-md-4">
                Kembali
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                Rp 850.000
            </div>
            <div class="col-md-4">
                Diskon
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                5%
            </div>
            <div class="col-md-4">
                PPN
            </div>
            <div class="col-md-2">
                <!-- 2 -->
            </div>
            <div class="col-md-2">
                <!-- 175.000 -->
            </div>
            <div class="col-md-2">
                2%
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        <center>======= Terimakasih & Selamat Belanja Kembali =======</center>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>