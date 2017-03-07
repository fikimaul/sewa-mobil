<?php
	include "koneksi.php";

	$nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$no_tlp = $_POST["no_tlp"];

	$sql = "INSERT INTO `sopir` (`nama_sopir`, `alamat_sopir`, `no_tlp_sopir`) VALUES ('".$nama."', '".$alamat."', '".$no_tlp."')";

	$result = mysqli_query($kon, $sql) or die ("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
	if ($result)
		header("location: ../index.php?tab=sopir&jenis=tbh");

?>