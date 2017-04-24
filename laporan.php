<?php
     if(!isset($_SESSION["nama"])){
        header("location: login.php");
    }else{
        $nama = $_SESSION['nama'];

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <script type="text/javascript" src="asset/js/jquery.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.js"></script>
</head>
<body>
<div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
                <a class="navbar-brand" href="index.php">Rental Mobil <b>Family</b></a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=mobil">Mobil</a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=sopir">Sopir</a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=penyewa">Penyewa</a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=sewa">Sewa</a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=bayar">Pembayaran</a>
            </li>
            <li role="presentation">
                <a href="index.php?tab=kembali">Pengembalian</a>
            </li>
            <li role="presentation">
                <a href="#">Laporan</a>
            </li>
            <li role="presentation">
                 <span align="left" class="navbar-brand">Nama : <i><?php echo $nama?></i></b>  <a href="logout.php" class="btn btn-danger btn-xs">Logout</a></span>
            </li>
        </ul>
</div>
    <?php
        $bln = date("F");
        $thn = date("Y");
    ?>
    <h1 align="center">RENTAL MOBIL FAMILY</h1>
    <h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
    <hr/>
    <h4 align="center">Periode : <?php echo $bln?> - <?php echo $thn?></h4>
    <br/>
    <br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="tab-content">
            <div class="list-group">
                <a href="cetak.php?jenis=mobil" class="list-group-item">
                    Laporan Daftar Mobil
                </a>
                <a href="cetak.php?jenis=sopir" class="list-group-item">
                     Laporan Daftar Sopir
                </a>
                <a href="cetak.php?jenis=penyewa" class="list-group-item">Laporan Daftar Penyewa</a>
                <a href="cetak.php?jenis=sewa" class="list-group-item">Laporan Penyewaan</a>
                <a href="cetak.php?jenis=pembayaran" class="list-group-item">Laporan Pembayaran</a>
                <a href="cetak.php?jenis=kembali" class="list-group-item">Laporan Pengembalian</a>
            </div>
        </div>
    </div>
</body>
</html>