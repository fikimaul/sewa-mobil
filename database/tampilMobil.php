<?php
	$result = $kon->query("SELECT * from mobil");
?>
  <div class="col-md-10 col-md-offset-1">
	<table class='table table-striped table-hover' align="center" width="100%">
    	<thead bgcolor='#d9edf7'>
	    	<tr>
	    		<th>No Polisi</th>
	    		<th>Merek</th>
	    		<th>Jenis</th>
	    		<th>Warna</th>
	    		<th>Status</th>
	    		<th>Harga</th>
	    		<th>Aksi</th>
	    	</tr>
    	</thead>
    	<tbody bgcolor='#fff'>
<?php
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
?>
		<tr>
			<td><?php echo $rs["no_polisi"]?></td>
			<td><?php echo $rs["merek"]?></td>
			<td><?php echo $rs["jenis"]?></td>
			<td><?php echo $rs["warna"]?></td>
			<td><?php echo $rs["status_mobil"]?></td>
			<td>Rp. <?php echo $rs["harga"]?>/Jam</td>
			<td><a href="database/hapus.php?tbl=mobil&id=<?php echo $rs['id_mobil']?>" onClick="return hapus('<?php echo $rs["no_polisi"]?>','<?php echo $rs["merek"]?>','Mobil','mobil<?php echo $rs["id_mobil"]?>')" id="mobil<?php echo $rs['id_mobil']?>">Hapus</a></td>
		</tr>
<?php

	}
?>
		</tbody>
	</table>
	</div>
