<?php
	include "koneksi.php";

	$id_penyewa = $_POST['id_penyewa'];
	$id_mobil = $_POST['id_mobil'];
	$id_sopir = $_POST['id_sopir'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
	$jenis_jaminan = $_POST['jenis_jaminan'];
	$no_jaminan = $_POST['nomor_jaminan'];
	$atas_nama = $_POST['atas_nama'];
	$bayar = $_POST['bayar'];

	$sqljaminan = "INSERT INTO jaminan (jenis_jaminan, no_jaminan, atas_nama) VALUES ('".$jenis_jaminan."', '".$no_jaminan."', '".$atas_nama."')";
	$result = mysqli_query($kon, $sqljaminan)or die ("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

	$sqljaminan = "select * from jaminan where no_jaminan='".$no_jaminan."'";
	$rsjaminan = mysqli_query($kon, $sqljaminan);
	$rs = $rsjaminan->fetch_array(MYSQLI_ASSOC);
	$id_jaminan = $rs['id_jaminan'];

	$sqlmobil = "select * from mobil where id_mobil='".$id_mobil."'";
	$rsmobil = mysqli_query($kon, $sqlmobil);
	$rs = $rsmobil->fetch_array(MYSQLI_ASSOC);
	$harga = $rs['harga'];

	$jamhari = $hari * 24;
	$lama = $jamhari + $jam;

	$totalHarga = $harga * $lama;
	if($id_sopir>0){
		$totalHarga = $totalHarga+50000;
	}

	$tanggal = date("Y-m-d", mktime(date("m"),date("d"),date("Y")));

	$sqlsewa = "INSERT INTO sewa (id_penyewa, id_mobil, id_sopir, id_jaminan, tgl_sewa, lama_sewa, harga_sewa) VALUES('".$id_penyewa."','".$id_mobil."','".$id_sopir."','".$id_jaminan."','".$tanggal."','".$lama."','".$totalHarga."')";

	$result = mysqli_query($kon, $sqlsewa) or die ("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

	$sqlsewa = "select id_sewa from sewa order by id_sewa DESC";
	$rssewa = mysqli_query($kon, $sqlsewa);
	$rs = $rssewa->fetch_array(MYSQLI_ASSOC);
	$id_sewa = $rs['id_sewa'];

	$status_bayar = "Lunas";
	$kurang = 0;
	if ($bayar<$totalHarga){
		$status_bayar = "DP";
		$kurang = $totalHarga - $bayar;
	}

	$sqlbayar = "INSERT INTO bayar (id_sewa, tgl_bayar, status_bayar, total_bayar, kurang) VALUES('".$id_sewa."', '".$tanggal."', '".$status_bayar."','".$bayar."', '".$kurang."')";
	$rs = mysqli_query($kon, $sqlbayar);

	if ($result)
		$updateMobil = "UPDATE mobil set status_mobil='Disewa' where id_mobil='".$id_mobil."'";
		$rs = mysqli_query($kon, $updateMobil);
		if($id_sopir>0){
			$updateSopir = "UPDATE sopir set status_sopir='Disewa' where id_sopir='".$id_sopir."'";
			$rs = mysqli_query($kon, $updateSopir);
		}
		header("location: ../index.php?tab=sewa&jenis=tbh");

?>