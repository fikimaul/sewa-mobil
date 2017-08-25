<?php
	$result = $kon->query("select sewa.id_sewa AS id_sewa, id_bayar, tgl_bayar, status_bayar, total_bayar, kurang, penyewa.nama_penyewa as penyewa, mobil.merek as merek,mobil.no_polisi AS no_pol, sewa.lama_sewa as lama_sewa, harga_sewa from sewa, bayar, mobil, penyewa where sewa.id_sewa = bayar.id_sewa AND mobil.id_mobil=sewa.id_mobil AND penyewa.id_penyewa = sewa.id_penyewa");
?>
	<table class='table table-striped table-hover'>
    	<thead bgcolor='#d9edf7'>
	    	<tr>
	    		<th>No</th>
	    		<th>Nama Penyewa</th>
	    		<th>Merek Mobil</th>
	    		<th>No Polisi</th>
	    		<th>Lama Sewa</th>
	    		<th>Harga Sewa</th>
	    		<th>Status Bayar</th>
	    		<th>Tanggal Bayar</th>
	    		<th>Total Bayar</th>
	    		<th>Kurang</th>
	    		<th>Aksi</th>
	    	</tr>
    	</thead>
    	<tbody bgcolor='#fff'>
<?php
	$no=1;
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $rs["penyewa"]?></td>
			<td><?php echo $rs["merek"]?></td>
			<td><?php echo $rs["no_pol"]?></td>
			<td><?php echo $rs["lama_sewa"]?> Jam</td>
			<td><?php echo $rs["harga_sewa"]?></td>
			<td><?php echo $rs["status_bayar"]?></td>
			<td><?php echo $rs["tgl_bayar"]?></td>
			<td><?php echo $rs["total_bayar"]?></td>
			<td><?php echo $rs["kurang"]?></td>
			<?php
				if ($rs['status_bayar'] == "DP"){
			?>
			<td><a onClick="return lunasi('<?php echo $rs["penyewa"]?>', '<?php echo $rs["no_pol"]?>', '<?php echo $rs["kurang"]?>','lunas<?php echo $rs["id_bayar"] ?>')" href="database/lunasi.php?id_bayar=<?php echo $rs['id_bayar']?>" id="lunas<?php echo $rs['id_bayar'] ?>">Lunasi</a></td>
			<?php }?>
		</tr>
<?php
	$no++;
	}
?>
		</tbody>
	</table>
