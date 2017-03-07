<?php
	include "koneksi.php";

	$id_sewa = $_GET['id_sewa'];
	$denda = 0;
	$sql = "SELECT * from sewa where id_sewa='".$id_sewa."'";
	$result = mysqli_query($kon, $sql);
	$rs = $result->fetch_array(MYSQLI_ASSOC);

	$tgl = $rs['tgl_sewa'];
	$jam = $rs['lama_sewa'];
	$id_jaminan = $rs['id_jaminan'];
	$id_mobil = $rs['id_mobil'];
	$id_sopir = $rs['id_sopir'];

	$hari = intval($jam/24);
	$hari = $hari + 1;

	$tanggal = date("Y-m-d", strtotime("+$hari days",strtotime($tgl)));
	$tglSekarang = date("Y-m-d", mktime(date("m"),date("d"),date("Y")));

	if($tglSekarang>$tanggal){
		$selisih = strtotime($tglSekarang)-strtotime($tanggal);
		$hari = $selisih/(60*60*24);
		$denda = 50000 * $hari;
	}

	$kembali = "INSERT into pengembalian (id_sewa, tgl_kembali, denda) values ('".$id_sewa."', '".$tglSekarang."', '".$denda."')";
	$rs = mysqli_query($kon, $kembali)Or die ("error kembali");

	$updateMobil = "UPDATE mobil set status_mobil='Tidak Disewa' where id_mobil='".$id_mobil."'";
	$rs = mysqli_query($kon, $updateMobil)Or die ("error mobil");

	if($id_sopir>0){
			$updateSopir = "UPDATE sopir set status_sopir='Tidak Disewa' where id_sopir='".$id_sopir."'";
			$rs = mysqli_query($kon, $updateSopir)Or die ("error sopir");
	}

	header("location: ../index.php?tab=kembali&jenis=$denda");
?>