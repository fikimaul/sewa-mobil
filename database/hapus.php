<?php
	include "koneksi.php";
	$tbl = $_GET['tbl'];
	$id = $_GET['id'];

	if($tbl=="mobil")
		$sql = "Delete From mobil where id_mobil='".$id."'";
	if($tbl=="sopir")
		$sql = "Delete From sopir where id_sopir='".$id."'";
	
	if ($query = mysqli_query($kon,$sql))
		header("location: ../index.php?tab=".$tbl."&jenis=hapus");


?>