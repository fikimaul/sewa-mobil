<?php
	$sql = "SELECT id_sewa, penyewa.nama_penyewa AS Penyewa, mobil.no_polisi AS No_Polisi, mobil.merek AS Merek, sopir.nama_sopir As Sopir, jaminan.jenis_jaminan AS Jaminan, jaminan.no_jaminan AS No_Jaminan, jaminan.atas_nama AS Atas_Nama, sewa.tgl_sewa, lama_sewa, harga_sewa FROM penyewa, mobil, sopir,sewa, jaminan WHERE sewa.id_penyewa=penyewa.id_penyewa AND sewa.id_mobil=mobil.id_mobil AND sewa.id_sopir=sopir.id_sopir AND sewa.id_jaminan = jaminan.id_jaminan";
	$rsSewa = mysqli_query($kon, $sql) Or die ("error");
?>

<table class='table table-striped table-hover'>
    	<thead bgcolor='#d9edf7'>
	    	<tr>
	    		<th>Id Sewa</th>
	    		<th>Penyewa</th>
	    		<th>No Polisi</th>
	    		<th>Merek</th>
	    		<th>Sopir</th>
	    		<th>Jaminan</th>
	    		<th>No Jaminan</th>
	    		<th>Atas Nama</th>
	    		<th>Tanggal Sewa</th>
	    		<th>Lama Sewa</th>
	    		<th>Harga Sewa</th>
	    	</tr>
    	</thead>
    	<tbody bgcolor='#fff'>
<?php
	while($rs = $rsSewa->fetch_array(MYSQLI_ASSOC)) {
?>
		<tr>
			<td><?php echo $rs['id_sewa']?></td>
			<td><?php echo $rs["Penyewa"]?></td>
			<td><?php echo $rs["No_Polisi"]?></td>
			<td><?php echo $rs["Merek"]?></td>
			<td><?php echo $rs["Sopir"]?></td>
			<td><?php echo $rs["Jaminan"]?></td>
			<td><?php echo $rs["No_Jaminan"]?></td>
			<td><?php echo $rs["Atas_Nama"]?></td>
			<td><?php echo $rs["tgl_sewa"]?></td>
			<td><?php echo $rs["lama_sewa"]?> Jam</td>
			<td><?php echo $rs["harga_sewa"]?></td>
		</tr>
<?php	
	}
?>
		</tbody>
	</table>