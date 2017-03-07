<?php
	include "koneksi.php";

	$no_polisi = $_POST["no_polisi"];
	$merk = $_POST["merk"];
	$jenis = $_POST["jenis"];
	$warna = $_POST["warna"];
	$harga = $_POST["harga"];

	$sql = "INSERT INTO `mobil` (`no_polisi`, `merek`, `jenis`, `warna`, `harga`) VALUES ('".$no_polisi."', '".$merk."', '".$jenis."', '".$warna."', '".$harga."')";

	$result = mysqli_query($kon, $sql) or die ("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
	if ($result)
		header("location: ../index.php?tab=mobil&jenis=tbh");

?>